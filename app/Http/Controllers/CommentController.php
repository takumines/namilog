<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function create(CommentRequest $request)
    {
        $comment = new Comment();
        $current_user = Auth::user();
        $comment->user_id = $current_user->id;
        $form = $request->all();

        $comment->fill($form)->save();

        return redirect()->back();
    }

    
    public function delete(Request $request)
    {
        
        $comment = Comment::find($request->id)->delete();
    
        return redirect()->back();
    }
}
