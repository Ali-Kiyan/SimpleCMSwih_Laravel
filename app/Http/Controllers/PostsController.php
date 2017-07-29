<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\View\Middleware\ErrorBinder;


use App\Http\Requests;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {

//          $posts = Post::latest()->get(); //getting the lates post provide by laravel functions
//          $posts = Post::orderBy('id', 'desc')->get(); //another alternative for latest post provided by laravel
//          $posts = Post::all(); //getting all posts
        $posts = Post::latest();

        return view('posts.index', compact('posts'));
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
//        first way of validation the second way is by changing the argument to the related request class and difine the validation rule there
//        $this->validate($request, [
//
//            'title' => 'required|max:4'
//
//        ]);







//        return $request->title;
//        return $request->all();
//        return $request->get('title');
//        first way

          Post::create($request->all());

          return redirect('/posts');

//          second way

//          $input = $request->all();
//          $input['title'] = $requst->title;
//
//          Post::create($request->all());

//          third way


//            $post = new Post;
//
//            $post->title = $request->title;
//
//            $post->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $post = Post::findOrfail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $post = Post::findOrFail($id);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $post = Post::findOrFail($id);
        $post->update($request->all());
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
//        $post = Post::findOrFail($id);
//        $post->delete();
//      or another alternative to the last two lines
          $post = Post::whereId($id)->delete();


        return redirect('/posts');




    }


    public function contact()
    {



        $people = ['Ali', 'Edwin', 'Jose', 'James', 'peter', 'Maria'];
        return view('contact', compact('people'));


    }



    Public function show_post($id, $name, $password){


//        return view('post')->with('id',$id);
          return view('post',compact('id','name','password'));

    }
}


