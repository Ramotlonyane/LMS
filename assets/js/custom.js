//alert('working');

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

$('#add_user').on("click", function(e) {
   if(!$('.shift-radio-yes').is(':checked') && !$('.shift-radio-no').is(':checked')){
      $('#radioshift').html("<span class='text-danger'>Select Shift Worker</span>"); 
   }
   else{
    $('#radioshift').hide();
   }
});

$('#add_user').on("click", function(e) {
   if(!$('.casual-radio-yes').is(':checked') && !$('.casual-radio-no').is(':checked')){
      $('#radiocasual').html("<span class='text-danger'>Select Casual Worker</span>"); 
   }
     else{
    $('#radiocasual').hide();
   }
});
/*###################################################################################*/
$('#addleaveRecords').on("click", function(e) {
   $("div.form-group").removeClass('has-error')
                      .removeClass('has-success');
  $('.text-danger').remove();
});

$('#addleaveRecords').on("click", function(e) {
   $("div.form-group").removeClass('has-error')
                      .removeClass('has-success');
  $('.text-danger').remove();
});
/*###################################################################################*/