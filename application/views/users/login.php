<h2 class="text-center"><?=$title?></h2>
<div class="col-md-6 offset-3">
<?=form_open('users/login')?>
    <div class="form-group">
    <label>Username:</label>
        <input type="text" name="username" class="form-control">
    </div>
    <div class="form-group">
    <label>Password:</label>
        <input type="password" name="password" class="form-control">
    </div>
    <input type="submit" value="Log-in" class="form-control btn btn-primary">
<?=form_close()?>
</div>
