<h2 class="text-center"><?=$title?></h2>
<div class="col-md-6 offset-3">
	<div style="color: red;">
	<?=validation_errors();?>
	</div>
	<?=form_open_multipart('products/create');?>
	<div class="form-group">
		<Label>Name:</Label>
		<input type="text" name="name" class="form-control">
	</div>
	<div class="form-group">
		<Label>Price:</Label>
		<input type="text" name="price" class="form-control">
	</div>
	<div class="form-group">
		<label>Description:</label>
		<textarea name="description" cols="30" class=form-control></textarea>
	</div>
	<div class="form-group">
		<label>Upload Image:</label><br>
		<input type="file" name="userfile" size="20">
	</div>
	<input type="submit" value="Submit" class="form-control btn btn-primary">
<?=form_close();?>
</div>
