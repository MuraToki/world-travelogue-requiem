<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\CommentEditRequest;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $q = \Request::query();
        // dd($q);
        return view('comment.create', [
            'post_id' => $q['post_id'],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        $comment = new Comment;
        $input = $request->only($comment->getFillable());
        // dd($input);

        \DB::beginTransaction();

        try {
            //code...
            $comment = $comment->create($input);
            \DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            \DB::rollback();
            abort(500);
        }
        // dd($comment);
        \Session::flash('err_msg_comment', 'コメントを送信しました。');
        return redirect('/detail/'.$comment->post_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        // dd($comment);
        if (is_null($comment)) {
            \Session::flash('err_msg_update', 'データがないよ');
            return redirect(route('home'));
        }

        return view('comment.edit', ['comment' => $comment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommentEditRequest $request)
    {
        $inputs = $request->all();
        // dd($inputs);

        \DB::beginTransaction();

        try {
            //code...
            $comment = Comment::find($inputs['id']);
            $comment->fill([
                'comment' => $inputs['comment'],
            ]);
            $comment->update($request->all());
            // dd($comment);
            \DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            \DB::rollback();
            abort(500);
        }

        // dd($post);
        \Session::flash('err_msg_update', 'コメントを更新しました。');
        return redirect('/detail/'.$comment->post_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function commentdelete($id)
    {
        if (empty($id)) {
            \Session::flash('err_msg', 'データがないよ');
            return redirect(route('home'));
        }

        $comment = Comment::find($id);
        $comment->delete($id);

        \Session::flash('err_msg', 'コメントを削除しました。');
        return redirect('/detail/'.$comment->post_id);
    }
}
