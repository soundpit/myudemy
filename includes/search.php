<?php

//this is the search box.
//i need to put an update button here. to update the times.

?>

<div class="col-md-6 col-md-offset-3 shadow" >

	
	<div class="row">

	<h4 class='col-md-12'>SEARCH<span id="result_info"></span></h4>

	</div>
	
	<div class="row">
		<div class="col-md-12 form-group">
			<input id="search_box" class="form-control" placeholder="Search By Course Title or Tutor Name..">
		</div>
	</div>

		<div class="row">
		<div class="col-md-6  form-group">
			<select class="form-control" id="sort_by">
				<option value='title'>Course Title</option>
				<option value='tutor'>Course Tutor</option>
				<option value='duration'>Course Duration</option>
	
			</select>
		</div>
		
				<div class="col-md-4  col-md-offset-1 form-group checkbox">
  			<label><input id="checked" type="checkbox" value="">Match whole word</label>
		</div>

		

	</div><!-- /row -->

	
	<div class="row">
		
		<div class="col-md-5 form-group">
			<select class="form-control" id="order_by">
				<option value='asc'>Ascending</option>
				<option value='desc'>Descending</option>
			</select>
		</div>

		<div class="col-md-5  col-md-offset-2 form-group">
			<button id="search_button" class="form-control">Search..</button>
		</div>
		

		
	</div> <!-- /row -->
	
	

</div>

<div class="col-md-2 col-md-offset-1 form-group">
		<button id="update_button" class="form-control">Update Duration</button>
</div>

