<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="<?=base_url().'assets/css/bootstrap.min.css';?>">
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
    <ul class="navbar-nav navbar-left">
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url();?>">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Products</a>
      </li>
	</ul>
	
	<ul class="nav navbar-nav ml-auto">
      <li class="nav-item">
	  	<a class="nav-link" href="<?=base_url().'products/create';?>">Create Product</a>
      </li>
    </ul>
  </div>
  </div>
</nav>


<div class="container">	
