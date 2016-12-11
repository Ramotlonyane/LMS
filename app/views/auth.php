<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>LMS</title>

    <script src="http://code.jquery.com/jquery-2.1.1.js"></script>  
    <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">    
    <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/login.css" rel="stylesheet"> 
    <style type="text/css">
      body{
      font-family: Lato, Arial;
      background: url(assets/images/display.jpg) no-repeat center center fixed;
      -webkit-background-size: cover; /* For WebKit*/
      -moz-background-size: cover;    /* Mozilla*/
      -o-background-size: cover;      /* Opera*/
      background-size: cover;
      padding: 0px;
      }
    </style>        

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <input type="hidden" id="base_url" value="<?=base_url()?>" />
     <div class="login"> 
        <div class="login-screen"> 
            <div class="login-title">
              <h1>Log In</h1>
            </div> 
              <div id="box" class="login-form">  
                   <form data-toggle="validator" method="post" class="form-login">
                    <div class="control-group"> 
                          <div id="errorbefore"></div>
                        <div class="form-group">   
                             <input class="login_input" placeholder="Username" type="text" name="username" id="username" class="form-control">    
                        </div>  

                        <div class="form-group">   
                             <input class="login_input" placeholder="Password" type="password" name="password" id="password" class="form-control">  
                        </div>  

                        <div class="form-group">  
                              <!--<input type="button" name="login" id="login" class="btn btn-success" value="Login" />-->
                        <a name="login" id="login" class="btn btn-default btn-large btn-block btn-login clicking" href="#">Sign In</a>
                        </div>  
                        <div id="error"></div>
                    </div> 
                   </form>  
              </div>
          </div>
      </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/jquery.min.js"><\/script>')</script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>

    <script src="http://code.jquery.com/jquery-2.1.1.js"></script>  
    <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
    </section>
  </body>
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
</html>
