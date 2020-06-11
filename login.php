<?php
include('includes/header.php'); 
include 'database/init.php';
logged_in_redirect();
?>



<?php
    if(empty($_POST)===false)
    {
        $username=$_POST['userName'];
        $password=$_POST['pas'];
        if (empty($username)===true || empty($password)===true)
            $errors[]='Enter the username and password';
        else if(user_exits($username, $con) === false)
            $errors[]='Incorrect user name or password';
        else
        {
            $login=login($username,$password);
            if($login === false)
            {
                $errors[]='Incorrect user name or password';
            }
            else
            {
              setcookie("admincookie", $username, time() + 3600);
                $_SESSION['user_id']=$login;
                header('Location: index.php');
                exit();
            }
        }  
    }
    ?>


<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-6 col-lg-6 col-md-6">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Login into Admin Dashboard!</h1>

                <div class="text-center mb-4">
                <?php
                if (empty($errors) === false && empty($_POST) === false)
                    echo output_errors($errors);
                ?>
            </div>
                <form class="user" action="login.php" method="POST">

                    <div class="form-group">
                    <input type="text" name="userName" class="form-control form-control-user" placeholder="Enter UserName">
                    </div>
                    <div class="form-group">
                    <input type="password" name="pas" class="form-control form-control-user" placeholder="Password">
                    </div>
            
                    <button type="submit" name="login_btn" class="btn btn-primary btn-user btn-block"> Login </button>
                    <hr>
                </form>

            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

</div>

<?php

include('includes/scripts.php'); 
?>