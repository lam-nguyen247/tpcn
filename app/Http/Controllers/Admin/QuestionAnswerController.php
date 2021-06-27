<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionAnswerRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\QuestionAnswer;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Storage;

class QuestionAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $questionList = QuestionAnswer::all();
        return view('admin.question.index', compact('questionList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create()
    {
        $productCategoryList = ProductCategory::orderBy('order_display','asc')->get();
        return view('admin.question.create', compact('productCategoryList'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return Response
     */
    public function edit($id)
    {
        $productCategoryList = ProductCategory::orderBy('order_display','asc')->get();
        $question = QuestionAnswer::find($id);

        return view('admin.question.edit', compact('question', 'productCategoryList'));
    }

    public function update(QuestionAnswerRequest $request, $id, ImageService $imageService)
    {
        $question = QuestionAnswer::find($id);
        if($request->image){
            if(Storage::exists(storage_path($question->image))){
                unlink($question->image);
            }
            $question->image = $imageService->store($request->image, config('constants.folder.question') . $question->id . '/');
            $question->save();
        }
        $question->update($request->except(['image']));
        return redirect()->route('question-answer.index')->with('success', trans('Updated successfully'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store(QuestionAnswerRequest $request, ImageService $imageService)
    {
        $question = QuestionAnswer::create($request->except(['image']));
        if($request->image){
            $question->image = $imageService->store($request->image, config('constants.folder.question') . $question->id . '/');
        }
        $question->save();
        return back()->with('success', trans('Saved successfully'));
    }
}
