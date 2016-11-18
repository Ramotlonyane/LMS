 <div class="row">
    <div class="container-fluid">
       <div class="panel panel-primary">
          <div class="panel-heading">
             APPLY LEAVE FORM
          </div>
          <div class="panel-body panel-primary">
             <div class="apply-leave-message"></div>
              <form class="form-horizontal" id="form-apply-leave" action="<?php echo base_url("index.php/Leave_application_c/leaveApplication");?>" METHOD="POST">

             <div class="form-group">
                  <label class="control-label col-md-12 col-sm-12" for="leavetype">Leave Type:</label>
                 <div class="col-md-12 col-sm-12 input-leave">
                    <select id="leavetyppe" class="form-control" data-style="btn-primary" name="leavetyppe">
                      <option value="" data-hidden="true" class="leavetyppe">Select Leave Type</option>
                      <?php
                        foreach ($leavetype as $leavet) {
                          ?>
                          <option value="<?php echo $leavet->id ?>" name="leavetyppe"><?php echo $leavet->typeName ?></option>
                          <?php
                        }
                      ?>
                      
                   </select>
                 </div>
             </div>

             <div class="form-group data">
                   <label class="control-label col-md-12 col-sm-12" for="initial">Start Date:</label>
                <div class="col-md-12 col-sm-12 input-leave">
                   <input type="datetime-local" name="anualstartdate" id="anualstartdate" class="form-control anual-leave-input" value="<?=date('Y-m-d');?>T00:00">
                </div>
             </div>

             <div class="form-group data">
                   <label class="control-label col-md-12 col-sm-12" for="initial">End Date:</label>
                <div class="col-md-12 col-sm-12 input-leave">
                   <input type="datetime-local" name="anualenddate" id="anualenddate" class="form-control anual-leave-input" value="<?=date('Y-m-d');?>T23:59">
                </div>
             </div>

             <div class="form-group data">
                   <label class="control-label col-md-12 col-sm-12" for="initial">Number of Days:</label>
                <div class="col-md-12 col-sm-12 input-leave">
                   <input type="number" min="0" name="anualnwdays" id="anualnwdays" class="form-control anual-leave-input">
                </div>
             </div>

             <div class="form-group data">
                  <label class="control-label col-md-12 col-sm-12" for="leavepurpose">Leave Purpose:</label>
                <div class="col-md-12 col-sm-12 input-leave">
                   <textarea type="text" name="leavepurpose" id="leavepurpose" class="form-control"></textarea>
                </div> 
             </div>

              <div class="form-group">
                <div class="col-md-12 col-sm-12">
                   <button id="apply_leave" type="submitleave" name="submitleave" class="btn btn-primary">Apply Leave</button>
                </div>
             </div>

             </form>
             <div class="apply-leave-message"></div>
          </div>
       </div>
    </div>
 </div>
 