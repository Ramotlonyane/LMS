  <div class="row">
    <div class="container-fluid">
       <div class="panel panel-primary">
          <div class="panel-heading">
             ADD LEAVE RECORDS FORM
          </div>
          <div class="panel-body">
             <div class="the-message"></div>
            <form class="form-horizontal" id="add-leaverecords-form" action="<?php echo base_url("index.php/Leave_records_c/add_leaveRecords");?>" METHOD="POST">
  			

  			 <div class="form-group">
                      <label class="control-label col-md-10 col-sm-12" for="nameOfUser">Select Name of User:</label>
                   <div class="col-md-12 col-sm-12">
                    <select id="nameOfUser" class="form-control" data-style="btn-primary" name="nameOfUser">
                      <option value="" data-hidden="true" class="nameOfUser">Select User</option>
                      <option value="Treasury" name="nameOfUser">Gabriel</option>
                   	</select>
                   </div>
             </div>	

			 <div class="form-group">
                      <label class="control-label col-md-10 col-sm-12" for="typeOfLeave">Select Type of Leave</label>
                   <div class="col-md-12 col-sm-12">
                    <select id="typeOfLeave" class="form-control" data-style="btn-primary" name="typeOfLeave">
                      <option value="" data-hidden="true" class="typeOfLeave">Select Type of Leave</option>
                      <option value="Treasury" name="typeOfLeave">Annual Leave</option>
                   	</select>
                   </div>
             </div>	
			
			<div class="form-group">
                      <label class="control-label col-md-12 col-sm-12" for="numberOfDays">Number of Days/Leave</label>
                   <div class="col-md-12 col-sm-12">
                      <input type="number" name="numberOfDays" id="numberOfDays" class="form-control"> 
                   </div>
             </div>	

              <div class="form-group">
                      <label class="control-label col-md-12 col-sm-12" for="recordsDescription">Description:</label>
                   <div class="col-md-12 col-sm-12">
                      <textarea type="text" name="recordsDescription" id="recordsDescription" class="form-control"></textarea>
                   </div>
             </div>			

             <div class="form-group">
                <div class="col-md-12 col-sm-12">
                   <button id="addleaveRecords" type="submit" name="submit" class="btn btn-primary">Add Record</button>
                </div>
             </div>

             </form>
             <div class="the-message"></div>
          </div>
       </div>
    </div>
 </div>

  <script type="text/javascript">
 	
 	 $('#add-leaverecords-form').submit(function(e) {
      e.preventDefault();

      var me = $(this);

      // perform ajax
      $.ajax({
         url: me.attr('action'),
         type: 'post',
         data: me.serialize(),
         dataType: 'json',
         success: function(response) {
            if (response.success == true) {
               // if success we would show message
               // and also remove the error class
               $('.the-message').append('<div class="alert alert-success">' +
                  '<span class="glyphicon glyphicon-ok"></span>' +
                  ' Leave Records Has Been Added Successfully' +
                  '</div>');
               $('.form-group .input-container').removeClass('has-error')
                               .removeClass('has-success');
               $('.text-danger').remove();

               // reset the form
               me[0].reset();

               // close the message after seconds
               $('.alert-success').delay(500).show(10, function() {
                  $(this).delay(3000).hide(10, function() {
                     $(this).remove();
                  });
               })
            }
            else {
               $.each(response.messages, function(key, value) {
                  var element = $('#' + key);
                  
                  element.closest('div.form-group')
                  .removeClass('has-error')
                  .addClass(value.length > 0 ? 'has-error' : 'has-success')
                  .find('.text-danger')
                  .remove();
                  
                  element.after(value);
               });
            }
         }
      });
   });

 </script>