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
               <?php
            }
            elseif($user['idrole'] == '2' || $user['idrole'] == '2' || $user['idrole'] == '3' || $user['idrole'] == '4' || $user['idrole'] == '5' || $user['idrole'] == '6' || $user['idrole'] == '7' || $user['idrole'] == '8'){
               ?>  
               <li><a data-toggle="tab" href="#appliedleave">APPROVE LEAVE</a></li>
               <li><a data-toggle="tab" href="#apply">APPLY LEAVE</a></li>
               <li><a data-toggle="tab" href="#myleave">MY LEAVE STATUS</a></li>  
               <?php
            }
            elseif($user['idrole'] == '9'){
                ?> 
               <li><a data-toggle="tab" href="#apply">APPLY LEAVE</a></li>
               <li><a data-toggle="tab" href="#myleave">MY LEAVE STATUS</a></li>
               <?php
            }
            else{
              ?> 
                <li><a data-toggle="tab" href="#addleaverecords">ADD LEAVE RECORD</a></li>
                <li><a data-toggle="tab" href="#leaverecordsreports">LEAVE RECORD REPORTS</a></li>
               <?php
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
                  if ($user['idrole'] == '9' || $user['idrole'] == '2' || $user['idrole'] == '3' || $user['idrole'] == '4' || $user['idrole'] == '5' || $user['idrole'] == '6' || $user['idrole'] == '7' || $user['idrole'] == '8') {
                     ?>
            <div id="apply" class="tab-pane fade">
              <div class="col-md-3">
                <?php $this->load->view($apply_leave); ?>
              </div>
              <div class="col-md-9 all_leave_application_data resultTable">
                <?php $this->load->view($apply_leave_sidebar, array('query' => $all_leave_application_data, 'pagination_links' => $pagination_data_leaveapplied)); ?>
              </div>
            </div>

            <div id="myleave" class="tab-pane fade resultTable">
               <?php $this->load->view($myleave, array('query' => $all_applied_Mystatus,'pagination_links' => $pagination_data_Mystatus)); ?>
            </div>
            <?php
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
                     <div class="col-md-3">
                        <?php $this->load->view($add_user); ?>
                     </div>
                     <div class="col-md-9 all_employee_container resultTable">
                        <?php $this->load->view($add_user_sidebar, array("query" => $all_employee_data, 'pagination_links' => $pagination_data_employee)); ?>
                     </div>
                  </div>

                  <div id="addleavetype" class="tab-pane fade">
                     <div class="col-md-3">
                        <?php $this->load->view($add_leave_type); ?>
                     </div>
                     <div class="col-md-9 all_leave_type_container resultTable">
                        <?php $this->load->view($all_leave_type, array("query" => $all_leave_type_data,'pagination_links' => $pagination_data_leaves)); ?>
                     </div>
                  </div>
                  <!-- REPORTS DROPDOWN PAGES-->
                  <div id="typereports" class="tab-pane fade">
                     <?php $this->load->view($leave_report); ?>
                  </div>
                  <div id="usereports" class="tab-pane fade">
                     <?php $this->load->view($user_report); ?>
                  </div>
               <?php
            }
         ?>
      <!-- ADMIN DIVISION ENDS-->
<!-- ####################################################################################-->
      <!-- MANAGER PAGES STARTS-->
         <?php 
            if ($user['idrole'] == '2' || $user['idrole'] == '3' || $user['idrole'] == '4' || $user['idrole'] == '5' || $user['idrole'] == '6' || $user['idrole'] == '7' || $user['idrole'] == '8') {
               ?>
                  <div id="appliedleave" class="tab-pane fade applied_leave_status resultTable">
                     <?php $this->load->view($applied_leave, array("query" => $all_applied_status, 'pagination_links' => $pagination_data_status)); ?>
                  </div>
               <?php
            }
         ?>
   <!-- MANAGER PAGES ENDS-->
<!-- ####################################################################################-->

<!-- ####################################################################################-->
      <!-- HR MANAGER PAGES STARTS-->
         <?php 
            if ($user['idrole'] == '10') {
               ?>
                  <div id="addleaverecords" class="tab-pane fade">
                      <div class="col-md-3">
                        <?php $this->load->view($add_leave_record); ?>
                     </div>
                     <div class="col-md-9 all_leave_record_container resultTable">
                        <?php $this->load->view($add_leave_record_sidebar, array('query' => $all_leave_records_data,'pagination_links' => $pagination_data_records)); ?>
                     </div> 
                  </div>
                  <div id="leaverecordsreports" class="tab-pane fade">
                     <?php $this->load->view($leave_record_reports); ?>
                  </div>
               <?php
            }
         ?>
   <!-- HR MANAGER PAGES ENDS-->
<!-- ####################################################################################-->
         </div>
</div>

<script type="text/javascript">
   $(document).ready(function(){

//**************************************** Delete Leave Type****************************************************//

//************************************ Search Leave Type********************************************************//

            $(document).on('click', '.search_leave', function(){
            event.stopPropagation();
        event.preventDefault();  
           var nameOfLeave = $('#nameOfLeave').val();
           var leaveNumber = $('#leaveNumber').val();

           if(leaveNumber != '' || nameOfLeave != '')  
           {  
                $.ajax({  
                     url:"index.php/Leave_type_c/search_LeaveType/",  
                     method:"post",  
                     data:{nameOfLeave:nameOfLeave, leaveNumber:leaveNumber},  
                     dataType:"text",  
                     success:function(data)  
                     {  
                          $(".all_leave_type_container").html(data);  
                     }  
                });  
           }  
           else  
           {  
                    var options = {  
                                    distance: '40',  
                                    direction:'left',  
                                    times:'3'  
                               }  
                  $(".search-box").effect("shake", options, 800);  
                  $('#search_leave').val("search");  
                  $('#errorsearch').html("<span class='text-danger'>Search Fields are Blank....!!</span>");             
           }  
      });    

//********************************** Edit Leave Type**********************************************************//
            $(document).on('click', '.btn_edit', function(){ 
              event.stopPropagation();
              event.preventDefault();

            var name = $(this).closest("tr").find('#name').text();
            var numberOfLeaves = $(this).closest("tr").find('#numberOfLeaves').text();
            var description = $(this).closest("tr").find('#description').text();
            var id=$(this).data("id2");

            if(confirm("Are you sure you want to edit this?"))  
           {  
                $.ajax({  
                     url:"index.php/Leave_type_c/edit_LeaveType/"+id,
                     method:"POST",  
                     data:{id:id, name:name, numberOfLeaves:numberOfLeaves, description:description},  
                     dataType:"text",  
                     success:function(data){  

                        $(".all_leave_type_container").html(data);

                        $('.the-edit-message').append('<div class="alert alert-success">' +
                        '<span class="glyphicon glyphicon-ok"></span>' +
                        ' Edited Successfully' +
                        '</div>');

                        setTimeout(function(){
                           $('.alert-success').hide();
                        }, 3000);
                     }  
                });  
           }  
      });
//********************************** Add Leave Record**********************************************************//

    $('#add-leaverecords-form').submit(function(e) {
      event.stopPropagation();
        event.preventDefault();
      var addRecord = $(this);

      // perform ajax
      $.ajax({
         url: addRecord.attr('action'),
         type: 'post',
         data: addRecord.serialize(),
         dataType: 'json',
         success: function(response) {
            if (response.success == true) {
               // if success we would show message
               // and also remove the error class
               $('.the-message-record').append('<div class="alert alert-success">' +
                  '<span class="glyphicon glyphicon-ok"></span>' +
                  ' Leave Records Has Been Added Successfully' +
                  '</div>');
               $('.form-group .input-container').removeClass('has-error')
                               .removeClass('has-success');
               $('.text-danger').remove();

               // reset the form
               addRecord[0].reset();

               // close the message after seconds
               $('.alert-success').delay(500).show(10, function() {
                  $(this).delay(3000).hide(10, function() {
                     $(this).remove();
                  });
               })

               $(".all_leave_record_container").html(response.html);
               //location.reload();
            }
            else {
              if (response.duplicated) {
                $('.the-message-record').append('<div class="alert alert-danger">' +
                  '<span class="glyphicon glyphicon-remove"></span>' +
                  ' Record already exists!' +
                  '</div>');
              }
               $.each(response.messages, function(key, value) {
                  var element = $('#' + key);
                  
                  element.closest('div.form-group')
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

//********************************************************************************************//


//********************************************************************************************//
          $('#form-apply-leave').submit(function(e) {
        event.stopPropagation();
        event.preventDefault();
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
               $('.apply-leave-message').append('<div class="alert alert-success">' +
                  '<span class="glyphicon glyphicon-ok"></span>' +
                  ' Your Leave Has Been Submitted Successfully' +
                  '</div>');
               $('.form-group .input-leave').removeClass('has-error')
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

               $(".all_leave_application_data").html(response.html);
            }else {
              if (response.insufficient) {
                $('.apply-leave-message').append('<div class="alert alert-danger">' +
                  '<span class="glyphicon glyphicon-remove"></span>' +
                  'You Have Insufficient Leave Days!!!' +
                  '</div>');
                 me[0].reset();

               // close the message after seconds
               $('.alert-success').delay(500).show(10, function() {
                  $(this).delay(3000).hide(10, function() {
                     $(this).remove();
                  });
               })
              }
               $.each(response.messages, function(key, value) {
                  var element = $('#' + key);
                  
                  element.closest('div.form-group .input-leave')
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
//********************************************************************************************//
  
       $('#add-leavetype-form').submit(function(e) {
      e.preventDefault();
       event.preventDefault();

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
                  ' Leave Type Has Been Added Successfully' +
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

               $(".all_leave_type_container").html(response.html);
            }
            else {
               $.each(response.messages, function(key, value) {
                  var element = $('#' + key);
                  
                  element.closest('div.form-group')
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

//********************************************************************************************//


    $('#form-add-user').submit(function(e) {
      e.preventDefault();
       event.preventDefault();

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

               $(".all_employee_container").html(response.html);
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
//********************************************************************************************//


 });
</script>