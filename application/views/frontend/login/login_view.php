<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Simple Login with CodeIgniter</title>
 </head>
 <body>
   <h1>Simple Login with CodeIgniter</h1>
   <?php echo validation_errors(); ?>
   <?php echo form_open('login/submit'); ?>
     <label for="username">Username:</label>
     <input type="text" size="20" id="username" name="username" value="<?php echo isset($uname) ? $uname : ''; ?>" />
     <br/>
     <label for="password">Password:</label>
     <input type="password" size="20" id="passowrd" name="password" value="<?php echo isset($upass) ? $upass : ''; ?>" />
     <br/>
     <input type="submit" value="Login" name="user_log_in" />
     
    <label> <input type="checkbox" value="1" name="remember_me" <?php if (isset($remember_me)) { echo 'checked';} ?> /> remember me </label>
   </form>
 </body>
</html>