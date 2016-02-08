<?php
include('head.php');
?>

<div class='container container-admin row-7'>

	<ul class='nav nav-tabs' role='tablist' id='tabs' style='display: none;'>
		<li role='presentation' class='active'><a href='#step1' aria-controls='step1' role='tab' data-toggle='tab'></a></li>
		<li role='presentation'><a href='#step2' aria-controls='step2' role='tab' data-toggle='tab'></a></li>
		<li role='presentation'><a href='#step3' aria-controls='step3' role='tab' data-toggle='tab'></a></li>
	</ul>

	<div class='tab-content'>
		<div role='tabpanel' class='tab-pane active' id='step1'>
			<div class='row'>
				<h1><?php echo $m['install']; ?> <small><?php echo $m['step']; ?> 1 / 3</small></h1>
			</div>

			<?php
			// Show the requirements before starting the installation
			requirements();
			?>
		</div>



		<div role='tabpanel' class='tab-pane' id='step2'>
			<div class='row'>
				<h1><?php echo $m['install']; ?> <small><?php echo $m['step']; ?> 2 / 3</small></h1>
				<div id='database_response'></div>
			</div>

			<form method='post' id='check_database'>
				<div class='row row-1'>
					<div class='form-group'>
						<label class='col-sm-4 control-label'><?php echo $m['mysql_host']; ?></label>
						<div class='col-sm-8'>
							<input type='text' class='form-control' name='host'>
						</div>
					</div>
				</div>

				<div class='row row-1'>
					<div class='form-group'>
						<label class='col-sm-4 control-label'><?php echo $m['mysql_user']; ?></label>
						<div class='col-sm-8'>
							<input type='text' class='form-control' name='user'>
						</div>
					</div>
				</div>

				<div class='row row-1'>
					<div class='form-group'>
						<label class='col-sm-4 control-label'><?php echo $m['mysql_password']; ?></label>
						<div class='col-sm-8'>
							<input type='password' class='form-control' name='password'>
						</div>
					</div>
				</div>

				<div class='row row-2'>
					<div class='form-group'>
						<label class='col-sm-4 control-label'><?php echo $m['mysql_database']; ?></label>
						<div class='col-sm-8'>
							<input type='text' class='form-control' name='database'>
						</div>
					</div>
				</div>

				<div class='row row-0'>
					<div class='form-group'>
						<input type='hidden' name='token' value='<?php echo session_id(); ?>'>
						<input type='submit' name='checkconnection' value='<?php echo $m['checkconnection']; ?>' class='btn btn-primary'>
					</div>
				</div>
			</form>
		</div>



		<div role='tabpanel' class='tab-pane' id='step3'>
			<div class='row'>
				<h1><?php echo $m['install']; ?> <small><?php echo $m['step']; ?> 3 / 3</small></h1>
			</div>

			<?php
			echo $m['install_complete'];

			// Show requirements to complete the installation
			installCheck();
			?>
		</div>
	</div>



	<script>
	<?php if(checkRequirements() != 2) { ?>
	$('#tabs li:eq(0) a').tab('show');
	<?php } elseif(empty($con)) { ?>
	$('#tabs li:eq(1) a').tab('show');
	<?php } else { ?>
	$('#tabs li:eq(2) a').tab('show');
	<?php } ?>
	</script>
</div>

<?php
include('footer.php');
?>
