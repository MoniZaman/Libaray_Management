@extends('layouts.app')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2" style="margin-top:50px;">
			<h1>Author Name</h1><hr>
			<div class="panel panel-default" >
				
				<div class="panel-heading">Author Name</div>
				<div class="panel-body">              		 
					<form method="post" class="form-horizontal" role="form"  action="{{URL::to('/home/authorlist/store')}}" enctype="multipart/form-data">
						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Author Name</label>
                            <div class="col-md-6">
								<input type="text" class="form-control" name="author_name" value="" placeholder="author name">
								<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
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
