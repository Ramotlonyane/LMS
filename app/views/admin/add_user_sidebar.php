<table class="table table-stiped table-bordered">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="5%">Surname</th>
			<th width="15%">Initials</th>
			<th width="5%">Persal Number</th>    					
			<th width="15%">Telephone</th>
		</tr>
	</thead>
	<tbody>
        <?php $offset = $this->uri->segment(3, 0) + 1; ?>
        <?php foreach ($query->result() as $row): ?>
			<tr>
				<td><?php echo $offset++ ?></td>
				<td><?php echo $row->surname; ?></td>
				<td><?php echo $row->initial; ?></td>
				<td><?php echo $row->persalNum; ?></td>   					
				<td><?php echo $row->telephone; ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<nav class='text-center'>
    <?php echo $pagination_links; ?>
	<!-- <ul class="pagination">
		<li><a href="">1</a></li>
		<li><a href="">2</a></li>
		<li><a href="">3</a></li>
	</ul> -->
</nav>