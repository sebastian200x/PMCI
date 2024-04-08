<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./styles/profile.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <title>PROFILE</title>
</head>

<?php include 'header.php'; ?>

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

                if (isset ($_POST['update'])) {

                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $username = $_POST['username'];

                    $editinfo = editprofile($name, $email, $username);

                    if ($editinfo == "success") {
                        echo '<p class="success"> <i class="fas fa-check"></i> Profile Updated Successfully</p>';
                    } else {
                        echo '<p class="error"> <i class="fas fa-times"></i> ' . @$account_info . '</p>';
                    }
                }
                ?>
                <form action="" method="post" autocomplete="off">
                    <a href="./home.php" title="Back to news editor" class="back"><i class="fas fa-arrow-left"></i>
                        Back</a> <br><br>
                    <label for="name">FULL NAME</label><br>
                    <input type="text" name="name" id="name"
                        value="<?php echo isset ($account_info['name']) ? $account_info['name'] : ''; ?>"><br>

                    <label for="email">EMAIL</label><br>
                    <input type="email" name="email" id="email"
                        value="<?php echo isset ($account_info['email']) ? $account_info['email'] : ''; ?>"><br>

                    <label for="username">USERNAME</label><br>
                    <input type="text" name="username" id="username"
                        value="<?php echo isset ($account_info['username']) ? $account_info['username'] : ''; ?>"><br>
                    <label for="oldpass">OLD PASSWORD</label><br>
                    <input type="password" name="oldpass" id="oldpass"><br>

                    <div class="pass">
                        <div class="pass1">
                            <label for="newpass">NEW PASSWORD</label><br>
                            <input type="password" name="newpass" id="newpass"><br>
                        </div>
                        <div class="pass2">
                            <label for="confirmpass">CONFIRM PASSWORD</label><br>
                            <input type="password" name="confirmpass" id="confirmpass"><br>
                        </div>
                    </div>
                    <div class="submit">
                        <input type="submit" class="button-profile" name="update" value="Update" id="update">
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>