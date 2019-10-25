<?php

namespace App\Http\Controllers;

use App\Comment;
use App\User;
use App\Diary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function create(Request $request)
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
