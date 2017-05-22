<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\BookIssue;
use App\BookIssueList;
class BookIssueController extends Controller
{   



  public function store(Request $request){
    $bookissue= new BookIssue();
    $bookissue->student_id=$request->student_id;
    $bookissue->student_name=$request->student_name;
    $bookissue->issue_date=date('Y-m-d');
    $bookissue->total_book=$request->total_book;
        //$bookissue->submited_date="Not Submited";
    $bookissue->save();

    $id=$bookissue->id;
    
    if ($id>0) {
      for ($i=0; $i <count($request->book_name) ; $i++) { 
        $bookissuelist=new BookIssueList();
        $bookissuelist->bookissue_id=$id;
        $bookissuelist->book_name=$request->book_name[$i];
        $bookissuelist->book_isbn_number=$request->isbn_number[$i];
        $bookissuelist->save();
        
      } 
    }

    return redirect('/home/manage_book_issue');
  }


  public function edit($id){
    $bookissue= BookIssue::find($id)->where('id',$id)->first();    
    return view('custom_view.edit_book_issue',compact('bookissue'));

  }
  public function update(Request $request){
    $id=$request->input('id');
    $bookissue= BookIssue::find($id);
    $bookissue->student_id=$request->student_id;
    $bookissue->student_name=$request->student_name;
    $bookissue->issue_date=date('Y-m-d');
    $bookissue->total_book=$request->total_book;
        //$bookissue->submited_date="Not Submited";
    $bookissue->save();

    $id=$bookissue->id;
    
    if ($id>0) {
      for ($i=0; $i <count($request->book_name) ; $i++) { 
        $bookissuelist=new BookIssueList();
        $bookissuelist->bookissue_id=$id;
        $bookissuelist->book_name=$request->book_name[$i];
        $bookissuelist->book_isbn_number=$request->isbn_number[$i];
        $bookissuelist->save();             
      } 
    }
    return redirect('/home/manage_book_issue');
  }
  public function delete($id){
    BookIssue::find($id)->delete();    
    return redirect('/home/manage_book_issue');
  }
  public function submit($id){
   $bookissue= BookIssue::find($id)->where('id',$id)->first();      
   return view('custom_view.submit_book_issue',compact('bookissue'));
 }
 public function book_submited(Request $request){
  $id=$request->input('id');
  $bookissue= BookIssue::find($id);
  $bookissue->submited_date=$request->submited_date;
  $bookissue->save();
  return redirect('/home/manage_book_issue');
}

public function book_issue_submit(Request $request){
    $id=$request->input('id');
    $bookissue= BookIssue::find($id);
    $bookissue->submited_date=$request->submited_date;
    $bookissue->save();
    return redirect('/home/manage_book_issue');
}




}
