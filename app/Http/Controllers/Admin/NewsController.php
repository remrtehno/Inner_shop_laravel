<?php

namespace App\Http\Controllers\Admin;

use App\News;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        return view('admin.news.index',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' =>'required',
            'text'   =>  'required',
            'anonce'   =>  'required',
            'text'   =>  'required',

            'img' =>  'nullable|image'
        ]);


        $prod = News::add($request->all());
        $prod->uploadImage($request->file('img'));
        return redirect()->route('news.index');
    }


    public function userCreate(Request $request) {
        $request = $request->all();
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return $this->index();
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
        $sl = News::find($id);
        return view('admin.news.edit',compact('sl'));
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
        $this->validate($request, [
            'title' =>'required',
            'text'   =>  'required',
            'anonce'   =>  'required',
            'text'   =>  'required',

            'img' =>  'nullable|image'
        ]);

        $post = News::find($id);

        $post->edit($request->all());
        $post->uploadImage($request->file('img'));



        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        if($news->img !=''){


            Storage::delete('/uploads/news/small/' . $news->img);
            Storage::delete('/uploads/news/big/' . $news->img);


        }
        $news->delete();

        return redirect()->route('news.index');
    }
}
