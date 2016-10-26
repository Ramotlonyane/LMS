 <div class="row">
    <div class="container">
       <div class="panel panel-default">
          <div class="panel-heading">
             LEAVE APPLICATION FORM
          </div>
          <div class="panel-body">
             <div class="the-message"></div>
             <form class="form-horizontal well" id="form-user" action="<?php echo base_url("index.php/auth/save");?>" METHOD="POST">

             <div class="form-group data">
                   <div class="col-md-1 col-sm-3 ridge">
                      <p style="margin: 0;">Surname</p>
                   </div>
                   <div class="col-md-3 col-sm-3 input-container">
                      <input type="text" name="surname" id="surname" class="form-control">
                   </div>
             </div>
             
             <div class="form-group data">
                <div class="col-md-1 col-sm-3 ridge">
                   <p style="margin: 0;">Initials</p>
                </div>
                <div class="col-md-3 col-sm-3 input-container">
                   <input type="text" name="initial" id="initial" class="form-control">
                </div>
             </div>

             <div class="form-group data">
                 <div class="col-md-1 col-sm-3 ridge">
                   <p style="margin: 0;">PERSAL</p>
                </div>
                <div class="col-md-3 col-sm-3 input-container">
                   <input type="text" name="persalnum" id="persalnum" class="form-control">                    
                </div> 
             </div>

             <div class="form-group data">
                <div class="col-md-1 col-sm-3 ridge">
                   <p style="margin: 0;">Shift W</p>
                </div>
                <div class="col-md-2 col-sm-3 input-container radio">
                   <label><input class="shift-radio-yes" type="radio" name="shift">Yes</label>
                   <label><input class="shift-radio-no" type="radio" name="shift">No</label>
                   <div id="radioshift"></div> 
                </div>
             </div>

             <div class="form-group data">
                <div class="col-md-1 col-sm-3 ridge">
                   <p style="margin: 0;">Address</p>
                </div>
                <div class="col-md-3 col-sm-3 input-container">
                   <textarea type="text" name="address" id="address" class="form-control"></textarea>
                </div> 
             </div>

             <div class="form-group data">
                <div class="col-md-1 col-sm-3 ridge">
                   <p style="margin: 0;">Casual</p>
                </div>
                <div class="col-md-2 col-sm-3 input-container radio">
                   <label><input class="casual-radio-yes" type="radio" name="casual">Yes</label>
                   <label><input class="casual-radio-no" type="radio" name="casual">No</label>
                   <div id="radiocasual"></div> 
                </div>
             </div>

             <div class="form-group data">
                <div class="col-md-1 col-sm-3 ridge">
                   <p style="margin: 0;">Tel. No.</p>
                </div>
                <div class="col-md-3 col-sm-3 input-container">
                   <input type="text" name="telnum" id="telnum" class="form-control">
                </div>   
             </div>

              <div class="form-group data">
                <div class="col-md-2 col-sm-3 ridge">
                   <p style="margin: 0;">Department</p>
                </div>
                <div class="col-md-2 input-container">
                    <select id="department" class="form-control" data-style="btn-primary" name="department">
                      <option value="" data-hidden="true" class="department">Select Department</option>
                      <option value="Treasury" name="department">Treasury</option>
                   </select>
                 </div> 
             </div>

             <div class="form-group data">
                <div class="col-md-2 col-sm-3 ridge">
                   <p style="margin: 0;">Component</p>
                </div>
                 <div class="col-md-2 input-container">
                    <select id="component" class="form-control" data-style="btn-primary" name="component">
                      <option value="" data-hidden="true" class="component">Select Component</option>
                      <option value="IT" name="component">IT</option>
                   </select>
                 </div>
             </div>

             <!-- LEAVE APPLICATION FORM SECTION A -->
             <div class="form-group">
                <div class="col-md-12 col-sm-12 solid">
                   <p style="margin: 0;">SECTION A: For Periods covering full day</p>
                </div>
             </div>

             <div class="form-group">
                <div class="col-md-4 col-sm-4 ridge">
                   <p style="margin: 0;">Type of Leave Taken as Working Days</p>
                </div>
                <div class="col-md-2 col-sm-4 ridge">
                   <p style="margin: 0; text-align: center;">Start Date</p>
                </div>
                <div class="col-md-2 col-sm-4 ridge">
                   <p style="margin: 0; text-align: center;">End Date</p>
                </div>
                <div class="col-md-4 col-sm-4 ridge">
                   <p style="margin: 0; text-align: center;">Number of Working Days</p>
                </div>
             </div>

             <div class="form-group section-a section-annual">
                <div class="col-md-2 ridge">
                   <p style="margin: 0;">Annual Leave</p>
                </div>
                <div class="col-md-2 radio">
                   <label><input class="anual-leave-radio" value="1" type="radio" name="optradio" checked></label>
                </div>
                <div class="col-md-2 col-sm-4 input-container">
                   <input type="date" name="anualstartdate" id="anualstartdate" class="form-control anual-leave-input">
                </div>
                <div class="col-md-2 col-sm-4 input-container">
                   <input type="date" name="anualenddate" id="anualenddate" class="form-control anual-leave-input">
                </div>
                 <div class="col-md-4 col-sm-4 input-container">
                   <input type="number" name="anualnwdays" id="anualnwdays" class="form-control anual-leave-input">
                </div>
             </div>

             <div class="form-group section-a section-normal">
                <div class="col-md-2 ridge">
                   <p style="margin: 0;">Normal Sick Leave</p>
                </div>
                 <div class="col-md-2 radio">
                   <label><input class="normal-leave-radio" value="2" type="radio" name="optradio"></label>
                </div>
                <div class="col-md-2 col-sm-4 input-container">
                   <input type="date" name="normalstartdate" id="normalstartdate" class="form-control" disabled>
                </div>
                <div class="col-md-2 col-sm-4 input-container">
                   <input type="date" name="normalenddate" id="normalenddate" class="form-control" disabled>
                </div>
                 <div class="col-md-4 col-sm-4 input-container">
                   <input type="number" name="normalnwdays" id="normalnwdays" class="form-control" disabled>
                </div>
             </div>

             <!-- LEAVE APPLICATION FORM SECTION A ENDS -->
