<?php

namespace App\Http\Controllers;

use App\Http\Requests\BackEnd\Comments\StoreRequest;
use App\Http\Requests\FrontEnd\Users\UpdateRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Message;
use App\Models\Page;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only( 'commentedit', 'commentdelete', 'commentadd');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $videos = Video::published()->orderBy('id', 'desc');
        if(request()->has('search') && request()->get('search') != ''){
            $videos = $videos->where('name', 'like', '%'.request()->get('search').'%');
        }
        $videos = $videos->paginate(30);
        return view('home', compact('videos'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $videos = Video::published()->Where('category_id', $category->id)->orderBy('id', 'desc')->paginate(30);

        return view('frontend.category.index', compact('category', 'videos'));

    }

    public function skill($slug)
    {
        $skill = Skill::where('slug', $slug)->first();
        $videos = $skill->videos()->published()->orderBy('id', 'desc')->paginate(30);

        //$videos = $skill->wherehas('videos', faunction($query) usr $id {
        //
        // $query->where('skill_id', 'id')})->orderBy('id', 'desc')->paginate(30);

        return view('frontend.skill.index', compact('skill', 'videos'));

    }

    public function tag($slug)
    {
        $tag = Tag::where('slug', $slug)->first();
        $videos = $tag->videos()->published()->orderBy('id', 'desc')->paginate(30);

        return view('frontend.tag.index', compact('tag', 'videos'));

    }

    public function video($slug)
    {

        $video = Video::published()->with('skills', 'tags', 'category', 'user', 'comments.user')->whereSlug($slug)->first();

            return view('frontend.video.index', compact('video'));

    }

    public function commentedit($id, StoreRequest $request)
    {

        $input = $request->all();
        $comment = Comment::findOrFail($id);
        if (Auth::user()->id == $comment->user_id) {
            $comment->update($input);
        }
        return redirect()->route('front.video', ['slug' => $request->slug, '#comments']);
    }

    public function commentdelete($id)
    {
        $comment = Comment::findOrFail($id);

        if (Auth::user()->id == $comment->user_id || Auth::user()->isadmin()) {
            $comment->delete();
        }

        return redirect()->route('front.video', ['slug' => $comment->video->slug, '#comments']);


    }

    public function commentadd(StoreRequest $request)
    {
        if (Auth::user() || Auth::user()->isadmin()) {
            Comment::create($request->except('slug'));
        }

        return redirect()->route('front.video', ['slug' => $request->slug, '#comments']);


    }

    public function storemessage(\App\Http\Requests\FrontEnd\Messages\StoreRequest $request)
    {
        Message::create($request->all());
        return redirect()->route('landing.web');
    }

    public function welcome(){
        $videos = Video::where('published', 1)->orderBy('id', 'desc')->paginate(9);
        $comments = Comment::count();
        $tags = Tag::count();
        return view('welcome', compact('videos', 'comments', 'tags'));
    }

    public function page($slug) {
        $page = Page::Where('slug', $slug)->first();

        return view('frontend.page.index' , compact('page'));

    }

    public function profile($slug) {
        $user = User::where('slug', $slug)->first();

        return view('frontend.profile.index', compact('user'));
    }

    public function profileupdate(UpdateRequest $request) {
        $user = User::findOrFail(Auth::user()->id);
        $input = [];

        if($request->password != ''){
            $input['password'] = bcrypt($request->password);
        }

        if ($request->email != $user->email){
            $input['email'] = $request->email;
        }

        if($request->name != $user->name){
            $input['name'] = $request->name;
        }

        if(!empty($input)){
            $user->update($input);
        }

        return redirect()->back();

    }
}
