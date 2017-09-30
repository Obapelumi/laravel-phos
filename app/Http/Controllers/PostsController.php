<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Comment;
use Socialite;
use Session;

use DB;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show', 'queryFacebook', 'commentStore']]);
    }

    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(7);
        $comment = Comment::orderBy('created_at', 'desc');
        return view('posts.index')->with(['posts' => $posts,
                                          'comment' => $comment,
                                        ]); 


        // $posts = DB::select('SELECT * FROM posts ORDER BY created_at DESC;');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this-> validate($request, [
            'title'=> 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
            ]);

        //Handle file upload
        if ($request->hasFile('cover_image')) {

            $defaultFileName = $request-> file('cover_image')->getClientOriginalName();
            $finalFileName = time().'_'.$defaultFileName;

            $path = $request-> file('cover_image')->storeAs('public/cover_images', $finalFileName);

        }else{
            $finalFileName = 'noimage.jpg';
        }

        //Create post
        $post = new Post;

        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $finalFileName;

        if ($post->save()) {
            return redirect('/posts')->with('success', 'Post Submitted');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::find($id);
        $comment = Comment::where('post_id', $id)->paginate(7);
        // $comment = DB::table('comments')->where('post_id', $id)->get();

        return view('posts.show')->with(['posts' => $posts,
                                          'comment' => $comment,
                                        ]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::find($id);

        if (auth()-> user()-> id !== $posts-> user_id) {
            return redirect('/posts')->with('error', 'Unauthorized Page'); 
        }
        
        return view('posts.edit')->with('posts', $posts); 
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
        $this-> validate($request, [
            'title'=> 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
            ]);

        //Handle file upload
        if ($request->hasFile('cover_image')) {

            $defaultFileName = $request-> file('cover_image')->getClientOriginalName();
            $finalFileName = time().'_'.$defaultFileName;

            $path = $request-> file('cover_image')->storeAs('public/cover_images', $finalFileName);

        }

        //Edit post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');

        if ($request->hasFile('cover_image')) {
            $post->cover_image = $finalFileName;
        }

        if ($post->save()) {
            return redirect('/posts')->with('success', 'Post Updated');
        }
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if (auth()-> user()-> id !== $post-> user_id) {
            return redirect('/posts')->with('error', 'Unauthorized Page'); 
        }

        if ($post->delete()) {
            return redirect('/posts')->with('success', 'Post Deleted');
        }
      
    }

    public function queryFacebook(Request $request, $id){
        //store request in a session
        Session::put('comment', $request->input('comment'));
        Session::put('postId', $id);

        return Socialite::driver('facebook')->redirect();        
    }


    public function commentStore()
    {
        $user = Socialite::driver('facebook')->user();
        $comment = new Comment();

        $comment->comment = Session::get('comment');
        $comment->post_id = Session::get('postId');
        $comment->name = $user->name;
        $comment->avatar = $user->avatar_original;
        $comment->time = "finder";
        $comment->save();

        Session::forget('comment');
        Session::forget('postId');

        return back()->with(['comment' => $comment]);
    }

}