<!--####################################################################################################################-->
             <!-- LEAVE APPLICATION FORM SECTION B -->
             <div class="form-group">
                <div class="col-md-12 col-sm-12 solid">
                   <p style="margin: 0;">SECTION B: For Periods covering parts of a day or fractions</p>
                </div>
             </div>

              <div class="form-group">
                <div class="col-md-4 col-sm-4 ridge">
                   <p style="margin: 0;">Type of Leave Taken as Working Days</p>
                </div>
                <div class="col-md-2 col-sm-4 ridge">
                   <p style="margin: 0; text-align: center;">Start Date</p>
                </div>
                <div class="col-md-2 col-sm-4 ridge">
                   <p style="margin: 0; text-align: center;">End Date</p>
                </div>
                <div class="col-md-4 col-sm-4 ridge">
                   <p style="margin: 0; text-align: center;">Number of Working Days</p>
                </div>
             </div>

             <div class="form-group section-b section-annual">
                <div class="col-md-2 ridge">
                   <p style="margin: 0;">Annual Leave</p>
                </div>
                 <div class="col-md-2 radio">
                   <label><input class="annual-leave-radio" value="3" type="radio" name="optradio"></label>
                </div>
                <div class="col-md-2 col-sm-4 input-container">
                   <input type="date" name="annualstartdate" id="annualstartdate" class="form-control" disabled>
                </div>
                <div class="col-md-2 col-sm-4 input-container">
                   <input type="date" name="annualenddate" id="annualenddate" class="form-control" disabled>
                </div>
                 <div class="col-md-4 col-sm-4 input-container">
                   <input type="number" name="annualnwdays" id="annualnwdays" class="form-control" disabled>
                </div>
             </div>

             <div class="form-group section-b section-normal">
                <div class="col-md-2 ridge">
                   <p style="margin: 0;">Normal Sick Leave</p>
                </div>
                 <div class="col-md-2 radio">
                   <label><input class="normall-leave-radio" value="4" type="radio" name="optradio"></label>
                </div>
                <div class="col-md-2 col-sm-4 input-container">
                   <input type="date" name="normallstartdate" id="normallstartdate" class="form-control" disabled>
                </div>
                <div class="col-md-2 col-sm-4 input-container">
                   <input type="date" name="normallenddate" id="normallenddate" class="form-control" disabled>
                </div>
                 <div class="col-md-4 col-sm-4 input-container">
                   <input type="number" name="normallnwdays" id="normallnwdays" class="form-control" disabled>
                </div>
             </div>
             <!-- LEAVE APPLICATION FORM SECTION B ENDS -->
             <div class="form-group">
                <div class="col-md-3 col-sm-4">
                   <button id="submitleave" type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
             </div>
             </form>
             <div class="the-message"></div>
          </div>
       </div>
    </div>
 </div>