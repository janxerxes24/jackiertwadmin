
<?php
    require_once('../includes/header.php');


    require_once '../classes/account.class.php';

    session_start();

      $account_obj = new Account();
      if(isset($_POST['email']) && isset($_POST['password'])){
        //Sanitizing the inputs of the users. Mandatory to prevent injections!
        $account_obj->email = htmlentities($_POST['email']);
        $account_obj->password = htmlentities($_POST['password']);
        if($account_obj->sign_in()){
            $account = $account_obj->get_account_info();
            foreach($account as $row){
                $_SESSION['logged_id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['fullname'] = $row['username'];
                $_SESSION['user_type'] = $row['user_type'];
                //display the appropriate dashboard page for user
                if($row['user_type'] == 'admin'){
                    header('location: ../admin/dashboard.php');
                }else if($row['user_type'] == 'cust'){
                    header('location: ../landing/landing.php');
                }
            }
        }else{
            //set the error message if account is invalid
            $error = 'Invalid email/password. Try again.';
        }
      }
?>
  <div class="hero_area">
    <!-- end header section -->

    <section class="vh-100" style="background-color: #F3F3F3;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
      
                  <h3 class="mb-5">Sign in</h3>
                  <form action="login.php" method="post">
                  <div class="form-outline mb-4">
                    <input type="email" id="typeEmailX-2" class="form-control form-control-lg" name="email" />
                    <label class="form-label" for="typeEmailX-2">Email</label>
                  </div>
      
                  <div class="form-outline mb-4">
                    <input type="password" id="typePasswordX-2" class="form-control form-control-lg" name="password" />
                    <label class="form-label" for="typePasswordX-2">Password</label>
                  </div>
                  <?php
                            //Display the error message if there is any.
                              if(isset($error)){
                                  echo '<div class="form-outline mb-4 text-danger"><p class="error">'.$error.'</p></div>';
                              }
                  ?>
                  
                  <!-- Checkbox -->
                  <div class="form-check d-flex justify-content-start mb-4">
                    <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                    <label class="form-check-label" for="form1Example3"> Remember password </label>
                  </div>
      
                  <input class="btn btn-primary btn-lg btn-block" type="submit" value="Login" name="save">
      
                  <hr class="my-4">
      
                  <button class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;"
                    type="submit"><i class="fab fa-2google me-"></i> Sign in with google</button>
                      
                    <div class="mdc-layout-grid__cell--span-12 text-center" style="margin-top: 17px;">
                          I Don't have an account <a href="signup.php" class="text-primary">Sign up</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


<?php
    require_once('../includes/buttomnav.php');
?>