<div class="container">
	<div class="row">
		<div class="col-sm-offset-4 col-sm-4">
			<br/>
			<h1><?= $title; ?></h1>
			<?php echo validation_errors(); ?>
			<?php echo form_open("/"); ?>
			<div class="form-group">
				<label>Username</label>
				<input type="text" class="form-control" name="username">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" class="form-control" name="password">
			</div>
			<div>
				<br/>
				<button type="submit" class="btn btn-primary">Login</button>
				<a href="<?php echo base_url(); ?>register">Register</a>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
</html>

