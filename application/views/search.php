<html>
	<?php
		//if (isset($this->session->userdata['logged_in'])) {
		//	header("location: ". $this->config->item('base_url') . "index.php/user_authentication/user_login_process");
		//}
	?>

        <title>Rabona - Home</title>

        <!-- meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        
        <!-- stylesheets -->
		<link rel="stylesheet" href="<?php echo(CSS.'bootstrap.min.css'); ?>">
		<link rel="stylesheet" href="<?php echo(CSS.'font-awesome.min.css'); ?>">
		<link rel="stylesheet" href="<?php echo(CSS.'animate.css'); ?>">
		<link rel="stylesheet" href="<?php echo(CSS.'owl.carousel.css'); ?>">
		<link rel="stylesheet" href="<?php echo(CSS.'owl.theme.css'); ?>">
		<link rel="stylesheet" href="<?php echo(CSS.'style.css'); ?>">
		
        <!-- scripts -->		
        <script type="text/javascript" src="<?php echo(JS.'modernizr.custom.97074.js'); ?>"></script>

    </head>

    <body>

        <div id="home-page">

            <!-- site-navigation start -->  
            <nav id="mainNavigation" class="navbar navbar-dafault main-navigation" role="navigation">
                <div class="container">
                    
                    <div class="navbar-header">
                        
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        
                        <!-- navbar logo -->
                        <div class="navbar-brand">
                            <span class="sr-only">Rabona</span>
                            <a href="home">
                                <img src="<?php echo(IMG.'main_logo.png'); ?>" class="img-responsive center-block" alt="logo">
                            </a>
                        </div>
                        <!-- navbar logo -->

                    </div><!-- /.navbar-header -->
					
					
					<div style="float: left; width: 60%;">
							<div align="center">
							<?php
								$attributes = array('method' => 'get');
								echo form_open('search/process', $attributes); ?>
										<table width="80%">
										<tr>
										<td><input name="input-search" value="<?php echo $search_keyword; ?>" id="input-search" type="text" placeholder="Search..." required></td>
										<td><button type="submit">Search</button></td>
										</tr>
										</table>
									<?php echo form_close(); ?>
							</div>
					</div>
					
					
                    <!-- nav links -->
                    <div class="collapse navbar-collapse" id="main-nav-collapse">
                        <ul class="nav navbar-nav navbar-right text-uppercase">
                            <li>
                                <a href="index.html"><span>home</span></a>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>pages</span></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="about.html">about</a>
                                    </li>
                                    <li>
                                        <a href="service.html">service</a>
                                    </li>
                                    <li>
                                        <a href="portfolio.html">portfolio</a>
                                    </li>
                                    <li>
                                        <a href="gallery.html">gallery</a>
                                    </li>
                                    <li>
                                        <a href="404.html">404 page</a>
                                    </li>
                                    <li>
                                        <a href="coming_soon.html">coming soon</a>
                                    </li>
                                </ul>  <!-- end of /.dropdown-menu -->
                            </li> <!-- end of /.dropdown -->

                            <li>
                                <a href="contact.html"><span>contact</span></a>
                            </li>
							<li>
                                <a href="<?php echo($this->config->item('base_url') . 'index.php/user_authentication/login_show'); ?>"><span>Login</span></a>
                            </li>
                        </ul>
                    </div><!-- nav links -->
                    
                </div><!-- /.container -->
            </nav>
            <!-- site-navigation end -->


            <!-- header start -->
			<!--
            <header id="header" class="header-wrapper home-parallax home-fade">
                <div class="header-overlay"></div>
                <div class="header-wrapper-inner">
                    <div class="container">

                        <!--<div class="welcome-speech">
							<!--
                            <h1>Welcome to Rabona</h1>
                            <p>Find your Player and your Agent</p> -->
                            <!--<a href="#" class="btn btn-white">
                                Our Works
                            </a>-->
						<!--<iframe id="ytplayer" type="text/html" width="640" height="390"
  src="http://www.youtube.com/embed/<?php //echo $video_yt_id; ?>?autoplay=1&origin=http://example.com"
  frameborder="0"/>--><!--
						<div id="ytplayer"></div>
							
                        <!--</div><!-- /.intro -->
                    <!--    
                    </div><!-- /.container -->
<!--
                </div><!-- /.header-wrapper-inner -->
