@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Book</div>
                <div class="panel-body">           		 
					<form method="post" class="form-horizontal" role="form"  action="{{URL::to('/home/booklist/store')}}" enctype="multipart/form-data">
						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Book Name</label>
                            <div class="col-md-6">
								<input type="text" class="form-control" name="book_name" value="{{$book->book_name}}" placeholder="book name">
								<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
						    </div>
						</div>
						
						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Category</label>
                            <div class="col-md-6">
								<select name="category_name" class="form-control">
									<?php 
									foreach($category as $categorys){
										?>	
										<option value="{{$categorys->category_name}}"><?php echo $categorys->category_name; ?></option>
										
										<?php 
									}
									?>				                					              
								</select>
							</div>
						</div>
						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Author</label>
                            <div class="col-md-6">
								<select name="author_name" class="form-control">
									<?php 
									foreach($author as $authors){
										?>	
										<option value="{{$authors->author_name}}"><?php echo $authors->author_name; ?></option>
										
										<?php 
									}
									?>				                					              
								</select>
							</div>
						</div>
						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Select another auother name</label>
                            <div class="col-md-6">
						        <input type="text" class="form-control" name="another_author_name" value="{{$book->another_book_name}}" placeholder="book name">
						    </div>	
						</div>    		   
						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">ISBN</label>
                            <div class="col-md-6">
								<input type="text" class="form-control" name="isbn_number" value="{{$book->isbn_number}}" placeholder="ISBN number">
							</div>
						</div>
						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Price</label>
                            <div class="col-md-6">
								<input type="text" class="form-control" name="price" value="{{$book->price}}" placeholder="Price">
							</div>
						</div>
						 <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Submit
                                </button>
                            </div>
                        </div>
						<!-- <button type="submit" class="btn btn-primary">Submit</button> -->
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@stop