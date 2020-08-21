<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function create(CommentRequest $request, Comment $comment)
    {
        $comment->user_id = Auth::id();
        $comment->fill($request->all())->save();

        return redirect()->back();
    }

    
    public function delete(Request $request, Comment $comment)
    {
        $comment->find($request->id)->delete();
    
        return redirect()->back();
    }
}
