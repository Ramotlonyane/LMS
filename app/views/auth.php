
     <div class="container">  
                <h2 align="center">Log In</h2><br /><br />  
                <div id="box">  
                     <br /> 
                     <form data-toggle="validator" method="post" class="form-login"> 
                            <div id="errorbefore"></div>
                          <div class="form-group">  
                               <label>Username</label>
                               <input type="text" name="username" id="username" class="form-control">    
                          </div>  
                          <div class="form-group">  
                               <label>Password</label>
                               <input type="password" name="password" id="password" class="form-control">  
                          </div>  
                          <div class="form-group">  
                               <input type="button" name="login" id="login" class="btn btn-success" value="Login" />  
                          </div>  
                          <div id="error"></div>  
                     </form>  
                     <br /> 
                </div>  
           </div>

<script type="text/javascript">
             
  $(document).ready(function(){  
      $('#login').click(function(){  
        //alert('working');
           var username = $('#username').val();  
           var password = $('#password').val(); 
           var dataForm = $('.form-login').serialize(); 
           if($.trim(username).length > 0 && $.trim(password).length > 0)  
           {  
                $.ajax({  
                     url:$('#base_url').val() + "index.php/Auth/logged_in_check",  
                     method:"POST",  
                     data:dataForm,  
                     cache: false,  
                     dataType: 'JSON',
                     beforeSend:function()  
                     {  
                          $('#login').val("connecting...");  
                     },  
                     success:function(data)  
                     {  
                          if(data.state == 1)  
                          {  
                            //window.location.href = $('#base_url').val()+"index.php/Auth/dashboard";
                            window.location.reload();
                               //$("#content").load("dashboard.php").hide().fadeIn(1500);  
                          }  
                          else  
                          {  
                               //shake animation effect.  
                               var options = {  
                                    distance: '40',  
                                    direction:'left',  
                                    times:'3'  
                               }  
                               $("#box").effect("shake", options, 800);  
                               $('#errorbefore').hide(); 
                               $('#login').val("Login");
                               $('#error').html("<span class='text-danger'>Invalid username or Password</span>");  
                          }  
                     }  
                });  
           }
           else{
                  var options = {  
                                    distance: '40',  
                                    direction:'left',  
                                    times:'3'  
                               }  
                  $("#box").effect("shake", options, 800);  
                  $('#login').val("Login");  
                  $('#errorbefore').html("<span class='text-danger'>Logging In Failed Some Fields are Blank....!!</span>");
          }  
      });  
  });
</script>