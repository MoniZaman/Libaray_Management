@extends('layouts.app')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2" style="margin-top:50px;">
			<h1> Category Listing</h1><hr>
			<div class="panel panel-default" >
				
				<div class="panel-heading">Category Listing</div>
				<div class="panel-body">              		 
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Categoryname</th>		       
								<th style="text-align:center">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach($author as $authors){
								?>
								<tr>
									<td><?php echo $authors->author_name; ?></td>
									
									
									<td style="text-align:center">  
										<a  href="<?=URL::to('/home/author_edit',array($authors->id))?>"  class="btn btn-primary"><span class="glyphicon glyphicon-edit">Edit</a>
										<a  onclick="return check()" href="<?=URL::to('/home/author_delete',array($authors->id))?>" class="btn btn-danger">
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
	