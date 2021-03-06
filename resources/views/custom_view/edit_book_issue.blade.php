@extends('layouts.app')
@section('content')

<link rel="stylesheet" type="text/css" href="my.css">



<script type="text/javascript">

$(function(){	
	$('.add').click(function(){
		
		var product=$('.book_name').html();
		var n =($('.body tr').length)+1;
		var tr= '<tr class="tbody">'+					
		'<td><select name="book_name[]" class="form-control book_name ">'+product+' </select></td>'+
		'<td><input type="text" name="isbn_number[]" class="isbn_number form-control"  placeholder="isbn_number" autocomplete="off"></td>'+				        
		'<td style="text-align:center"><a class="btn btn-primary delete"> <span class="glyphicon glyphicon-trash"></span>Detete</a></td></tr>';          

		rowCount=($('#table').find('tbody tr').length);
	            //alert(rowCount);
	            if (rowCount<3) {
	            	$('.body').append(tr);
	            	$('.total_book').val(n);  
	            }
	            else{
	            	alert("Not more than 3 ");
	            }                           
	        });
	

	$('.body').delegate('.delete','click',function(){
		var n =($('.body tr').length);
		if (n>1)
		{
			$(this).parent().parent().remove();
			$('.total_book').val(n-1);   
		}
		
	});		
	$('.body').delegate('.book_name','change',function(){
		var tr=$(this).parent().parent();
		var price=tr.find('.book_name option:selected').attr('data-price');
		tr.find('.isbn_number').val(price);
		
	});

});

$(document).ready(function($) {
	$('#auto').autocomplete({
		source:'getdata',
		minlength:1,
		autofocus:true,
		select:function(event,ui){
			$("getdata").val(ui.item.value);
		}
	});
});

</script>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2" style="margin-top:50px;">
			<h1>Edit Book Issue</h1><hr>
			<div class="panel panel-default">			
				<div class="panel-heading">Edit Book Issue</div>
				<div class="panel-body">              		 
					<form method="post" class="form-horizontal" role="form"  action="{{URL::to('/home/book_issue_list/update')}}" enctype="multipart/form-data">
						<div class="form-group">
                            <label  class="col-md-4 control-label">Student ID</label>
                            <div class="col-md-6">
								<input type="text" class="form-control" name="student_id" value="{{$bookissue->student_id}}" placeholder="author name">
								<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
								<input name="id" type="hidden" value="{{ $bookissue->id}}"/>
							</div>
								
						</div>
						<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Student Name</label>
                            <div class="col-md-6">
								<input type="text" class="form-control" name="student_name" value="{{$bookissue->student_name}}" placeholder="author name">						     
							</div>
						</div>
						<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Issue Date</label>
                            <div class="col-md-6">
								<input type="text" class="form-control" name="issue_date" value="{{$bookissue->issue_date}}" placeholder="author name">						      						     
							</div>
						</div>
						<input type="hidden" name="total_book" class="total_book" value="">
						<table class="table table-bordered" id="table">
							<thead>
								<tr >	
									<td></td>		        
									<td style="text-align:center"> 
										<input type="button" class="btn btn-primary add" name="" value="Add more book">
									</td> 	
									<td></td>								      
								</tr>
							</thead>
							<tbody class="body">
								@for ($i = 0; $i <$bookissue->total_book; $i++)	
								<tr >
									
									<!-- <th class="no">{{$i+1}}</th> -->
									<td>
										<select name=" book_name[]" class="form-control  book_name">
											<option selected value="">select</option>	
											<?php 
											foreach($book as $books){
												?>	
												
												<option data-price="{{$books->isbn_number}}" value="{{$books->book_name}}"><?php echo $books->book_name; ?></option>
												
												<?php 
											}
											?>				                					              
										</select>
										
									</td>
									<td><input type="text" name="isbn_number[]" class="isbn_number form-control"  placeholder="isbn_number" autocomplete="off"></td>				        
									<td style="text-align:center"><a class="btn btn-primary delete "> <span class="glyphicon glyphicon-trash"></span>Detete</a></td>				        
								</tr>
								@endfor							       
							</tbody>
						</table>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>	
					


				</div>
			</div>
		</div>
		
	</div>
</div>
<script type="text/javascript">

</script>
@stop