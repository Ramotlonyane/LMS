
<table class="table table-stiped table-bordered">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="5%">Employee Name</th>
			<th width="15%">Leave Type</th>
			<th width="5%">Number Of Leaves</th>    					
			<th width="15%">Description</th>
			<th width="15%" style="text-align: center;" colspan="3">Action</th>
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
				<td width="5%" style="text-align: center;"><button type="button" class="btn btn-xs btn btn-info">Preview</button></td>
				<td width="5%" style="text-align: center;"><button type="button" name="editrecord_btn" data-editrecord="<?=$row->id?>" class="btn btn-xs btn btn-warning btn_edit_record">Edit</button></td>
				<td width="5%" style="text-align: center;"><button type="button" name="deleterecord_btn" data-deleterecord="<?=$row->id?>" class="btn btn-xs btn-danger btn_delete_record">Delete</button></td>
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

<script type="text/javascript">
	$(document).ready(function(){
		
		 $(document).on('click', 'ul.pagination a', function(){
		 	event.stopPropagation();
        		event.preventDefault();  
		        var url = $(this).attr('href');
		        alert(url);
		        $(".all_leave_record_container").load(url);
		        return false;
		    });

		  $(document).on('click', '.btn_delete_record', function(){  
	           var id=$(this).data("deleterecord");
	           if(confirm("Are you sure you want to delete this record?"))  
		           {  
		                $.ajax({  
		                     url:"index.php/Leave_records_c/delete_leaveRecord/"+id,
		                     method:"POST",  
		                     data:{id:id},  
		                     dataType:"text",  
		                     success:function(data){ 
		                     //window.location.reload(); 
		                        $(".all_leave_record_container").html(data);

		                     }  
		                });  
		           }  
		      });
		});
</script>