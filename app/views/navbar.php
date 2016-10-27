<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
	      	</button>
	      	<a class="navbar-brand" href="#">Leave Management System</a>
		</div>  
  		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">		  		
	  		<!--<ul class="nav navbar-nav">
		        <li><a href="<?php echo site_url('#') ?>">Home</a></li>
				<li><a href="<?php echo site_url("#") ?>">About Us</a></li>              
				<li><a href="<?php echo site_url("#") ?>">Apply Leave</a></li> 
				<li><a href="<?php echo site_url("#") ?>">Leave Records</a></li> 
		    </ul>-->
		    <ul class="nav navbar-nav navbar-right">		        
				<li><a href="<?php echo site_url("index.php/Auth/logout") ?>"><span class="glyphicon glyphicon-log-out"></span> logout| <?=$username?></a> </li> 
		    </ul>
	    </div>
	</div>
</nav>