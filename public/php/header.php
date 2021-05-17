<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="../../../public/html/index.html">
        <img style="margin-right: 5px;" class="icon-logo d-inline-block align-top" src="../../../images/mcJawz_logo_no_txt.png" width="40"
            height="40" alt="">
        McJawz
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="../../../public/html/index.html">Home</a>
            </li>
            <li class="nav-item" style="<?php if(isset($_COOKIE['user_firstName'])){echo "display:none;";}?>">
              <a class="nav-link" href="../../public/html/signup.html">Sign Up</a>
            </li>
            <li class="nav-item" style="<?php if(isset($_COOKIE['user_firstName'])){echo "display:none;";} ?>">
              <a class="nav-link" href="../../public/html/login.html">Log in</a>
            </li>
            <li class="nav-item" style="<?php if(isset($_COOKIE['user_firstName'])){echo "display:block;";} else{echo "display:none;";}?>">
              <a class="nav-link" href="edit_user.php">Welcome, <?php echo $_COOKIE["user_firstName"]; ?>!</a>
            </li>
            <li class="nav-item" style="<?php if(isset($_COOKIE['user_firstName'])){echo "display:block;";} else{echo "display:none;";}?>">
              <a class="nav-link" href="logout.php">Log Out</a>
            </li>
        </ul>
    </div>
</nav>
