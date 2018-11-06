<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request)
    {

        $this->validate($request ,[
            'message' => 'required'
        ]);

        $comment = new Comment;
        $comment->text =$request->get('message');
        $comment->post_id = $request->get('post_id');
        $comment->user_id = Auth::user()->id;
        $comment->save();

        return redirect()->back()->with('status', 'Комментарий будет добавлен после проверки администратором');
    }
}
