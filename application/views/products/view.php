<h2><?=$product['name'];?></h2>
<div class="row">
	<div class="col-md-6">
		<img src="<?=base_url().'assets/images/products/'.$product['product_image'];?>" class="img-thumbnail">
	</div>
	<div class="col-md-6">
		<h3>Description:</h3>
		<p><?=$product['description'];?></p>
		<br>
		<h5>Price:</h5>
		<p>&#8369; <?=$product['price'];?></p>
	</div>
</div>
<br>

<?php if($this->session->userdata('is_login')&&$this->user_model->user_check($product['id'], $this->session->userdata('user_id'))):?>
<?=form_open('products/delete/'.$product['id'], array('class'=>'tosubmit'));?>
	<input type="submit" value="Delete" class="btn btn-danger float-left">
<?=form_close();?>

<?=form_open('products/edit/'.$product['slug'].'/'.$product['id'], array('class'=>'tosubmit'));?>
	<input type="submit" value="Edit" class="btn btn-success float-right">
<?=form_close();?>
<?php endif; ?>

