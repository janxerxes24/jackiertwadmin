<header class="header_section">
      <div class="header_top">
        <div class="container-fluid">
          <div class="top_nav_container">
            <div class="contact_nav">
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call : +63 9123456789
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  Email : jackiertw@gmail.com
                </span>
              </a>
            </div>
            <from class="search_form">
              <input type="text" class="form-control" placeholder="Search here...">
              <button class="" type="submit">
                <i class="fa fa-search" aria-hidden="true"></i>
              </button>
            </from>
            <div class="user_option_box">
              <a href="" class="cart-link">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                <span>
                  Cart
                </span>
              </a>
                <?php if(isset($_SESSION['fullname'])): ?>
                <a href="#">
                <?php echo $_SESSION['fullname']; ?>
                </a>
                <a href="../login/logout.php">
                  Log Out
                </a>
                <?php else: ?>
                <a href="../login/login.php">
                  Login
                </a>
                <a href="../login/signup.php">
                  Sign-up
                </a>
                <?php endif; ?>
            </div>
          </div>

        </div>
      </div>
      <div class="header_bottom">
        <div class="container-fluid">
          <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="../index.php">
              <span>
                <img  class="jackielogo" src="../images/logo.png" alt="Jackiertw"><span class="jackielogo-text">Jackie RTW&#174;</span>
              </span>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ">
                <li class="nav-item active">
                  <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="category.html">Category</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="track.html">Track Order</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="location.html">Our location</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.html">Contact</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
</header>