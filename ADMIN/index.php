<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="./styles/index.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>LOGIN</title>
</head>

<body>


    <div class="form-container">

        <div class="form">
            <h5><a class="back" href="../index.php">
                < Home</a>
            </h5>
            <H1>PMCI LOGIN</H1>

            <?php
            require "functions.php";

            if (isset ($_SESSION['admin'])) {
                header('Location: ./home.php');
                exit();
            }
            
            if (isset ($_POST['login'])) {
                $response = login($_POST['username'], $_POST['password']);
                if (@$response == false) { ?>
                    <p class="error">
                        <?php echo '<i class="fas fa-times"></i> Database error, Please contact administrator' ?>
                    </p>
                <?php } else { ?>
                    <p class="error">
                        <?php echo '<i class="fas fa-times"></i> ' . @$response; ?>
                    </p>
                    <?php
                }
            }
            ?>
            <form action="" method="post" autocomplete="off">
                <label for="username">USERNAME</label>
                <input type="text" placeholder="Enter your username here" name="username" id="username" class="text-box <?php if (@$response == "Both fields are required" || @$response == "Username not recognized") {
                    echo 'wrong';
                } ?>" value="<?php echo @$_POST['username']; ?>"> <br>

                <label for="password">PASSWORD</label>
                <input type="password" placeholder="Enter your password here" name="password" id="password" class="text-box <?php if (@$response == "Both fields are required" || @$response == "Wrong password") {
                    echo 'wrong';
                } ?>" value="<?php echo @$_POST['password']; ?>"><br>

                <input type="checkbox" name="check" id="check"><label for="check"> Remember Me</label><br><br><br>

                <div class="baba">
                    <input class="button" type="submit" name="login" id="login" value="LOG IN"><br>
                </div>
            </form>
            <p class="cent">Dont have an account? <a href="./register.php">REGISTER</a></p>
        </div>
        <div class="img">
            <img src="../styles/images/school1.png" alt="building">
        </div>


    </div>


</body>


</html>