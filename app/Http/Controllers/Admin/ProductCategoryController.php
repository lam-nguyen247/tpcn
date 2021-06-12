<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Exception;
use App\Http\Requests\ProductCategoryRequest;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use App\Services\ImageService;
use DB;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $productCategoryList = ProductCategory::where('parent_id',0)->orderBy('order_display', 'desc')->get();
        foreach($productCategoryList as $key=>$item){
            $productCategoryList[$key]->childs = ProductCategory::where('parent_id',$item->id)->orderBy('order_display','asc')->get();
        }
        return view('admin.productcategory.index', compact('productCategoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductCategoryRequest $request
     * @return Response
     */
    public function store(ProductCategoryRequest $request, ImageService $imageService)
    {
        $arr_add = ['slug' => Str::slug($request->name)];
        $arr_add['order_display'] = 0;
        $request->request->add($arr_add);
        $productCategory  = ProductCategory::create($request->except(['image', 'banner','properties']));
        if(isset($request->properties) && count($request->properties)>0){
            $productCategory->properties = json_encode($request->properties, JSON_UNESCAPED_UNICODE);
        }
        if($request->image){
            $productCategory->image = $imageService->store($request->image, config('constants.folder.productcategory') . $productCategory->id . '/');
        }
        if($request->banner){
            $productCategory->banner = $imageService->store($request->banner, config('constants.folder.productcategory') . $productCategory->id . '/');
        }
        $productCategory->save();
        ProductCategory::incrementOrder($request->parent_id);
        return redirect()->route('product-category.index')->with('success', 'Lưu thành công');
    }

    public function edit(ProductCategory $productCategory)
    {
        $productCategoryList = ProductCategory::where('parent_id',0)->orderBy('order_display', 'desc')->get();
        foreach($productCategoryList as $key=>$item){
            $productCategoryList[$key]->childs = ProductCategory::where('parent_id',$item->id)->orderBy('id','asc')->get();
        }
       
        return view('admin.productcategory.index', compact('productCategory', 'productCategoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductCategoryRequest $request
     * @param ProductCategory $productCategory
     * @return Response
     */
    public function update(ProductCategoryRequest $request, ProductCategory $productCategory, ImageService $imageService)
    {
        
        if($productCategory->parent_id==0 && $request->parent_id !=0){
            DB::statement('UPDATE product_categories SET parent_id = 0 WHERE parent_id = '.$productCategory->id);
        }
        $request->request->add(['slug' => Str::slug($request->name)]);
       
        if($request->image){
            $productCategory->image = $imageService->store($request->image, config('constants.folder.productcategory') . $productCategory->id . '/');
        }
        if($request->banner){
            $productCategory->banner = $imageService->store($request->banner, config('constants.folder.productcategory') . $productCategory->id . '/');
        }
        if(isset($request->properties) && count($request->properties)>0){
            $productCategory->properties = json_encode($request->properties, JSON_UNESCAPED_UNICODE);
        }
        $productCategory->display_home = $request->display_home;
        $productCategory->parent_id = $request->parent_id;
        $productCategory->save();
        $ids = ProductCategory::select('id')->where('parent_id',0)->orderBy('order_display','asc')->get();
        $list = array();
        foreach($ids as $item){
            $list[] = $item->id;
        }
        ProductCategory::updateOrder($list);
        return redirect()->route('product-category.index')->with('success', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ProductCategory $productCategory
     * @return Response
     * @throws Exception
     */
    public function destroy(Request $request, ProductCategory $productCategory)
    {
        if($productCategory->parent_id==0 && $request->parent_id !=0){
            DB::statement('UPDATE product_categories SET parent_id = 0 WHERE parent_id = '.$productCategory->id);
        }
        ProductCategory::decrementOrder($productCategory->order_display,$productCategory->parent_id);
        $productCategory->delete();
        return redirect()->route('product-category.index')->with('success', 'Xóa thành công');
    }

     /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function order($id=0)
    {
        $product_categoryList = ProductCategory::where('parent_id',$id)->orderBy('order_display', 'asc')->get();
        return view('admin.productcategory.order', compact('product_categoryList'));
    }

    public function doOrder(Request $request)
    {
        if (isset($request->id)) {
            ProductCategory::updateOrder($request->id);
        }
        return redirect()->route('product-category.index');
    }
}
