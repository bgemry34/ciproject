<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="<?=base_url().'assets/css/bootstrap.min.css';?>">
	<link rel="stylesheet" href="<?=base_url().'assets/css/style.css';?>">
	<title>CIapp</title>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-primary mb-5">
  <div class="container">
  <a class="navbar-brand" href="<?=base_url();?>">ciApp</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExample04">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url();?>">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url();?>products">Products</a>
      </li>
	</ul>
	
	  <ul class="nav navbar-nav ml-auto">
		<?php if(!$this->session->userdata('is_login')):?>
      <li class="nav-item">
	  	<a class="nav-link" href="<?=base_url().'users/register';?>">Register</a>
      </li>
      <li class="nav-item">
	  	<a class="nav-link btn btn-primary" href="<?=base_url().'users/login';?>">Log-in</a>
      </li>
		<?php endif; ?>
		<?php if($this->session->userdata('is_login')):?>
			<li class="nav-item">
			<div class="dropdown">
						<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?=$this->session->userdata('username');?>		
						</button>
  				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item" href="<?=base_url().'products/create';?>">Create Product</a>
							<a class="dropdown-item" href="<?=base_url().'users/logout';?>">Log out</a>
  				</div>
				</div>
			</li>
		<?php endif;?>
    </ul>
  </div>
  </div>
</nav>
<!-- flash-messeges -->

<div class="container">	
<?php if($this->session->flashdata('product_added') ): ?>
		<?="<p class='text-center alert alert-success'>".$this->session->flashdata('product_added')."</p>";?>
<?php endif;?>

<?php if($this->session->flashdata('product_updated') ): ?>
		<?="<p class='text-center alert alert-success'>".$this->session->flashdata('product_updated')."</p>";?>
<?php endif;?>

<?php if($this->session->flashdata('product_deleted') ): ?>
		<?="<p class='text-center alert alert-success'>".$this->session->flashdata('product_deleted')."</p>";?>
<?php endif;?>

<?php if($this->session->flashdata('user_registered') ): ?>
		<?="<p class='text-center alert alert-success'>".$this->session->flashdata('user_registered')."</p>";?>
<?php endif;?>

<?php if($this->session->flashdata('user_login') ): ?>
		<?="<p class='text-center alert alert-success'>".$this->session->flashdata('user_login')."</p>";?>
<?php endif;?>

<?php if($this->session->flashdata('login_fail') ): ?>
		<?="<p class='text-center alert alert-danger'>".$this->session->flashdata('login_fail')."</p>";?>
<?php endif;?>

<?php if($this->session->flashdata('user_loggedout') ): ?>
		<?="<p class='text-center alert alert-success'>".$this->session->flashdata('user_loggedout')."</p>";?>
<?php endif;?>

<?php if($this->session->flashdata('acc_create') ): ?>
		<?="<p class='text-center alert alert-danger'>".$this->session->flashdata('acc_create')."</p>";?>
<?php endif;?>

<?php if($this->session->flashdata('acc_denied') ): ?>
		<?="<p class='text-center alert alert-danger'>".$this->session->flashdata('acc_denied')."</p>";?>
<?php endif;?>
