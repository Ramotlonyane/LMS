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
                      <label class="control-label col-md-10 col-sm-12" for="leavename">Name of Leave:</label>
                   <div class="col-md-12 col-sm-12">
                      <input type="text" name="leavename" id="leavename" class="form-control">
                   </div>
             </div>	

              <div class="form-group">
                      <label class="control-label col-md-10 col-sm-12" for="numberOfLeaves">Number of Leaves:</label>
                   <div class="col-md-8 col-sm-12">
                      <input type="number" min="0" name="numberOfLeaves" id="numberOfLeaves" class="form-control">
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