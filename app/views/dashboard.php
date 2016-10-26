<div class="container main">
   <h1>Dashboard</h1>
   <?php print_r($user); ?>
   <div class="page-header">
      <ul id="nav" class="nav nav-pills">
         <li class="active"><a data-toggle="tab" href="#home">HOME</a></li>
         <?php 
            if ($user['role'] == 'Admin') {
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
            elseif($user['role'] == 'Editor'){
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
      <div id="home" class="tab-pane fade in active">Home Page</div>
      <!--EMPLOYEE PAGES Apply Division -->
<!-- ####################################################################################-->
      <?php 
            if ($user['role'] == 'Author') {
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
      if ($user['role'] == 'Admin') {
         ?>
            <!-- ADMINISTRATION DROPDOWN PAGES-->
            <div id="adduser" class="tab-pane fade">
               <?php $this->load->view($add_user); ?>
            </div>
            <div id="addleavetype" class="tab-pane fade">
               <?php $this->load->view($add_leave_type); ?>
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
      if ($user['role'] == 'Editor') {
         ?>
            <div id="appliedleave" class="tab-pane fade">APPLIED LEAVE</div>
            <div id="addleaverecords" class="tab-pane fade">ADD LEAVE RECORD PAGE</div>
            <div id="leaverecordsreports" class="tab-pane fade">LEAVE RECORD REPORTS PAGE</div>
         <?
      }
   ?>
   <!-- MANAGER PAGES ENDS-->
<!-- ####################################################################################-->
   </div>
</div>