<?php
    require_once '../tools/validation.php';
    require_once '../classes/account.class.php';

    session_start();

    //if add account$account_obj is submitted
    if(isset($_POST['save'])){
      $account_obj = new Account();
      //sanitize user inputs
      $account_obj->username = htmlentities($_POST['username']);
      $account_obj->email = htmlentities($_POST['email']);
      $account_obj->password = htmlentities($_POST['password']);
      $account_obj->user_type = 'cust';
      if(validate_add_user($_POST)){
          if($account_obj->sign_add()){  
              //redirect user to landing page after saving
              header('location: login.php');
          }
      }
    }

    require_once('../includes/header.php');
?>

<div class="hero_area">

<div class="container-form">
  <form id="signup-form" action="signup.php" method="post">
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control" id="username" name="username" >
      <div class="error-signup" id="username-error">
      </div>
      <?php
        if(isset($_POST['save']) && !validate_username($_POST)){
        ?>
          <div class="text-danger">username is invalid. Trailing spaces will be ignored.</div>
        <?php
            }
        ?>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" name="email" >
      <div class="error-signup" id="email-error"></div>
      <?php
        if(isset($_POST['save']) && !validate_email($_POST)){
        ?>
          <div class="text-danger">Email is invalid. Trailing spaces will be ignored.</div>
        <?php
            }
        ?>
      </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" name="password">
      <div class="error-signup" id="password-error"></div>
    </div>
    <input type="submit" class="btn-signup btn-primary" id="save" name="save" value="Sign Up">
    <hr>
    I Already have an account <a href="login.php" class="text-primary">Login</a>
  </form>
</div>
</div>

  <!-- end info_section -->

<?php
    require_once('../includes/buttomnav.php');
?>