<link rel="stylesheet" href="./styles/header.css">
<link rel="icon" href="./styles/favicon.ico" type="image/x-icon">

<header>
    <h2>PHILIPPINE MALABON CULTURAL INSTITUTE</h2>

    <div class="set">
        <form action="" method="POST">
            <input type="submit" class="button" name="profile" value="PROFILE">
            <input type="submit" class="button" name="logout" value="LOGOUT" onclick="return confirmLogout()">
        </form>
    </div>

    <?php
    require 'functions.php';

    if (isset ($_POST['profile'])) {
        header('Location: ./profile.php');
        exit();
    }

    if (isset ($_POST['logout'])) {
        logout();
        exit();
    }
    ?>

    <script>
        function confirmLogout() {
            var response = confirm('Are you sure you want to log out?');
            if (response) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</header>