<!--            </header>
            <!-- /#header -->

            <div class="main-content">

                <!--  begin portfolio section  -->
                <section class="bg-light-gray">
                    <div class="container">

                        <div class="headline text-center">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <h2 class="section-title">Search results</h2>
                                    <!--<p class="section-sub-title">
                                        absolutely stunning design &amp; functionality
                                    </p>--> <!-- /.section-sub-title -->
                                </div>
                            </div>
                        </div> <!-- /.headline -->

                        <div class="portfolio-item-list">
                            <div class="row">

								<!-- LOOP Search Results-->
								<?php 
									$count = 0;
									foreach($result_per_page as $row) {		
								?>
									<div class="col-md-4 col-sm-6">
                                    <div class="portfolio-item">
                                        <div class="item-image">
                                            <a href="#">
												<a href="<?php echo $this->config->item('base_url') . "index.php/watch/show_video?video_yt_id=" . $row->video_link; ?>"><img src="http://img.youtube.com/vi/<?php echo $row->video_link; ?>/<?php echo $count; ?>.jpg" alt="Smiley face"></a>
                                                <!--<img src="<?php echo(IMG.'portfolio1.jpg'); ?>" class="img-responsive center-block" alt="portfolio1">-->
                                                <div><span><i class="fa fa-plus"></i></span></div>
                                            </a>
                                        </div>

                                        <div class="item-description">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <span class="item-name">
                                                        <?php echo $row->user_name; ?>
                                                    </span>
                                                    <span>
                                                        <?php echo $row->contract_until; ?>
                                                    </span>
                                                </div>
                                                <div class="col-xs-6">
                                                    <span class="like">
                                                        <i class="fa fa-heart-o"></i>
                                                        576
                                                    </span>
                                                </div>
                                            </div>
                                        </div> <!-- end of /.item-description -->
                                    </div> <!-- end of /.portfolio-item -->
                                </div>									
									
								<?php 
										$count++;
									}
								?>
                            </div>
							
							<?php echo $this->pagination->create_links(); ?>
                        </div> <!-- end of portfolio-item-list -->
                            
                    </div>
                </section> 
                <!--   end of portfolio section  -->


                <!-- begin twitter-feed section -->
                <section class="twit-feed">
                    <div class="twit-feed-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div id="twit" class="owl-carousel owl theme">

                                        <div class="item text-center">
                                            <div class="twit-content">
                                                <div class="twit-icon">
                                                    <i class="fa fa-twitter"></i>
                                                </div>
                                                <h3 class="text-capitalize">free stock photos: 74 best sites to find Awesome free images</h3>
                                                <p>
                                                    @themewagon <br/>
                                                    2 days ago on Twitter.com
                                                </p>
                                            </div>
                                        </div>

                                        <div class="item text-center">
                                            <div class="twit-content">
                                                <div class="twit-icon">
                                                    <i class="fa fa-twitter"></i>
                                                </div>
                                                <h3 class="text-capitalize">free stock photos: 74 best sites to find Awesome free images</h3>
                                                <p>
                                                    @themewagon <br/>
                                                    2 days ago on Twitter.com
                                                </p>
                                            </div>
                                        </div>

                                        <div class="item text-center">
                                            <div class="twit-content">
                                                <div class="twit-icon">
                                                    <i class="fa fa-twitter"></i>
                                                </div>
                                                <h3 class="text-capitalize">free stock photos: 74 best sites to find Awesome free images</h3>
                                                <p>
                                                    @themewagon <br/>
                                                    2 days ago on Twitter.com
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section> <!--   end of /.twit-feed section  -->



         



                            
            </div> <!-- end of /.main-content -->

            <footer>
                <div class="container">
                    <div class="row">

                        <!-- useful links -->
                        <div class="col-md-3 col-sm-6 col-xs-6 footer-widget">
                            <h4>Useful Links</h4>
                            <ul class="row footer-links">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <li><a href="#">Web Design</a></li>
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Mobile</a></li>
                                    <li><a href="#">Blog</a></li>
                                    <li><a href="#">Services</a></li>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <li><a href="#">Organization</a></li>
                                    <li><a href="#">Career</a></li>
                                    <li><a href="#">Media</a></li>
                                    <li><a href="#">24/7</a></li>
                                    <li><a href="#">Right Way</a></li>
                                </div>
                            </ul>
                        </div>

                        <!-- news-letter -->
                        <div class="col-md-3 col-sm-6 col-xs-6 footer-widget">
                            <h4>E-News-Letter</h4>

                            <p>Sign up for our mailing list to get latest updates and offers</p>
                            <div class="input-group margin-bottom-sm">
                                <input class="form-control" type="text" placeholder="Email address">
                                <span class="input-group-addon">
                                    <i class="fa fa-paper-plane fa-fw"></i>
                                </span>
                            </div>
                            <p>We respect your privacy</p>
                        </div> <!-- /.footer-widget -->

                        <!-- about avada agency -->
                        <div class="col-md-3 col-sm-6 col-xs-6 footer-widget">
                            <h4>Karepmu Cipta Kreasi</h4>

                            <p>
                                HUGE Website Builder is a big library of pre-designed web elements which help you to create website in few minutes.
                            </p>

                            <div class="footer-address">
                                <p>
                                    1-800-123-HELLO  <br>
                                    example@mail.com
                                </p>
                            </div>

                            
                        </div> <!-- /.footer-widget -->

                    </div>
                </div>
            </footer>


            <!-- footer-navigation start -->  
            <nav class="hidden-xs hidden-sm navbar footer-nav" role="navigation">
                <div class="container">
                    
                    <div class="navbar-header">
                        
                        <!-- navbar logo -->
                        <div class="navbar-brand">
                            <span class="sr-only">&copy;KCK</span>
                            <a href="index.html">
                                &copy;KCK
                            </a>
                        </div>
                        <!-- navbar logo -->

                    </div><!-- /.navbar-header -->

                    <!-- nav links -->
                    <div class="collapse navbar-collapse" id="main-nav-collapse">
                        <ul class="nav navbar-nav navbar-right text-capitalize">
                            <li><a href="#about">
                                <span>home</span>
                            </a></li>

                            <li><a href="#services">
                                <span>pages</span>
                            </a></li>

                            <li><a href="#portfolio">
                                <span>features</span>
                            </a></li>

                            <li><a href="#team">
                                <span>portfolio</span>
                            </a></li>

                            <li><a href="#pricing">
                                <span>blog</span>
                            </a></li>

                            <li><a href="#blog">
                                <span>shop</span>
                            </a></li>

                            <li><a href="#contact">
                                <span>contact</span>
                            </a></li>
                        </ul>
                    </div><!-- nav links -->
                    
                </div><!-- /.container -->
            </nav>
            <!-- footer-navigation end -->
            
        </div> <!-- end of /#home-page -->

        <!--  Necessary scripts  -->
        <script type="text/javascript" src="<?php echo(JS.'jquery-2.1.3.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo(JS.'bootstrap.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo(JS.'owl.carousel.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo(JS.'jquery.hoverdir.js'); ?>"></script>
		
        <!-- script for portfolio section using hoverdirection -->
        <script type="text/javascript">
            $(function() {

                $('.portfolio-item > .item-image').each( function() { $(this).hoverdir({
                    hoverDelay : 75
                }); } );

            });
        </script>


        <!-- script for twitter-feed using owl carousel-->
        <script type="text/javascript">
            $(document).ready(function() {
 
                $("#twit").owlCarousel({
                 
                    navigation : true, // Show next and prev buttons
                    slideSpeed : 100,
                    paginationSpeed : 400,
                    navigationText : false,
                    singleItem: true,
                    autoPlay: true,
                    pagination: false
                });
 
            });
        </script>


        <!-- script for testimonial section using owl carousel -->
        <script type="text/javascript">
            $(document).ready(function() {
 
                $("#client-speech").owlCarousel({
                 
                    autoPlay: 5000, //Set AutoPlay to 3 seconds
                    stopOnHover: true,
                    singleItem:true
                });
 
            });
        </script>
		
		<script>
  // Load the IFrame Player API code asynchronously.
  var tag = document.createElement('script');
  tag.src = "https://www.youtube.com/player_api";
  var firstScriptTag = document.getElementsByTagName('script')[0];
  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

  // Replace the 'ytplayer' element with an <iframe> and
  // YouTube player after the API code downloads.
  var player;
  function onYouTubePlayerAPIReady() {
    player = new YT.Player('ytplayer', {
      height: '390',
      width: '640',
      videoId: '<?php echo $video_yt_id; ?>'
    });
  }
</script>


    </body>
</html>