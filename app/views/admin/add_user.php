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
                   <label class="control-label col-md-12 col-sm-12" for="username">Username:</label>
                <div class="col-md-12 col-sm-12 input-container">
                   <input type="text" name="username" id="username" class="form-control">                    
                </div> 
             </div>

             <div class="form-group data">
                   <label class="control-label col-md-12 col-sm-12" for="email">Email:</label>
                <div class="col-md-12 col-sm-12 input-container">
                   <input type="email" name="email" id="email" class="form-control">                    
                </div> 
             </div>

              <div class="form-group data">
                   <label class="control-label col-md-12 col-sm-12" for="password">Password:</label>
                <div class="col-md-12 col-sm-12 input-container">
                   <input type="password" name="password" id="password" class="form-control">                    
                </div> 
             </div>

               <div class="form-group data">
                   <label class="control-label col-md-12 col-sm-12" for="confirmPassword">Confirm Password:</label>
                <div class="col-md-12 col-sm-12 input-container">
                   <input type="password" name="confirmPassword" id="confirmPassword" class="form-control">                    
                </div> 
             </div>

             <div class="form-group data">
                   <label class="control-label col-md-12 col-sm-12" for="role">Role:</label>
                <div class="col-md-12 col-sm-12 input-container">
                    <select id="role" class="form-control" data-style="btn-primary" name="role">
                      <option value="" data-hidden="true" class="role">Select Role</option>
                      <?php
                        foreach ($role as $rolle) {
                          ?>
                          <option value="<?php echo $rolle->id ?>" name="role"><?php echo $rolle->name ?></option>
                          <?php
                        }
                      ?>
                      
                   </select>
                 </div> 
             </div>

             <div class="form-group data">
                   <label class="control-label col-md-12 col-sm-12" for="shift">Shift Worker:</label>
                <div class="col-md-12 col-sm-12 input-container radio">
                   <label><input class="shift-radio-yes" type="radio" name="shift" value="1">Yes</label>
                   <label><input class="shift-radio-no" type="radio" name="shift" value="2">No</label>
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
                   <label><input class="casual-radio-yes" type="radio" name="casual" value="1">Yes</label>
                   <label><input class="casual-radio-no" type="radio" name="casual" value="2">No</label>
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
                      <?php
                        foreach ($department as $depart) {
                          ?>
                          <option value="<?php echo $depart->id ?>" name="department"><?php echo $depart->name ?></option>
                          <?php
                        }
                      ?>
                      
                   </select>
                 </div> 
             </div>

             <div class="form-group data">
                   <label class="control-label col-md-12 col-sm-12" for="Component">Component:</label>
                 <div class="col-md-12 col-sm-12 input-container">
                    <select id="component" class="form-control" data-style="btn-primary" name="component">
                      <option value="" data-hidden="true" class="component">Select Component</option>
                      <?php
                        foreach ($component as $comp) {
                          ?>
                          <option value="<?php echo $comp->id ?>" name="department"><?php echo $comp->componentName ?></option>
                          <?php
                        }
                      ?>
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