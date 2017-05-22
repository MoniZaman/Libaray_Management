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
					<!-- <div class="form-group">
                            <label  class="col-md-4 control-label">Search</label>
                            <div class="col-md-6">
                            	<input type="search" class="form-control" id="search" name="search" value="" placeholder="Search Book" autocomplete="off">
                            </div>
                    </div> -->
                     <br>                   		 
					<table class="table table-bordered" id="table">
						<thead>
							<tr>
								<th>Book name</th>
								<th style="text-align:center">Author</th>
								<th style="text-align:center">Category</th>
								<th style="text-align:center">ISBN</th>
								<th style="text-align:center">Price</th>
								<th style="text-align:center">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach($book as $books){
								?>
								<tr>
									<td><?php echo $books->book_name; ?></td>
									<td style="text-align:center"><?php echo $books->author_name; ?></td>

									<td style="text-align:center"><?php echo $books->category_name; ?></td>
									<td style="text-align:center"><?php echo $books->isbn_number; ?></td>
									<td style="text-align:center"><?php echo $books->price; ?></td>
									
									<td style="text-align:center">  
										<a  href="<?=URL::to('/home/booklist_edit',array($books->id))?>"  class="btn btn-primary"><span class="glyphicon glyphicon-edit">Edit</a>
										<a  onclick="return check()" href="<?=URL::to('/home/booklist_delete',array($books->id))?>" class="btn btn-danger">
											<span class="glyphicon glyphicon-trash"></span>Detete</a>
										</td>
										
									</tr>
									<?php 
								} 
								?>		
								
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


