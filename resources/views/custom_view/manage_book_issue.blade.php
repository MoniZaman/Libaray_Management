@extends('layouts.app')
@section('content')
<script type="text/javascript" src="{{asset('js/jquery.searchable.js')}}"></script>
<script type="text/javascript">

$(document).ready(function($) {
	$( '#table' ).searchable();
});

</script>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2" style="margin-top:50px;">
			<h1>Manage Book</h1><hr>
			<div class="panel panel-default" >
				
				<div class="panel-heading">Manage Book </div>
				
				
				<div class="panel-body">  
					<div class="form-inline">
						<label for="email">Search:</label>
						<input type="search" class="form-control" id="search" name="search" value="" placeholder="Search Book" autocomplete="off">						      						     
					</div>   
					<br>         		 
					<table class="table table-bordered" id="table">
						<thead>
							<tr>
								<th>Student ID</th>
								<th style="text-align:center">Name</th>
								<th style="text-align:center">Issued Date</th>
								<th style="text-align:center">Total Book</th>
								<th style="text-align:center">Submited Date</th>
								<th style="text-align:center">Action</th>
								
							</tr>
						</thead>
						<tbody>
							
							@foreach ($bookissues as $bookissue)
							<tr>
								<td>{{$bookissue->student_id}}</td>
								<td style="text-align:center">{{$bookissue->student_name}}</td>

								<td style="text-align:center">{{$bookissue->issue_date}}</td>
								<td style="text-align:center">{{$bookissue->total_book}}</td>
								
								<td style="text-align:center">
									@if($bookissue->submited_date==0)
									Not Submited
									@else
									{{$bookissue->submited_date}}
									@endif
								</td>
								
								<td style="text-align:center">  
									<a  href="<?=URL::to('/home/book_issue_list_edit',array($bookissue->id))?>"  class="btn btn-primary"><span class="glyphicon glyphicon-edit">Edit</a>
									<a  onclick="return check()" href="<?=URL::to('/home/book_issue_list_delete',array($bookissue->id))?>" class="btn btn-danger">
										<span class="glyphicon glyphicon-trash"></span>Detete</a>
										<a  href="<?=URL::to('/home/book_issue_list_submit',array($bookissue->id))?>" class="btn btn-primary">
											<span class="glyphicon glyphicon-trash"></span>Submit</a>
										</td>
										
									</tr>
									@endforeach	
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>


		@stop
	</div>
</div>


