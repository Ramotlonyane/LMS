  <div class="row">
    <div class="container-fluid">
       <div class="panel panel-primary">
          <div class="panel-heading">
             ADD LEAVE TYPE FORM
          </div>
          <div class="panel-body">
             <div class="the-message"></div>
            <form class="form-horizontal" id="add-leavetype-form" action="<?php echo base_url("index.php/Leave_type_c/add_LeaveType");?>" METHOD="POST">
  				
			 <div class="form-group">
                      <label class="control-label col-md-10 col-sm-12" for="leave_name">Name:</label>
                   <div class="col-md-12 col-sm-12">
                      <input type="text" name="leave_name" id="leave_name" class="form-control">
                   </div>
             </div>	
              <div class="form-group">
                      <label class="control-label col-md-12 col-sm-12" for="leave_name">Description:</label>
                   <div class="col-md-12 col-sm-12">
                      <textarea type="text" name="description" id="description" class="form-control"></textarea>
                   </div>
             </div>			

             <div class="form-group">
                <div class="col-md-12 col-sm-12">
                   <button id="addleaveRecords" type="submit" name="submit" class="btn btn-primary">Add Leave Type</button>
                </div>
             </div>

             </form>
             <div class="the-message"></div>
          </div>
       </div>
    </div>
 </div>

 <script type="text/javascript">
 	
 	 $('#add-leavetype-form').submit(function(e) {
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
                  ' Leave Type Has Been Added Successfully' +
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