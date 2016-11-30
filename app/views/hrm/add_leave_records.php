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
                      <option value="" data-hidden="true" class="nameOfUser">Select Name of User:</option>
                      <?php
                        foreach ($employee as $employ) {
                          ?>
                          <option value="<?php echo $employ->id ?>" name="nameOfUser"><?php echo $employ->surname ?></option>
                          <?php
                        }
                      ?>   
                   </select>
                   </div>
             </div>	


			 <div class="form-group">
                      <label class="control-label col-md-10 col-sm-12" for="typeOfLeave">Select Type of Leave</label>
                   <div class="col-md-12 col-sm-12">
                    <select id="typeOfLeave" class="form-control" data-style="btn-primary" name="typeOfLeave">
                      <option value="" data-hidden="true" class="typeOfLeave">Select Leave Type</option>
                      <?php
                        foreach ($leavetype as $leavet) {
                          ?>
                          <option value="<?php echo $leavet->id ?>" name="typeOfLeave"><?php echo $leavet->typeName ?></option>
                          <?php
                        }
                      ?> 
                   </select>
                   </div>
             </div>	
			
			<div class="form-group">
                      <label class="control-label col-md-12 col-sm-12" for="numberOfDays">Number of Days/Leave</label>
                   <div class="col-md-12 col-sm-12">
                      <input type="number" min="0" name="numberOfDays" id="numberOfDays" class="form-control"> 
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
             <div class="the-message-record"></div>
          </div>
       </div>
    </div>
 </div>
