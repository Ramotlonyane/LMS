  <div class="row">
    <div class="container-fluid">
       <div class="panel panel-primary">
          <div class="panel-heading">
             ADD NEW USER FORM
          </div>
          <div class="panel-body">
             <div class="the-message"></div>
            <form class="form-horizontal" id="form-add-user" action="<?php echo base_url("index.php/Employee_c/add_Employee");?>" METHOD="POST">

             <div class="form-group data">
                      <label class="control-label col-md-12 col-sm-12" for="surname">Surname:</label>
                   <div class="col-md-12 col-sm-12 input-container">
                      <input type="text" name="surname" id="surname" class="form-control">
                   </div>
             </div>
             
             <div class="form-group data">
                   <label class="control-label col-md-12 col-sm-12" for="initial">Initials:</label>
                <div class="col-md-12 col-sm-12 input-container">
                   <input type="text" name="initial" id="initial" class="form-control">
                </div>
             </div>

             <div class="form-group data">
                   <label class="control-label col-md-12 col-sm-12" for="persalnum">Persal:</label>
                <div class="col-md-12 col-sm-12 input-container">
                   <input type="text" name="persalnum" id="persalnum" class="form-control">                    
                </div> 
             </div>

             <div class="form-group data">
                   <label class="control-label col-md-12 col-sm-12" for="shift">Shift Worker:</label>
                <div class="col-md-12 col-sm-12 input-container radio">
                   <label><input class="shift-radio-yes" type="radio" name="shift">Yes</label>
                   <label><input class="shift-radio-no" type="radio" name="shift">No</label>
                   <div id="radioshift"></div> 
                </div>
             </div>

             <div class="form-group data">
                  <label class="control-label col-md-12 col-sm-12" for="address">Address:</label>
                <div class="col-md-12 col-sm-12 input-container">
                   <textarea type="text" name="address" id="address" class="form-control"></textarea>
                </div> 
             </div>

             <div class="form-group data">
                  <label class="control-label col-md-12 col-sm-12" for="casual">Casual Worker:</label>
                <div class="col-md-12 col-sm-12 input-container radio">
                   <label><input class="casual-radio-yes" type="radio" name="casual">Yes</label>
                   <label><input class="casual-radio-no" type="radio" name="casual">No</label>
                   <div id="radiocasual"></div> 
                </div>
             </div>

             <div class="form-group data">
                   <label class="control-label col-md-12 col-sm-12" for="telnum">Tel. No:</label>
                <div class="col-md-12 col-sm-12 input-container">
                   <input type="text" name="telnum" id="telnum" class="form-control">
                </div>   
             </div>

              <div class="form-group data">
                   <label class="control-label col-md-12 col-sm-12" for="department">Department:</label>
                <div class="col-md-12 col-sm-12 input-container">
                    <select id="department" class="form-control" data-style="btn-primary" name="department">
                      <option value="" data-hidden="true" class="department">Select Department</option>
                      <option value="Treasury" name="department">Treasury</option>
                   </select>
                 </div> 
             </div>

             <div class="form-group data">
                   <label class="control-label col-md-12 col-sm-12" for="Component">Component:</label>
                 <div class="col-md-12 col-sm-12 input-container">
                    <select id="component" class="form-control" data-style="btn-primary" name="component">
                      <option value="" data-hidden="true" class="component">Select Component</option>
                      <option value="IT" name="component">IT</option>
                   </select>
                 </div>
             </div>

  
             <div class="form-group">
                <div class="col-md-3 col-sm-4">
                   <button id="add_user" type="submit" name="submit" class="btn btn-primary">Add User</button>
                </div>
             </div>
             </form>
             <div class="the-message"></div>
          </div>
       </div>
    </div>
 </div>

 <script type="text/javascript">
   
    $('#form-add-user').submit(function(e) {
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
                  ' New User Has Been Added Successfully' +
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
                  
                  element.closest('div.form-group .input-container')
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