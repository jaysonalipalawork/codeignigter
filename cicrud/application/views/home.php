<body class="ho	ld-transition skin-blue sidebar-collapse" id="body">
	<header class="main-header">
	    <a href="#" class="logo">
	        <!-- <span class="logo-mini"><b>PM</b></span> -->
	        <span class="logo-lg">Welcome</span>
	    </a>
    	<nav class="navbar navbar-static-top">
      		<div class="navbar-custom-menu">
        		<ul class="nav navbar-nav">
		          	<li class="dropdown user user-menu">
			            <a href="#" class="dropdown-toggle" data-toggle="dropdown">	
			              	<span class="hidden-xs"><?php echo $this->session->userdata('username'); ?></span>
			            </a>
			            <ul class="dropdown-menu">
				            <li class="user-header">
				                <p>
					                <?php echo $this->session->userdata('username'); ?>
				                </p>
				            </li>
			              	<li class="user-footer">
				                <div class="pull-left">
				                  	<a href="User/Profile" class="btn btn-default btn-flat">Profile</a>
				                </div>
				                <div class="pull-right">
				                  	<a href="User/Logout" class="btn btn-default btn-flat">Sign out</a>
				                </div>
				              </li>
			            </ul>
		          	</li>
		        </ul>
		    </div>
		</nav>
	</header>
</body>
</html>