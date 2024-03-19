<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./styles/profile.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include 'header.php'; ?>
    <title>PROFILE</title>
</head>

<body>

    <main>
        <div class="profile-container">
            <div class="profile">
                <?php

                if (!isset ($_SESSION['admin'])) {
                    header('location: ./index.php');
                    exit();
                }

                $account_info = accountinfo();

                if (isset ($_POST['save'])) {

                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $username = $_POST['username'];

                    $editinfo = editprofile($name, $email, $username);

                    if ($editinfo == "success") {
                        echo '<p class="success"> <i class="fas fa-check"></i> Profile Updated Successfully</p>';
                    } else {
                        echo '<p class="error"> <i class="fas fa-times"></i> ' . $account_info . '</p>';
                    }
                }
                ?>
                <form action="" method="post" autocomplete="off">
                    <label for="name">FULL NAME</label><br>
                    <input type="text" name="name" id="name"
                        value="<?php echo isset ($account_info['name']) ? $account_info['name'] : ''; ?>"><br>

                    <label for="email">EMAIL</label><br>
                    <input type="email" name="email" id="email"
                        value="<?php echo isset ($account_info['email']) ? $account_info['email'] : ''; ?>"><br>

                    <label for="username">USERNAME</label><br>
                    <input type="text" name="username" id="username"
                        value="<?php echo isset ($account_info['username']) ? $account_info['username'] : ''; ?>"><br>

                    <label for="password">PASSWORD</label><br>
                    <input type="password" name="password" id="password"><br>

                    <div class="submit">
                        <input type="submit" class="button" name="save" value="Update" id="save">
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>