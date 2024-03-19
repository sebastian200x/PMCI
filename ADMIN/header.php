<link rel="stylesheet" href="./styles/header.css">

<header>
    <h2>PHILIPPINE MALABON CULTURAL INSTITUTE</h2>

    <div class="set">
        <form action="" method="POST">
            <input type="submit" class="button" name="profile" value="PROFILE">
            <input type="submit" class="button" name="logout" value="LOGOUT">
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
</header>