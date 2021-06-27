<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Disease;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductProperty;
use App\Models\Property;
use App\Http\Requests\ProductRequest;
use App\Models\District;
use App\Models\ProductTogether;
use App\Models\Province;
use App\Models\Ward;
use App\Models\Comment;
use App\Services\ImageService;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    private $folder = 'images/upload/product';

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $productList = Product::all();
        return view('admin.product.index', compact('productList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $productCategoryList = ProductCategory::orderBy('order_display','asc')->get();
        $diseases = Disease::all();
        $productList = Product::all();
        return view('admin.product.create', compact('productCategoryList', 'productList', 'diseases'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest $request
     * @param ImageService $imageService
     * @return Response
     */
    public function store(ProductRequest $request, ImageService $imageService)
    {
        $images = array();
        ///add new image to album
            if (isset($request->number_device)) {
            for ($i = 0; $i <= $request->number_device; $i++) {
                $request->request->remove('image_device_current_' . $i);
                $request->request->remove('path_image_' . $i);
                $request->request->remove('base64_image_device_' . $i);
                $request->request->remove('order_image_multi_' . $i);
                $request->request->remove('btn_image_multi_' . $i);
            }
        }
        if (isset($request->multi_img_device_1)) {
            foreach ($request->multi_img_device_1 as $val) {
                $images[] = $imageService->store($val, $this->folder .'/' . time() .'/');
            }
        }
        $request->request->remove('arrAdress ');
        $list_img = json_encode($images);
        $request->request->add(['album' => $list_img, 'slug' => Str::slug($request->title), 'property_category'=> null]);
        $combo_product_id = $request->combo_product_id;

        $data_insert = [
            'product_category_id' => $request->product_category_id,
            'code' => $request->code,
            'price' => $request->price,
            'sale' => $request->sale,
            'purchase' => $request->purchase,
            'status' => $request->status,
            'title' => $request->title,
            'sort_description' => $request->sort_description,
            'album' => $list_img,
            'description' => '',
            'address' => $request->address,
            'information' => '',
            'qty' => $request->qty,
            'property_category'=>'',
            'image' => '',
            'slug' => Str::slug($request->title)
        ];
        $product = Product::create($data_insert);
        if(is_array($combo_product_id)){
            foreach($combo_product_id as $key=>$value){
                ProductTogether::create(['product_id'=>$product->id, 'product_together_id'=>$value]);
            }
        }
        $product->image = $imageService->store($request->file, config('constants.folder.product') . $product->id . '/');
        $product->information = empty($request['information'])?$request['information']:$imageService->transformAll($request['information'], config('constants.folder.product') . $product->id . '/', 1024);
        $product->description = empty($request['description'])?$request['description']:$imageService->transformAll($request['description'], config('constants.folder.product') . $product->id . '/', 1024);
        $product->disease_id = json_encode($request->desease, JSON_UNESCAPED_UNICODE);
        $product->save();
        return redirect()->route('product.create')->with('success', 'Lưu thành công');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return Response
     */
    public function edit(Product $product)
    {
        $productCategoryList = ProductCategory::orderBy('order_display','asc')->get();
        $productList = Product::where('id','<>', $product->id)->get();
        $diseases = Disease::all();
        session(['productList'=>$productList]);
        return view('admin.product.edit', compact('product', 'productCategoryList', 'productList', 'diseases'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductRequest $request
     * @param Product $product
     * @param ImageService $imageService
     * @return Response
     */
    public function update(ProductRequest $request, Product $product, ImageService $imageService)
    {
        if (!is_null($request->file)) {
            if(Storage::exists(storage_path($product->image))){
                unlink($product->image);
            }   
            Log::info('ProductObserver.deleted() ' . $product->image);
            $product->image = $imageService->store($request->file, config('constants.folder.product') . $product->id . '/');
        }
        $combo_product_id = $request->combo_product_id;
        ProductTogether::where('product_id', $product->id)->delete();
        if(is_array($combo_product_id)){
            foreach($combo_product_id as $key=>$value){
                ProductTogether::create(['product_id'=>$product->id, 'product_together_id'=>$value]);
            }
        }
        $product->information = empty($request['information'])?$request['information']:$imageService->transformAll($request['information'], config('constants.folder.product') . $product->id . '/', 1024);
        $product->description = empty($request['description'])?$request['description']:$imageService->transformAll($request['description'], config('constants.folder.product') . $product->id . '/', 1024);
        $list_remove = explode(',', $request->list_remove);
        //remove image
        $images = json_decode($product->album);
        for ($i = 0; $i < count($list_remove) - 1; $i++) {
            if(Storage::exists(storage_path($images[$list_remove[$i]]))){
                unlink($images[$list_remove[$i]]);
            }   
           
            unset($images[$list_remove[$i]]);
        }
        //update image
        $except = array('file', 'files', 'multi_img_device_1', 'combo_product_id', 'combo_product_title', 'properties');
        for ($i = 1; $i <= count($images); $i++) {
            $var = 'image_device_' . $i;
            if (isset($request->$var)) {
                $except[] = $var;
            }
        }

        //add new image to album
        if (isset($request->number_device)) {
            for ($i = 0; $i <= $request->number_device; $i++) {
                $request->request->remove('image_device_current_' . $i);
                $request->request->remove('path_image_' . $i);
                $request->request->remove('base64_image_device_' . $i);
                $request->request->remove('order_image_multi_' . $i);
                $request->request->remove('btn_image_multi_' . $i);
            }
        }

        if (isset($request->multi_img_device_1)) {
            foreach ($request->multi_img_device_1 as $val) {
                $images[] = $imageService->store($val, $this->folder .'/' . time() .'/');
            }
        }

        $images_new = array();
        foreach ($images as $value) {
            $images_new[] = $value;
        }
        $list_img = json_encode($images_new);
        $request->request->add(['album' => $list_img, 'slug' => Str::slug($request->title)]);

        for ($i = 0; $i <= count($images); $i++) {
            $request->request->remove('image_device_current_' . $i);
            $request->request->remove('path_image_' . $i);
            $request->request->remove('base64_image_device_' . $i);
            $request->request->remove('order_image_multi_' . $i);
            $request->request->remove('btn_image_multi_' . $i);
        }
        $request->request->remove('number_device');
        $request->request->remove('list_remove');
        $product->update($request->except($except));
        // dd($request->properties);
        $product->disease_id = json_encode($request->disease_id, JSON_UNESCAPED_UNICODE);
        $product->save();
        return redirect()->route('product.index')->with('success', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return Response
     * @throws Exception
     */
    public function destroy(Product $product)
    {
        $images = json_decode($product->album);
         foreach ($images as $value) {
             unlink($value);
         }
        $product->delete();
        return redirect()->route('product.index');
    }

    public function property($id = 0)
    {
        $product = Product::find($id);
        $productCategoryList = ProductCategory::orderBy('order_display','asc')->get();
        $properties = Property::where('product_id', $id)->get();
        foreach($properties as $key=>$value){
            $properties[$key]['values'] = ProductProperty::where('property_id', $value['id'])->get()->toArray();
        }
        return view('admin.product.property', compact('productCategoryList', 'product', 'properties'));
    }

    public function updateProperty(Request $request, $id=0){
        $data = $request->all();
        if(isset($data['property_name'])){
            foreach($data['property_name'] as $key=>$value){
                $property = Property::updateOrCreate(['property_name'=>$value, 'product_id' => $id]);
                if(isset($data['list_remove'])){
                    foreach($data['list_remove'] as $item){
                        $productProperty = ProductProperty::where('id', $item)->first();
                        if(!empty($productProperty->image)){
                            File::delete($productProperty->image);
                            Log::info('SlideObserver.deleted() ' . $productProperty->image);
                        }
                        ProductProperty::where('id', $item)->delete();
                    }
                }
                if(isset($data['property_value'.$key])){
                    foreach($data['property_value'.$key] as $i => $item){
                        $imageService = new ImageService();
                        $arr = [
                            'value' => $data['property_value'.$key][$i],
                            'sub_value' => $data['property_sub_value'.$key][$i],
                            'price' => $data['property_price'.$key][$i],
                            'sale' => $data['property_sale'.$key][$i],
                            'qty' => $data['property_qty'.$key][$i]
                        ];
                        if($data['property_id'.$key][$i] > 0){
                            if(!is_null($request->file('property_file'.$key.'_'.$i))){
                                if(!empty($productProperty->image)){
                                    $product_property = ProductProperty::where('id', $data['property_id'.$key][$i])->first();
                                    File::delete($product_property->image);
                                    Log::info('SlideObserver.deleted() ' . $product_property->image);
                                }
                                $arr['image'] = $imageService->add($request->file('property_file'.$key.'_'.$i), config('constants.folder.product') . $id . '/');
                            }
                            ProductProperty::where('id', $data['property_id'.$key][$i])->update($arr);
                        }else{
                            $arr['property_id'] = $property->id;
                            $product_property = ProductProperty::create($arr);
                            if(!is_null($request->file('property_file'.$key.'_'.$i))){
                                $image = $imageService->add($request->file('property_file'.$key.'_'.$i), config('constants.folder.product') . $id . '/');
                                ProductProperty::where('id', $product_property->id)->update(['image'=>$image]);
                            }
                        }
                        Product::incrementQty($id,$arr['qty']);
                    }
                }
            }
        }
        return redirect()->route('product.index')->with('success', 'Cập nhật thuộc tính thành công');
    }

    public function updatePrice(Request $request, $id){
        $product = Product::find($id);
        if($request->price>0){
            $product->price = $request->price;
        }
        if($request->sale < $request->price){
            $product->sale = $request->sale;
        }
        $product->save();
        return true;
    }

    public function commentList($id){
        $commentList = Comment::where('product_id',$id)->get();
        return view('admin.product.comment', compact('commentList'));
    }
}
