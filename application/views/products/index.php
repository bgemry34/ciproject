<h2 class="text-center"><?=$title?></h2>
<div class="row mt-5">
<?php foreach($products as $product):?>
<div class="col-md-3 col-xs-2 col-sm-4">
<div class="thumbnail">
<a href="<?=site_url('products/'.$product['slug'].'/'.$product['id']);?>" >
<img style="" src="<?=base_url().'assets/images/products/'.$product['product_image'];?>" alt="" class="img-thumbnail d-block">
<p class="text-center"><?=$product['name']?></p>
<p class="display-5 text-center"> &#8369;<?=$product['price'];?></p>
</a>
</div>
</div>
<?php endforeach;?>
</div>
