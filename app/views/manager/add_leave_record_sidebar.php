
<table class="table table-stiped table-bordered">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="5%">Employee Name</th>
			<th width="15%">Leave Type</th>
			<th width="5%">Number Of Leaves</th>    					
			<th width="15%">Description</th>
		</tr>
	</thead>
	<tbody>
        <?php $offset = $this->uri->segment(3, 0) + 1; ?>
        <?php foreach ($query->result() as $row): ?>
			<tr>
				<td><?php echo $offset++ ?></td>
				<td><?php echo $row->surname; ?></td>
				<td><?php echo $row->typeName; ?></td>
				<td><?php echo $row->numberOfLeaves; ?></td>   					
				<td><?php echo $row->description; ?></td>
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