<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'core/init.php';
    include 'include/head.php';
    //logged_in_redirect();

    // login using cookies
    
    // cookies

    if (isset($_COOKIE["type"])) {
        header('Location: home.php');
    }

    ?>
</head>

<body>

    <br><br><br><br><br><br>

    <?php
    if (empty($_POST) === false) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if (empty($username) === true || empty($password) === true)
            $errors[] = 'Enter the username and password';
        else if (user_exits($username, $con) === false) {
            $errors[] = 'Incorrect nomi user name or password';
        } else {
            $login = login($username, $password);
            if ($login === false) {
                $errors[] = 'Incorrect hi user name or password';
            } else {
                //$_SESSION['user_id'] = $login;

                // cookies

                setcookie("type", $username, time() + 3600);
                header("location:home.php");
                exit();
            }
        }
    }


    ?>
    <div class="form-center">

        <form class="form-classic" method='POST' action='userlogin.php'>
            <div class="text-center mb-4">
                <h1 class="h3 mb-3 font-weight-normal">Sign in</h1>
                <?php
                if (empty($errors) === false && empty($_POST) === false)
                    echo output_errors($errors);
                ?>
            </div>

            <div class="form-label-group">
                <input type="text" id="inputUsername" name="username" class="form-control" placeholder="Username" required autofocus>
                <label for="inputUsername">Username</label>
            </div>

            <div class="form-label-group">
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
            </div>

            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

            <br>
            <div class="text-center mb-4">
                <a href="userregister.php">Register!</a>
            </div>
        </form>
    </div>

    <?php include 'includes/scripts.php';
    ?>
</body>

</html>