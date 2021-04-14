<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\article;

class createcontroller extends Controller
{
    public function home(){

    	$articles = article::all();
    	return view('home', ['articles' => $articles]);
    }

    public function create(){
        return view('add');
    }


    public function add(Request $request){
    	$this->validate($request, [
    		'title' => 'required',
    		'description' => 'required']);

    	$articles = new article;
    	$articles->title = $request->input('title');
    	$articles->description = $request->input('description');
    	$articles->save();

    	return redirect('/')->with('info', 'Post saved successfully!');
    }

    public function update($id){
    	$article = article::find($id);
    	return view('update', ['article' => $article]);
    }

    public function edit(Request $request,$id){
    	$this->validate($request, [
    		'title' => 'required',
    		'description' => 'required']);

        $article = article::findOrFail($id);

        $article->title = $request->input('title');
        $article->description = $request->input('description');
        $article->save();

    	return redirect('/')->with('info', 'update successfully!');
    
    }

    public function read($id){
    	$articles = article::find($id);
    	return view('read', ['article' => $articles]);
    }

    public function delete($id){
        $article = article::findOrFail($id);

    	$article->delete();

    	return redirect('/')->with('info', 'Delete successfully');
    }
}
