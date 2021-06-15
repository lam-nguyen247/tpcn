<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionAnswerRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\QuestionAnswer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

    public function update(QuestionAnswerRequest $request, $id)
    {
        $question = QuestionAnswer::find($id);
        $question->update($request->all());
        return redirect()->route('question-answer.index')->with('success', trans('Updated successfully'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store(QuestionAnswerRequest $request)
    {
        QuestionAnswer::create($request->all());
        return back()->with('success', trans('Saved successfully'));
    }
}
