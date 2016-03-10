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
				<span>Videos</span>
				</h2>
		</div>
		<!--//banner-->
 	 <!--faq-->
<div class="blank">

	<div class="blank-page">
		<?php
		if (isset($list_users)) {
			$count = 0;
		?>
			<form id="formplayers" method="get">
			<select name="player" id="players">
				<option value="NULL">Choose player</option>
		<?php
			foreach($list_users as $row) {
		?>
					<option value="<?php echo $row->user_id; ?>" <?php if (isset($player_id) && $player_id == $row->user_id) { ?> selected <?php } ?> ><?php echo $row->user_name; ?></option>
		<?php
				$count++;
			}
		?>
			</select>
			<script type="text/javascript">
				$(document).ready(function() {
					$("#players").change(function() {
						$('#formplayers').submit();
					});
				});
			</script>
			</form>
		<?php
		}
		?>
		<?php
		if (isset($result_per_page)) {	
			$count = 0;
			foreach($result_per_page as $row) {		
		?>
		<!--
				<iframe id="ytplayer" type="text/html" width="640" height="390"
  src="http://www.youtube.com/embed/<?php //echo $row->video_link; ?>?autoplay=1&origin=http://example.com"
  frameborder="0"/>
		-->
				<a href="<?php echo $this->config->item('base_url') . "index.php/watch/show_video?video_yt_id=" . $row->video_link; ?>"><img src="http://img.youtube.com/vi/<?php echo $row->video_link; ?>/<?php echo $count; ?>.jpg" alt="Smiley face" height="200" width="250"></a>
		<?php 
				$count++;
			}

			echo $this->pagination->create_links();
		}
		?>
	</div>

</div>
<?php include 'footer.php';?>