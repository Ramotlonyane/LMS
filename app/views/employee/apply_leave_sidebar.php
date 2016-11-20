
<table class="table table-stiped table-bordered">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="5%">Start Date</th>
			<th width="15%">End Date</th>
			<th width="5%">Application Date</th>    					
			<th width="15%">Number Of Days</th>
		</tr>
	</thead>
	<tbody>
        <?php $offset = $this->uri->segment(3, 0) + 1; ?>
        <?php foreach ($query->result() as $row): ?>
			<tr>
				<td><?php echo $offset++ ?></td>
				<td><?php echo $row->startDate; ?></td>
				<td><?php echo $row->endDate; ?></td>
				<td><?php echo $row->applicationDate; ?></td>   					
				<td><?php echo $row->numberOfDays; ?></td>
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