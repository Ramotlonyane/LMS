 <div class="row">
    <div class="container-fluid">
       <div class="panel panel-primary">
          <div class="panel-heading">
             APPLY LEAVE FORM
          </div>
          <div class="panel-body panel-primary">
             <div class="register-message"></div>
              <form class="form-horizontal well" id="form-apply-leave" action="<?php echo base_url("index.php/Leave_application_c/leaveApplication");?>" METHOD="POST">
        
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

             </form>
             <div class="register-message"></div>
          </div>
       </div>
    </div>
 </div>