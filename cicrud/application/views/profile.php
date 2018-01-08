<body>
	<div class="container">
		<br/>

		<div class="col-sm-7 col-xs-12">
			<a href="<?php echo base_url(); ?>User"><button class="btn btn-danger">Cancel</button></a>

			<a href="<?php echo base_url(); ?>User/Deactive" style="float: right;"><button class="btn btn-danger">Deactive</button></a>
			<br/><br/>
			<div class="panel panel-primary">
			    <div class="panel-heading">Information</div>
			    <div class="panel-body">
			    	<form action="<?php echo base_url(); ?>User/UpdateInformation" method="post">
			    		<div class="form-group">
			    			<div class="row">
				    			<div class="col-xs-4">
				    				<label>Lastname:</label>
				    				<input type="text" name="lastname" class="form-control" value="<?= $lastname; ?>">
				    			</div>
				    			<div class="col-xs-4">
				    				<label>Firstname:</label>
				    				<input type="text" name="firstname" class="form-control" value="<?= $firstname; ?>">
				    			</div>
				    			<div class="col-xs-4">
				    				<label>Middlename:</label>
				    				<input type="text" name="middlename" class="form-control" value="<?= $middlename; ?>">
				    			</div>
				    		</div>
			    		</div>
			    		<div class="form-group">
			    			<div class="row">
				    			<div class="col-xs-12">
				    				<label>Address:</label>
				    				<textarea name="address" class="form-control" style="resize: none;" ><?= $address; ?></textarea>
				    			</div>
				    		</div>
			    		</div>

			    		<div class="form-group">
			    			<div class="row">
				    			<div class="col-xs-12">
				    				<label>Role:</label>
				    				<input type="text" name="role" class="form-control" value="<?= $role; ?>">
				    			</div>
				    		</div>
			    		</div>

			    		<div class="form-group">
			    			<div class="row">
				    			<div class="col-xs-offset-5">
				    				<button type="submit" class="btn btn-primary">Save</button>
				    			</div>
				    		</div>
			    		</div>
			    	</form>
			    </div>
			</div>
		</div>
		<br><br><br>
		<div class="col-sm-offset-1 col-sm-4 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading">Change Password</div>
				<div class="panel-body">
					<div class="col-xs-12">
							<div class="form-group">
								<label>Old Password:</label>
								<input type="password" id="oldpassword" class="form-control">
							</div>
							<div class="form-group">
								<label>New Password:</label>
								<input type="password" id="newpassword" class="form-control">
							</div>
							<div class="form-group">
								<label>Confirm Password:</label>
								<input type="password" id="confirmpassword" class="form-control">
							</div>
							<div class="form-group">
				    			<div class="row">
					    			<div class="col-xs-offset-4">
					    				<button class="btn btn-primary" id="btnchangepassword">Save</button>
					    			</div>
					    		</div>
				    		</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$("#btnchangepassword").click(function(){
			var old = $("#oldpassword").val();
			var newpass = $("#newpassword").val();
			var cnewpass = $("#confirmpassword").val();

			var url = "<?php echo base_url(); ?>Login/ChangePassword";
			var data = {"old":old, "newpass": newpass, "cnewpass":cnewpass};

			$.ajax({
				url: url,
				data: data,
				method: "post",
				success: function(data)
				{
					if(data)
					{
						UIkit.notification({
						    message : "Change Password Successful",
						    status  : 'success',
						    timeout : 2000,
						    pos     : 'top-center'
						});
					}
					else
					{
						UIkit.notification({
						    message : "Old password not match",
						    status  : 'danger',
						    timeout : 2000,
						    pos     : 'top-center',
						});
					}
					$("#oldpassword").val("");
					$("#newpassword").val("");
					$("#confirmpassword").val("");
				}
			});
		});
	});
</script>

