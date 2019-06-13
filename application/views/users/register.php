<h2 class="text-center"><?=$title?></h2>
<div class="col-md-6 offset-3">

<div style="color:red;">
<?=validation_errors();?>
</div>

<?=form_open('users/register')?>
    <div class="form-group">
    <label>Name:</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group">
    <label>Email:</label>
        <input type="email" name="email" class="form-control">
    </div>
    <div class="form-group">
    <label>Username:</label>
        <input type="text" name="username" class="form-control">
    </div>
    <div class="form-group">
    <label>Password:</label>
        <input type="password" name="password" class="form-control">
    </div>
    <div class="form-group">
    <label>Confirm Password:</label>
        <input type="password" name="confirmPassword" class="form-control">
    </div>
    
    <input type="submit" value="Register Now!" class="form-control btn btn-primary">
<?=form_close()?>
</div>