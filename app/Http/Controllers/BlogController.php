<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_post = Blog::orderBy('created_at', 'desc')->get();
        return view('welcome')->with('all_post', $all_post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post_data');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post_obj = new Blog();

        $post_obj->post_title = $request->input('title');
        $post_obj->post_body = $request->input('body');
        $post_obj->post_image = '';

        if($request->file('photo')){
            $file= $request->file('photo');

        /* Determine the file's extension based on the file's MIME type... eg; png, jpeg, jpg, etc */
            $extension = $file->extension();

        /* Determine the file's extension based on the file's MIME type... eg; png, jpeg, jpg, etc by using this as well*/
            //$extension = $file->getClientOriginalExtension();

        /* redirect with error if extension is not correct or acceptred */
        if ($extension != 'png' && $extension != 'jpg' && $extension != 'jpeg') {
            $error = "INVALID FILE: Only png, jpeg & jpg are allowed";
            return redirect(route('post.create'))->withInput()->with('error', $error);
        }

        /* Generate a unique file name using this */
            //$filename= date('YmdHi').$file->getClientOriginalName();
            

        /* Generate a unique, random name... by using larave; hashName() helper function*/
            $filename = $file->hashName(); 
            

        /*The following line of code will upload an image into the public/uploads directory:*/
            $file-> move(public_path('uploads'), $filename);


        /*The following line of code will all upload an image into the public/uploads directory and return the file pathe so you can store to database:*/
            //$filename = $request->file('image')->store('public/images');

            $post_obj->post_image = $filename;
        }
        

        if ($post_obj->save()) {
            $successful = "Post added successfully";
            return redirect('/')->with('success', $successful);
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
        //
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
        //
    }
}
