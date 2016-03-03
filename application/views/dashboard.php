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
				<span>Profile</span>
				</h2>
		</div>
		<!--//banner-->
 	 <!--faq-->
<div class="blank">
	

		<div class="blank-page">
			<h3>Profile</h3>
			<?php if ($this->session->userdata['logged_in']['agent'] == 0) { ?>
			<table>
			<tr>
				<td>Name</td><td>:</td><td><?php echo $this->session->userdata['logged_in']['username']; ?></td>
			</tr>
			<tr>
				<td>Type</td><td>:</td><td><?php echo $this->session->userdata['logged_in']['roleid']; ?></td>
			</tr>
			<tr>
				<td>Agent</td><td>:</td><td><?php echo $this->session->userdata['logged_in']['agenid']; ?></td>
			</tr>
			<tr>
				<td>DOB</td><td>:</td><td><?php echo $this->session->userdata['logged_in']['dop']; ?></td>
			</tr>
			<tr>
				<td>POB</td><td>:</td><td><?php echo $this->session->userdata['logged_in']['pob']; ?></td>
			</tr>
			<tr>
				<td>Height</td><td>:</td><td><?php echo $this->session->userdata['logged_in']['height']; ?></td>
			</tr>
			<tr>
				<td>Contract Until</td><td>:</td><td><?php echo $this->session->userdata['logged_in']['contractuntil']; ?></td>
			</tr>
			</table>
			<?php } else { ?>
			
			<table>
			<tr>
				<td>Name</td><td>:</td><td><?php echo $this->session->userdata['logged_in']['agentname']; ?></td>
			</tr>
			<tr>
				<td>Type</td><td>:</td><td>Agent</td>
			</tr>
			<tr>
				<td>DOB</td><td>:</td><td><?php echo $this->session->userdata['logged_in']['agentdob']; ?></td>
			</tr>
			<tr>
				<td>POB</td><td>:</td><td><?php echo $this->session->userdata['logged_in']['agentpob']; ?></td>
			</tr>
			</table>
			
			<?php } ?>
			<!--
	       	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
	           Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
			   -->
        </div>
</div>
<?php include 'footer.php';?>