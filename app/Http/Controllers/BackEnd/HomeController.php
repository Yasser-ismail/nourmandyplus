<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $comments = Comment::with('user', 'video')->orderBy('id', 'desc')->paginate(20);
        return view('backend.home', compact('comments'));
    }

    public function commentdelete($id) {
        Comment::findOrFail($id)->delete();

        return redirect()->back();
    }
}
