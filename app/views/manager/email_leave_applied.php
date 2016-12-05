<div class="the-leave-status_email"></div>
<table class="table table-stiped table-bordered">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="5%">Employee Name</th>
			<th width="15%">Start Date</th>
			<th width="5%">End Date</th>
			<th width="5%">Application Date</th>
			<th width="5%">Leave Type</th>      					
			<th width="15%">Number of days</th>
			<th width="15%" colspan="2">Leave Status</th>
		</tr>
	</thead>
	<tbody>
        <?php $offset = $this->uri->segment(3, 0) + 1; ?>
        <?php foreach ($query as $row): ?>
			<tr>
				<td><?php echo $offset++ ?></td>
				<td><?php echo $row->surname; ?></td>
				<td><?php echo $row->startDate; ?></td>
				<td><?php echo $row->endDate; ?></td>
				<td><?php echo $row->applicationDate; ?></td>   					
				<td><?php echo $row->typeName; ?></td>
				<td><?php echo $row->numberOfDays; ?></td>
				<td><select style="border: 0px none;" class="form-control" id="leavestatus_email"  data-style="btn-primary" name="leavestatus">
                      <option value="" data-hidden="true" ><?php echo $row->statusName; ?></option>
                      <?php
                        foreach ($leavestatus as $leaves) {
                          ?>
                          <option value="<?php echo $leaves->id ?>" class="leavestatus" name="leavestatus"><?php echo $leaves->statusName ?></option>
                          <?php
                        }
                      ?>   
                   </select></td>
                   <td><button type="button" name="leavestats" data-idleavetype="<?=$row->idLeaveType?>" data-idrecord_email="<?=$row->id?>" data-numberofdays="<?=$row->numberOfDays?>" data-idemp="<?=$row->idEmployee?>" class="btn btn-xs btn btn-warning btn_leavestats_email">submit</button></td>
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

<script type="text/javascript">

		 	/*$('.pagination a').on('click', function () {
		 	event.stopPropagation();
        		event.preventDefault();  
		        var url = $(this).attr('href');
		        alert(url);
		        $(".all_leave_record_container").load(url);
		        return false;
		    });*/

		    $('.btn_leavestats_email').on('click', function () {
  
            var idrecord        = $(this).data("idrecord_email");
            var idLeaveType     = $(this).data("idleavetype");
            var idemp           = $(this).data("idemp");
            var NumberOfDays    = $(this).data("numberofdays");
            var idstatus        = $(this).closest("tr").find("#leavestatus_email").val();

            if(idstatus)  
           {  
                 if(confirm("Are you sure you want to change this leave status?"))
                 {
                    $.ajax({  
                       url:"<?=base_url();?>"+"index.php/Leave_application_c/email_approve_leave/"+idrecord+"/"+"<?=$this->uri->segment(3)?>",
                       method:"POST",  
                       data:{idrecord:idrecord, idstatus:idstatus, idemp:idemp, idLeaveType:idLeaveType, NumberOfDays:NumberOfDays },  
                       dataType:"text",  
                       success:function(data){  

                          $('.the-leave-status_email').append('<div class="alert alert-success">' +
                          '<span class="glyphicon glyphicon-ok"></span>' +
                          ' Leave Status Changed Successfully' +
                          '</div>');

                          setTimeout(function(){
                             $('.alert-success').hide();
                          }, 3000);
                       }  
                    });
                  event.stopPropagation();
                  event.preventDefault();
                 }       
                  
           }else{
            alert("Please select Leave Status!!!");
           } 
     });

</script>