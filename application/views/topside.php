<html>
	<?php
		if (isset($this->session->userdata['logged_in'])) {
			if ($this->session->userdata['logged_in']['agent'] == 0) {
				$userlogin= ($this->session->userdata['logged_in']['userlogin']);
				$username = ($this->session->userdata['logged_in']['username']);
			}
			else {
				$userlogin= ($this->session->userdata['logged_in']['agentlogin']);
				$username = ($this->session->userdata['logged_in']['agentname']);
			}
		} else {
			header("location: login");
		}
	?>
<head>
<title>Profile</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Minimal Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="<?php echo(CSS.'bootstrap.min.css'); ?>" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="<?php echo(CSS.'style-dashboard.css'); ?>" rel='stylesheet' type='text/css' />
<link href="<?php echo(CSS.'font-awesome.css'); ?>" rel="stylesheet"> 
<script src="<?php echo(JS.'jquery.min.js'); ?>"> </script>
<script src="<?php echo(JS.'bootstrap.min.js'); ?>"> </script>
  
<!-- Mainly scripts -->
<script src="<?php echo(JS.'jquery.metisMenu.js'); ?>"></script>
<script src="<?php echo(JS.'jquery.slimscroll.min.js'); ?>"></script>
<!-- Custom and plugin javascript -->
<link href="<?php echo(CSS.'custom.css'); ?>" rel="stylesheet">
<script src="<?php echo(JS.'custom.js'); ?>"></script>
<script src="<?php echo(JS.'screenfull.js'); ?>"></script>
		<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}

			

			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});
			

			
		});
		</script>



</head>
<body>
<div id="wrapper">
       <!----->
        <nav class="navbar-default navbar-static-top" role="navigation">
             <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <h1> <a class="navbar-brand" href="#">Welcome</a></h1>         
			   </div>
			 <div class=" border-bottom">
        	<div class="full-left">
        	  <section class="full-top">
				<button id="toggle"><i class="fa fa-arrows-alt"></i></button>	
			</section>
			<!--
			<form class=" navbar-left-right">
              <input type="text"  value="Search..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search...';}">
              <input type="submit" value="" class="fa fa-search">
            </form>
			-->
            <div class="clearfix"> </div>
           </div>
     
       
            <!-- Brand and toggle get grouped for better mobile display -->
		 
		   <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="drop-men" >
		        <ul class=" nav_1">
		           
		    		<li class="dropdown at-drop">
		              <a href="#" class="dropdown-toggle dropdown-at " data-toggle="dropdown"><i class="fa fa-globe"></i> <span class="number">5</span></a>
		              <ul class="dropdown-menu menu1 " role="menu">
		                <li><a href="#">
		               
		                	<div class="user-new">
		                	<p>New user registered</p>
		                	<span>40 seconds ago</span>
		                	</div>
		                	<div class="user-new-left">
		                
		                	<i class="fa fa-user-plus"></i>
		                	</div>
		                	<div class="clearfix"> </div>
		                	</a></li>
		                <li><a href="#">
		                	<div class="user-new">
		                	<p>Someone special liked this</p>
		                	<span>3 minutes ago</span>
		                	</div>
		                	<div class="user-new-left">
		                
		                	<i class="fa fa-heart"></i>
		                	</div>
		                	<div class="clearfix"> </div>
		                </a></li>
		                <li><a href="#">
		                	<div class="user-new">
		                	<p>John cancelled the event</p>
		                	<span>4 hours ago</span>
		                	</div>
		                	<div class="user-new-left">
		                
		                	<i class="fa fa-times"></i>
		                	</div>
		                	<div class="clearfix"> </div>
		                </a></li>
		                <li><a href="#">
		                	<div class="user-new">
		                	<p>The server is status is stable</p>
		                	<span>yesterday at 08:30am</span>
		                	</div>
		                	<div class="user-new-left">
		                
		                	<i class="fa fa-info"></i>
		                	</div>
		                	<div class="clearfix"> </div>
		                </a></li>
		                <li><a href="#">
		                	<div class="user-new">
		                	<p>New comments waiting approval</p>
		                	<span>Last Week</span>
		                	</div>
		                	<div class="user-new-left">
		                
		                	<i class="fa fa-rss"></i>
		                	</div>
		                	<div class="clearfix"> </div>
		                </a></li>
		                <li><a href="#" class="view">View all messages</a></li>
		              </ul>
		            </li>
					<li class="dropdown">
		              <a href="#" class="dropdown-toggle dropdown-at" data-toggle="dropdown"><span class=" name-caret"><?php echo $username; ?><i class="caret"></i></span></a>
		              <ul class="dropdown-menu " role="menu">
		                <li><a href="profile.html"><i class="fa fa-user"></i>Profile</a></li>
		                <li><a href="inbox.html"><i class="fa fa-envelope"></i>Videos</a></li>
		                <li><a href="calendar.html"><i class="fa fa-calendar"></i>Upload video</a></li>
		                <li><a href="logout"><i class="fa fa-clipboard"></i>Logout</a></li>
		              </ul>
		            </li>
					
		        </ul>
				
		     </div><!-- /.navbar-collapse -->
			<div class="clearfix">
       
     </div>
	  
		    <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
				
                    <li>
                        <a href="index.html" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Profile</span> </a>
                    </li>
					<li>
                        <a href="index.html" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Videos</span> </a>
                    </li>
					<li>
                        <a href="index.html" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Upload video</span> </a>
                    </li>
                    <li>
                        <a href="logout" class=" hvr-bounce-to-right"><i class="fa fa-sign-in nav_icon"></i><span class="nav-label">Logout</span></a>
                    </li>
                </ul>
            </div>
			</div>
        </nav>