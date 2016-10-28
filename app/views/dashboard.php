<div class="container-fluid main">
   <h1>Dashboard</h1>
   <?php print_r($user); ?>
   <div class="page-header">
      <ul id="nav" class="nav nav-pills">
         <li class="active"><a data-toggle="tab" href="#home">HOME</a></li>
         <?php 
            if ($user['idrole'] == '1') {
               ?>
               <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">ADMINISTRATION <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                     <li><a data-toggle="tab" href="#addleavetype">ADD LEAVE TYPE</a></li>
                     <li><a data-toggle="tab" href="#adduser">ADD USER</a></li>
                  </ul>
               </li>

               <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">REPORTS <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                     <li><a data-toggle="tab" href="#typereports">LEAVE TYPE REPORTS</a></li>
                     <li><a data-toggle="tab" href="#usereports">USER REPORTS</a></li>
                  </ul>
               </li>
               <?
            }
            elseif($user['idrole'] == '2'){
               ?>  
               <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">LEAVE RECORDS <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                     <li><a data-toggle="tab" href="#addleaverecords">ADD LEAVE RECORD</a></li>
                     <li><a data-toggle="tab" href="#leaverecordsreports">LEAVE RECORD REPORTS</a></li>
                  </ul>
               </li>  
               <li><a data-toggle="tab" href="#appliedleave">APPLIED LEAVE</a></li>   
               <?
            }
            else{
                ?> 
               <li><a data-toggle="tab" href="#apply">APPLY LEAVE</a></li>
               <li><a data-toggle="tab" href="#myleave">MY LEAVE</a></li>
               <?
            }
         ?> 
      </ul>
   </div>

         <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
               <?php $this->load->view($home); ?>
            </div>
            <!--EMPLOYEE PAGES Apply Division -->
      <!-- ####################################################################################-->
            <?php 
                  if ($user['idrole'] == '3') {
                     ?>
            <div id="apply" class="tab-pane fade">
            <!-- <?=$apply_leave;?>-->
        <?php $this->load->view($apply_leave); ?>
            </div>

            <div id="myleave" class="tab-pane fade">
               <?php $this->load->view($myleave); ?>
            </div>
            <?
         }
      ?>
            <!-- EMPLOYEE PAGES Apply Division Ends-->
      <!-- ####################################################################################-->
            <!-- ADMIN DIVISION STARTS-->
         <?php 
            if ($user['idrole'] == '1') {
               ?>
                  <!-- ADMINISTRATION DROPDOWN PAGES-->
                  <div id="adduser" class="tab-pane fade">
                     <div class="col-md-2">
                        <?php $this->load->view($add_user); ?>
                     </div>
                     <div class="col-md-10">
                        <?php $this->load->view($add_user_sidebar); ?>
                     </div>
                  </div>

                  <div id="addleavetype" class="tab-pane fade">
                     <div class="col-md-2">
                        <?php $this->load->view($add_leave_type); ?>
                     </div>
                     <div class="col-md-10">
                        <?php $this->load->view($all_leave_type, array("query" => $all_leave_type_data)); ?>
                     </div>
                  </div>
                  <!-- REPORTS DROPDOWN PAGES-->
                  <div id="typereports" class="tab-pane fade">
                     <?php $this->load->view($leave_report); ?>
                  </div>
                  <div id="usereports" class="tab-pane fade">
                     <?php $this->load->view($user_report); ?>
                  </div>
               <?
            }
         ?>
      <!-- ADMIN DIVISION ENDS-->
<!-- ####################################################################################-->
      <!-- MANAGER PAGES STARTS-->
         <?php 
            if ($user['idrole'] == '2') {
               ?>
                  <div id="appliedleave" class="tab-pane fade">
                     <?php $this->load->view($applied_leave); ?>
                  </div>
                  <div id="addleaverecords" class="tab-pane fade">
                      <div class="col-md-2">
                        <?php $this->load->view($add_leave_record); ?>
                     </div>
                     <div class="col-md-10">
                        <?php $this->load->view($add_leave_record_sidebar); ?>
                     </div>
                     
                  </div>
                  <div id="leaverecordsreports" class="tab-pane fade">
                     <?php $this->load->view($leave_record_reports); ?>
                  </div>
               <?
            }
         ?>
   <!-- MANAGER PAGES ENDS-->
<!-- ####################################################################################-->
         </div>
</div>