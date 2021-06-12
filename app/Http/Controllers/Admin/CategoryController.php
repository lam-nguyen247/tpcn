<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\MasterCategory;
use Exception;
use GuzzleHttp\Utils;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use function GuzzleHttp\json_decode;

class CategoryController extends Controller
{
    public function getCategoryList($masterCategory, Request $request)
    {
        $request['masterCategory'] = $masterCategory;
        return $this->index($request);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $masterCategory = MasterCategory::whereName($request['masterCategory'])->firstOrFail();
        $categoryList = $masterCategory->rootCategoryList;
        $categoryFlatList = $masterCategory->categoryList;
        return view('admin.category.index', compact('masterCategory', 'categoryList', 'categoryFlatList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     * @return Response
     */
    public function store(CategoryRequest $request)
    {
        Category::create($request->all());
        return back()->with('success', trans('Saved successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return void
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return Response
     */
    public function edit(Category $category)
    {
        $masterCategory = $category->masterCategory;
        $categoryList = $masterCategory->rootCategoryList;
        $categoryFlatList = $masterCategory->categoryList;
        return view('admin.category.index', compact('masterCategory', 'category', 'categoryList', 'categoryFlatList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryRequest $request
     * @param Category $category
     * @return Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->all());
        return redirect()->route('master.category', $category->masterCategory->name)->with('success', trans('Updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return Response
     * @throws Exception
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('master.category', $category->masterCategory->name)->with('success', trans('Deleted successfully'));
    }

    public function order(Request $request)
    {
        foreach (Utils::jsonDecode($request->categoryList) as $order => $categoryJson) {
            $this->updateCategoryList($categoryJson, null);
        }
        return trans('Saved successfully');
    }

    public function updateCategoryList($categoryJson, $parentCategoryId)
    {
        $category = Category::find($categoryJson->id);
        $category->category_id = $parentCategoryId;
        $category->save();
        if (isset($categoryJson->children)) {
            foreach ($categoryJson->children as $order => $categoryChildJson) {
                $this->updateCategoryList($categoryChildJson, $categoryJson->id);
            }
        }
    }
}
