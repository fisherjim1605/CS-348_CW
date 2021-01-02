<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Post;
use App\Models\User;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::orderBy('uploadTime', 'desc')->get();;
        return view('posts.index', ['posts' => DB::table('posts')->simplePaginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::orderBy('name', 'asc')->get();
        return view('posts.create', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|max:255',
            'image_url' => 'nullable',         
        ]);
        $p = new Post;
        $p->title = $validatedData['title'];
        $p->info = $validatedData['content'];
        $p->user_id = Auth::id();
        $p->uploadTime = new DateTime();
        $p->save();
        if($validatedData['image_url'] != null) {
            $i = new Image;
            $i->url = $validatedData['image_url'];
            $p->image()->save($i);
        } 
        session()->flash('message', 'Post uploaded');
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {       
        $post = Post::findOrFail($id);
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        foreach($post->comments as $comment) {
            $comment->delete();
        }
        $post->delete();

        return redirect()->route('posts.index')->with('message', 'Post successfully deleted');
    }

    /**
     * Get all comments from a single post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function commentsFromPost($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.comments', ['comments' => $post->comments]);
    }
}
