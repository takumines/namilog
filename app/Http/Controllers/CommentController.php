<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * @param CommentRequest $request
     * @param Comment $comment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(CommentRequest $request, Comment $comment)
    {
        $comment->user_id = Auth::id();
        $comment->fill($request->all())->save();

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param Comment $comment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Request $request, Comment $comment)
    {
        $comment->find($request->id)->delete();
    
        return redirect()->back();
    }
}
