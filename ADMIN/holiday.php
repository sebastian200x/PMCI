<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./styles/holiday.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CALENDAR EDITOR</title>
</head>
<?php
include 'header.php';

if (!isset($_SESSION['admin'])) {
    header('location: ./index.php');
    exit();
}

if (isset($_POST['add'])) {
    addholiday();
}
if (isset($_POST['save'])) {
    saveholidays();
}
if (isset($_POST['load'])) {
    loadDefaultData();
}

?>

<body>

    <main>
        <nav>
            <div class="navi">

                <a href="./enrollment.php">Enrollment</a>
                <a class="active" href="./holiday.php">Holiday</a>
            </div>
        </nav>

        <div class="holiday">

            <div class="form">
                <div class="TAAS">
                    <h1>HOLIDAY EDITOR</h1>
                </div>
                <form action="" method="POST">
                    <div class="buttonz">
                        <input style="background-color: rgb(47, 47, 228)" type="submit" name="add" id="add" value="Add">
                        <input type="submit" name="save" id="save" value="Save">
                        <input style="background-color: rgb(148, 148, 0)" type="submit" name="load" id="load" value="Load Default">
                    </div>
                </form>
                <div class="table">
                    <table>
                        <tr>
                            <th>HOLIDAY</th>
                            <th>DATE</th>
                            <th></th>
                        </tr>
                        <?php
                        echo holidaytable(); // Echo the function call to populate the form
                        ?>
                    </table>
                </div>

            </div>
        </div>
    </main>

</body>

<script>
    function delholiday(id) {
        // Ask for confirmation before proceeding
        var confirmDelete = confirm("Are you sure you want to delete this holiday?");
        if (!confirmDelete) {
            return; // Do nothing if user cancels
        }

        // Send an AJAX request to the server
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Display an alert with the server response
                alert(this.responseText);

                // Refresh the page
                location.reload();
            }
        };
        xhttp.open("POST", "./functions.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("action=del&id=" + id);
    }
</script>


</html>