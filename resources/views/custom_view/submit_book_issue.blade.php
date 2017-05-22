@extends('layouts.app')
@section('content')

<script>
$(document).ready(
	
	/* This is the function that will get executed after the DOM is fully loaded */
	function () {
		$( "#datepicker" ).datepicker({
			  changeMonth: true,//this option for allowing user to select month
			  changeYear: true //this option for allowing user to select from year range
			});
		
	}
	);

</script>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2" style="margin-top:50px;">
			<h1>Issue Book Submit</h1><hr>
			<div class="panel panel-default">			
				<div class="panel-heading">Issue Book Submit</div>
				<div class="panel-body">              		 
					<form method="post" class="form-horizontal" role="form"  action="{{URL::to('/home/book_issue_submit/store')}}" enctype="multipart/form-data"> 
						<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
						<input name="id" type="hidden" value="{{ $bookissue->id}}"/>						      
						<div class="form-group">
                            <label  class="col-md-4 control-label">Submit Date</label>
                            <div class="col-md-6">
								<input type="text" id="datepicker" class="form-control" name="submited_date" value="" placeholder="Submit Date">						      						     
							</div>	
						</div>
						 <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                            </div>
                        </div>
					</form>	
				</div>
			</div>
		</div>      
	</div>
</div>

@stop