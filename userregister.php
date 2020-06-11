<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
    //protect_page();
    include 'core/init.php';
    include 'include/head.php';
    //logged_in_redirect();
    ?>
</head>
<body>
    <br><br>
    <div class="form-center">
        
        <form class="form-classic" method='POST' action='Manage_user/adduser.php'>
            <div class="text-center mb-4">
                <!-- <img class="mb-4" src="/image/logo-black.png" alt="" width="72" height="72"> -->
                <h1 class="h3 mb-3 font-weight-normal">Sign Up</h1>
                <?php
                if(empty($errors) === false && empty($_POST)===false)
                    echo output_errors($errors);
                ?>
            </div>
            <br>

            <div class="form-label-group">
                <input type="text" id="inputUserfirstname" name="id" class="form-control" placeholder="Id" required autofocus>
                <label for="inputUsername">Enter Id</label>
            </div> 
    
            <div class="form-label-group">
                <input type="text" id="inputUserfirstname" name="firstname" class="form-control" placeholder="Username" required autofocus>
                <label for="inputUsername">First Name</label>
            </div> 
            
            <div class="form-label-group">
                <input type="text" id="inputUserlastname" name="lastname" class="form-control" placeholder="Username" required autofocus>
                <label for="inputUsername">Last Name</label>
            </div>

            <div class="form-label-group">
                <input type="text" id="inputUsername" name="username" class="form-control" placeholder="Username" required autofocus>
                <label for="inputUsername">Username</label>
            </div>

            <div class="form-label-group">
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
            </div>
    <br>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
           
        </form>
    </div>

    <?php include 'includes/scripts.php'; 
     ?>
</body>
</html>
