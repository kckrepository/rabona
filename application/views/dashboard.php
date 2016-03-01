<?php

	if (!isset($this->session->userdata['logged_in'])) {
		header("location: ". $this->config->item('base_url'));
	}
?>
<?php include 'topside.php';?>
<div id="page-wrapper" class="gray-bg dashbard-1">
    <div class="content-main">
 
 	<!--banner-->	
		<div class="banner">
		    	<h2>
				<a href="dashboard.php">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Blank</span>
				</h2>
		</div>
		<!--//banner-->
 	 <!--faq-->
<div class="blank">
	

		<div class="blank-page">				
	       	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
	           Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
        </div>
</div>
<?php include 'footer.php';?>