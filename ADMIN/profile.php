<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./styles/profile.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROFILE</title>
</head>

<body>
    <?php
    include 'header.php';

    if (!isset ($_SESSION['admin'])) {
        header('location: ./index.php');
        exit();
    }

    ?>

    <main>
        <h1>PROFILE</h1>
        <div class="profile-container">
            <div class="profile">
                <a href="./home.php" title="Back to news editor">
                    < Back</a>
                        <form action="" method="post" autocomplete="off">

                            <label for="">FULL NAME</label><br>
                            <input type="text" name="name"><br>

                            <label for="">EMAIL</label><br>
                            <input type="email" name="email" id=""><br>

                            <label for="">USERNAME</label><br>
                            <input type="text" name="username" id=""><br>

                            <label for="">PASSWORD</label><br>
                            <input type="password" name="password" id=""><br>

                            <div class="submit">
                                <button onclick="save()">SAVE</button>
                            </div>

                        </form>
            </div>
        </div>
    </main>

    <script>
        function save() {
            let text = "SAVE CHANGES?";
            if (confirm(text) == true) {
                // text = "You pressed OK!";
            } else {
                // text = "You canceled!";
            }

        }
    </script>
</body>

</html>