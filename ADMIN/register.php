<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="./styles/register.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
</head>

<body>

    <div class="form-container">
        <div class="form">
            <H1>REGISTER</H1>


            <?php
            require "functions.php";

            if (isset($_SESSION['admin'])) {
                header('Location: ./home.php');
                exit();
            }

            if (isset($_POST['register'])) {
                $response = register($_POST['admin_user'], $_POST['admin_pass'], $_POST['name'], $_POST['email'], $_POST['username'], $_POST['password'], $_POST['confirm-password']);

                if (@$response == "success") {
                    ?>
                    <p class="success"><i class="fas fa-check"></i> Your registration was successful</p>
                    <?php
                    $_POST['admin_pass'] = '';
                    $_POST['name'] = '';
                    $_POST['email'] = '';
                    $_POST['username'] = '';
                    $_POST['password'] = '';
                    $_POST['confirm-password'] = '';
                } else if (@$response == false) {
                    ?>
                        <p class="error">
                        <?php echo '<i class="fas fa-times"></i> Database error, Please contact administrator' ?>
                        </p>
                    <?php
                } else {
                    ?>
                        <p class="error">
                        <?php echo '<i class="fas fa-times"></i> ' . @$response; ?>
                        </p>
                    <?php
                }
            }
            ?>
            <form action="" method="post" autocomplete="off">
                <div class="admin">
                    <div class="user"><label for="admin_user">ADMIN USERNAME</label>
                        <input type="text" placeholder="Enter Existing Admin Username" name="admin_user" id="admin_user"
                            value="<?php echo @$_POST['admin_user']; ?>" class="text-box <?php if (@$response == "Account not found") {
                                   echo 'wrong';
                               } ?>">
                    </div>
                    <div class="pass">

                        <label for="admin_pass">ADMIN PASSWORD</label>
                        <input type="password" placeholder="Enter Existing Admin Username" name="admin_pass"
                            id="admin_pass" value="<?php echo @$_POST['admin_pass']; ?>" class="text-box <?php if (@$response == "Wrong Admin Password") {
                                   echo 'wrong';
                               } ?>">
                    </div>
                </div>

                <label for="name">FULL NAME</label>
                <input type="text" placeholder="Enter your name here" name="name" id="name"
                    value="<?php echo @$_POST['name']; ?>" class="text-box">

                <label for="email">EMAIL</label>
                <input type="email" placeholder="Enter your email here" name="email" id="email"
                    value="<?php echo @$_POST['email']; ?>" class="text-box  <?php if (@$response == "Email already exists") {
                           echo 'wrong';
                       } ?>">

                <label for="username">USERNAME</label>
                <input type="text" placeholder="Enter your username here" name="username" id="username"
                    value="<?php echo @$_POST['username']; ?>" class="text-box <?php if (@$response == "Username must contain max 12 characters only" || @$response == "Username already exists, please use a different username") {
                           echo 'wrong';
                       } ?>">


                <div class="password">
                    <div class="pass1">
                        <label for="password">PASSWORD</label>
                        <input type="password" placeholder="Enter your password here" name="password" id="password"
                            value="<?php echo @$_POST['password']; ?>" class="text-box <?php if (@$response == "Password is too short, must be 8-24 characters" || @$response == "Password is too long, must be 8-24 characters" || @$response == "Passwords don't match") {
                                   echo 'wrong';
                               } ?>">
                    </div>
                    <div class="pass2">
                        <label for="confirm-password">CONFIRM PASSWORD</label>
                        <input type="password" placeholder="Confirm Password" name="confirm-password"
                            id="confirm-password" value="<?php echo @$_POST['confirm-password']; ?>" class="text-box <?php if (@$response == "Password is too short, must be 8-24 characters" || @$response == "Password is too long, must be 8-24 characters" || @$response == "Passwords don't match") {
                                   echo 'wrong';
                               } ?>">
                    </div>
                </div>

                <div class="baba">
                    <input class="button" type="submit" name="register" value="REGISTER"><br>
                </div>
                <p class="cent">Already have an account? <a href="./index.php">LOGIN</a></p>
            </form>
        </div>
        <div class="img">
            <img src="../styles/images/school1.png" alt="building">
        </div>
    </div>
</body>


</html>