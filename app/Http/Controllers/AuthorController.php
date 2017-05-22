<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\AuthorModel;
use Illuminate\Support\Facades\Input;

class AuthorController extends Controller
{
  public function store(Request $request){
   $author= new AuthorModel();
   $author->author_name=$request->author_name;
   $author->save();
   return redirect('/home/manage_author');
 }
 public function edit($id){
   $author= AuthorModel::find($id)->where('id',$id)->first();    
   return view('custom_view.edit_author',compact('author'));
 }
 public function update(Request $request){
  $id=$request->input('id');
  $author= AuthorModel::find($id);
  $author->author_name=$request->author_name;
  $author->save();
  return redirect('/home/manage_author');
}
public function delete($id){
 AuthorModel::find($id)->delete();    
 return redirect('/home/manage_author');
}
}
