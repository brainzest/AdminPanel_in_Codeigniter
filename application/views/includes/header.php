<!DOCTYPE html> 
<html lang="en-US">
<head>
  <title>Fabelizer</title>
  <meta charset="utf-8">
  <link href="<?php echo base_url(); ?>assets/css/admin/global.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="navbar navbar-fixed-top">
	  <div class="navbar-inner">
	    <div class="container">
	      <a class="brand">Some Admin Panel</a>
	      <ul class="nav">
	        <li <?php if($this->uri->segment(2) == 'users'){echo 'class="active"';}?>>
	          <a href="<?php echo base_url(); ?>admin/users">Users</a>
	        </li>
	        <li <?php if($this->uri->segment(2) == 'storyboard'){echo 'class="active"';}?>>
	          <a href="<?php echo base_url(); ?>admin/storyboard">StoryBoard</a>
	        </li>
              <li <?php if($this->uri->segment(2) == 'synopsis'){echo 'class="active"';}?>>
                  <a href="<?php echo base_url(); ?>admin/synopsis">Synopsis</a>
              </li>
              <li <?php if($this->uri->segment(2) == 'notification'){echo 'class="active"';}?>>
                  <a href="<?php echo base_url(); ?>admin/notify">Notification</a>
              </li>
              <li <?php if($this->uri->segment(2) == 'feedback'){echo 'class="active"';}?>>
                  <a href="<?php echo base_url(); ?>admin/feedback">Feedback</a>
              </li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">System <b class="caret"></b></a>
	          <ul class="dropdown-menu">
	            <li>
	              <a href="<?php echo base_url(); ?>admin/logout">Logout</a>
	            </li>
	          </ul>
	        </li>
	      </ul>
	    </div>
	  </div>
	</div>	
