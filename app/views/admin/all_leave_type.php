<div class="row">
	<div class="container-fluid">
		<div class="panel panel-primary">
			<div class="panel-body search-box">
				<form class="form-inline">
				<div id="errorsearch"></div>
					<div class="form-group">
						<label for="email">Name:</label>
      					<input type="text" class="form-control" name="leavename" id="nameOfLeave" placeholder="Search by Name">
					</div>
					 <div class="form-group">
      					<label for="pwd">Number Of Leave:</label>
      					<input type="number" class="form-control" id="leaveNumber" placeholder="Search by Number">
    				</div>
    				<button type="button" id="search_leave" value="search" class="btn btn-default search_leave">Search</button>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="the-edit-message"></div>
<table class="table table-stiped table-bordered">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="15%">Name</th>
			<th width="5%">Number Of Leave</th>    					
			<th width="15%">Description</th>
			<th style="text-align: center;" colspan="3">Action</th>
		</tr>
	</thead>
	<tbody>
        <?php $offset = $this->uri->segment(3, 0) + 1; ?>
        <?php foreach ($query->result() as $row): ?>
			<tr>
				<td><?php echo $offset++ ?></td>
				<td id="name" contenteditable><?php echo $row->name; ?></td>
				<td id="numberOfLeaves" contenteditable><?php echo $row->numberOfLeaves; ?></td>    					
				<td id="description" contenteditable><?php echo $row->description; ?></td>
				<td width="5%" style="text-align: center;"><button type="button" class="btn btn-xs btn btn-info">Preview</button></td>
				<td width="5%" style="text-align: center;"><button type="button" name="edit_btn" data-id2="<?=$row->id?>" class="btn btn-xs btn btn-warning btn_edit">Edit</button></td>
				<td width="5%" style="text-align: center;"><button type="button" name="delete_btn" data-id3="<?=$row->id?>" class="btn btn-xs btn-danger btn_delete">Delete</button></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<nav class='text-center'>
    <?php /*echo $pagination_links;*/ ?>
	<!-- <ul class="pagination">
		<li><a href="">1</a></li>
		<li><a href="">2</a></li>
		<li><a href="">3</a></li>
	</ul> -->
</nav>