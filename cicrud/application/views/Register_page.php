

<div class="container">
	<div class="row">
		<div class="col-sm-offset-4 col-sm-4">
			<h1><?= $title; ?></h1>
			<?php echo validation_errors(); ?>

			<?php echo form_open("Login/Register"); ?>
			<div class="form-group">
				<label>Username</label>
				<input type="text" class="form-control" name="username">
			</div>

			<div class="form-group">
				<label>Password</label>
				<input type="password" class="form-control" name="password">
			</div>

			<div class="form-group">
				<label>Confirm Password</label>
				<input type="password" class="form-control" name="password2">
			</div>
			<button type="submit" class="btn btn-primary">Register</button>
			<a href="<?php echo base_url(); ?>">Login</a>
		</div>
	</div>
</div>
<?php echo form_close(); ?>
</html>