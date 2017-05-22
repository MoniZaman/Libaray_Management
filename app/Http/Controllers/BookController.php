<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\BookModel;
use Illuminate\Support\Facades\Input;

class BookController extends Controller
{
  public function store(Request $request){
   $book= new BookModel();
   $book->book_name=$request->book_name;
   $book->category_name=$request->category_name;
   $book->author_name=$request->author_name;
   $book->another_author_name=$request->another_author_name;
   $book->isbn_number=$request->isbn_number;
   $book->price=$request->price;
   $book->save();
   return redirect('/home/manage_book');
 }
 public function edit($id){
   $book= BookModel::find($id)->where('id',$id)->first();    
   return view('custom_view.edit_book',compact('book'));
 }
 public function update(Request $request){
  $id=$request->input('id');
  $book= BookModel::find($id);
  $book->book_name=$request->book_name;
  $book->category_name=$request->category_name;
  $book->author_name=$request->author_name;
  $book->another_author_name=$request->another_author_name;
  $book->isbn_number=$request->isbn_number;
  $book->price=$request->price;
  $book->save();
  return redirect('/home/manage_book');
}
public function delete($id){
 BookModel::find($id)->delete();    
 return redirect('/home/manage_book');
}


}
