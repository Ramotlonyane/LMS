<h4>Add User Page</h4>
 <div class="row">
    <div class="container">
       <div class="panel panel-default">
          <div class="panel-heading">
             ADD USER FORM
          </div>
          <div class="panel-body">
             <div class="register-message"></div>
             <form class="form-horizontal well" id="form-add-user" action="<?php echo base_url("index.php/Employee_c/add_Employee");?>" METHOD="POST">
				
 				<div class="form-group">
                   	<div class="col-md-1 col-sm-3">
                      <label for="name">Name:</label>
                   	</div>
                   	<div class="col-md-3 col-sm-3">
                      <input type="text" name="name" id="name" class="form-control">
                	</div>
             	</div>

             	<div class="form-group">
                   	<div class="col-md-1 col-sm-3">
                      <label for="surname">Surname:</label>
                   	</div>
                   	<div class="col-md-3 col-sm-3">
                      <input type="text" name="surname" id="surname" class="form-control">
                	</div>
             	</div>

             	<div class="form-group">
                   	<div class="col-md-1 col-sm-3">
                      <label for="address">Address:</label>
                   	</div>
                   	<div class="col-md-3 col-sm-3">
                      <input type="text" name="address" id="address" class="form-control">
                	</div>
             	</div>

             </form>
             <div class="register-message"></div>
          </div>
       </div>
    </div>
 </div>