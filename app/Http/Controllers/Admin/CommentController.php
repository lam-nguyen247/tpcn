<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Product;
use Exception;
use Illuminate\Http\Response;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $commentList = Comment::all();
        return view('admin.comment.index', compact('commentList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        $productList = Product::where('status',1)->get();
        return view('admin.comment.create', compact('productList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $comment = Comment::create($request->except('_token'));
        $this->updateProduct($comment);
        return redirect()->route('comment.index')->with('success', trans('Saved successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param Comment $comment
     * @return void
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Comment $comment
     * @return Response
     */
    public function edit(Comment $comment)
    {
        $productList = Product::where('status',1)->get();
        return view('admin.comment.edit', compact('comment', 'productList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Comment $comment
     * @return Response
     */
    public function update(Request $request, Comment $comment)
    {
        $comment->update($request->except('_token'));
        $this->updateProduct($comment);
        return redirect()->route('comment.index')->with('success', trans('Updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Comment $comment
     * @return Response
     * @throws Exception
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        $this->updateProduct($comment);
        return redirect()->route('comment.index')->with('success', trans('Deleted successfully'));
    }

    public function updateProduct($comment){
        $comments = Comment::where('product_id',$comment->product_id)->where('status', 1)->get();
        $sum = 0;
        $count = 0;
        foreach($comments as $comm){
            $sum += $comm->score;
            $count ++;
        }
        $score = $count==0?0:round($sum/$count,2);
        Product::where('id', $comment->product_id)->update(['score'=>$score, 'votes'=>$count]);
    }
    public function updateStatus(Request $request, $id){
        $comment = Comment::find($id);
        if($comment!= null ){
            $comment->status = $request->status;
            $comment->save();
            $comments = Comment::where('product_id',$comment->product_id)->where('status', 1)->get();
            $sum = 0;
            $count = 0;
            foreach($comments as $comm){
                $sum += $comm->score;
                $count ++;
            }
            $score = $count==0?0:round($sum/$count,2);
            Product::where('id', $comment->product_id)->update(['score'=>$score, 'votes'=>$count]);
            return $comment->color;
        }
        return false;
    }
}
