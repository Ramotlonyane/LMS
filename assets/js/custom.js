//alert('working');

/*Apply Division AJAX STARTS*/
 $('#form-user').submit(function(e) {
      e.preventDefault();

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
                  ' Leave request has been sent' +
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

 /*Apply Division AJAX ENDS*/
/*###################################################################################*/
/*JQuery FOR SECTION A */
  $(".anual-leave-radio").on("click", function(e) {
      $(".section-a.section-annual .form-control").removeAttr("disabled");
      $(".section-a.section-normal .form-control").attr("disabled", "disabled");
      $(".section-b .form-control").attr("disabled", "disabled");
      $("div.form-group.section-normal .input-container").removeClass('has-error')
                                                         .removeClass('has-success');
      $("div.form-group.section-b.section-annual .input-container").removeClass('has-error')
                                                                   .removeClass('has-success');
      $('.section-annual .text-danger').remove();                                                  
      $('.section-normal .text-danger').remove();      
 });

  $(".normal-leave-radio").on("click", function(e) {
      $(".section-a.section-annual .form-control").attr("disabled", "disabled");
      $(".section-a.section-normal .form-control").removeAttr("disabled");
      $(".section-b .form-control").attr("disabled", "disabled");
      $("div.form-group.section-annual .input-container").removeClass('has-error')
                                                         .removeClass('has-success');
      $("div.form-group.section-b.section-normal .input-container").removeClass('has-error')
                                                                   .removeClass('has-success');
      $('.section-normal .text-danger').remove(); 
      $('.section-annual .text-danger').remove(); 
 });

  /*JQuery FOR SECTION A ENDS*/
/*###################################################################################*/
  /*JQuery FOR SECTION B STARTS */
  $(".annual-leave-radio").on("click", function(e) {
      $(".section-b.section-annual .form-control").removeAttr("disabled");
      $(".section-b.section-normal .form-control").attr("disabled", "disabled");
      $(".section-a .form-control").attr("disabled", "disabled");
      $("div.form-group.section-normal .input-container").removeClass('has-error')
                                                         .removeClass('has-success');
      $("div.form-group.section-a.section-annual .input-container").removeClass('has-error')
                                                                   .removeClass('has-success');
      $('.section-normal .text-danger').remove();
      $('.section-annual .text-danger').remove(); 
 });

   $(".normall-leave-radio").on("click", function(e) {
      $(".section-b.section-annual .form-control").attr("disabled", "disabled");
      $(".section-b.section-normal .form-control").removeAttr("disabled");
      $(".section-a .form-control").attr("disabled", "disabled");
      $("div.form-group.section-annual .input-container").removeClass('has-error')
                                                         .removeClass('has-success');
      $("div.form-group.section-a.section-normal .input-container").removeClass('has-error')
                                                                   .removeClass('has-success');
      $('.section-annual .text-danger').remove();
      $('.section-normal .text-danger').remove(); 
 });

  /*JQuery FOR SECTION B Ends*/
/*###################################################################################*/

$('#submitleave').on("click", function(e) {
   if(!$('.shift-radio-yes').is(':checked') && !$('.shift-radio-no').is(':checked')){
      $('#radioshift').html("<span class='text-danger'>Select Shift Worker</span>"); 
   }
   else{
    $('#radioshift').hide();
   }
});

$('#submitleave').on("click", function(e) {
   if(!$('.casual-radio-yes').is(':checked') && !$('.casual-radio-no').is(':checked')){
      $('#radiocasual').html("<span class='text-danger'>Select Shift Worker</span>"); 
   }
     else{
    $('#radiocasual').hide();
   }
});
/*###################################################################################*/

/*$('#submitleave').on("click", function(e) {
   if(!$('.casual-radio-yes').is(':checked') || !$('.casual-radio-no').is(':checked') && !$('.shift-radio-yes').is(':checked') || !$('.shift-radio-no').is(':checked'))
      {alert("Make sure casual and shift worker are selected");}
});

/*
$('#apply').click(function() {
   if($('.anual-leave-radio').is(':checked')) { alert("anual-leave-radio checked"); }
});

$('#apply').click(function() {
   if($('.normal-leave-radio').is(':checked')){alert("normal-leave-radio");}
});
/*###################################################################################*/