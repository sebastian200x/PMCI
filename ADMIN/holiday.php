<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./styles/holiday.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CALENDAR EDITOR</title>
</head>
<?php include 'header.php'; ?>

<body>

    <main>
        <nav>
            <div class="navi">

                <a  href="./enrollment.php">Enrollment</a>
                <a class="active" href="./holiday.php">Holiday</a>
            </div>
        </nav>

        <div class="holiday">

            <div class="form">
                <div class="TAAS">
                    <h1>HOLIDAY EDITOR</h1>
                </div>
                <div class="buttonz">
                    <input style="background-color: rgb(47, 47, 228)" type="button" name="" id="" value="Add">
                    <input type="button" name="" id="" value="Save">
                    <input style="background-color: rgb(148, 148, 0)" type="button" name="" id="" value="load holidays">
                </div>
                <div class="table">
                    <table>
                        <tr>
                            <th>HOLIDAY</th>
                            <th>DATE</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td><input class="textbox" type="text"></td>
                            <td><input class="textbox1" type="date"></td>
                            <td><input class="del" type="button" name="" id="" value="delete"></td>
                        </tr>
                        <tr>
                            <td><input class="textbox" type="text"></td>
                            <td><input class="textbox1" type="date"></td>
                            <td><input class="del" type="button" name="" id="" value="delete"></td>
                        </tr>
                        <tr>
                            <td><input class="textbox" type="text"></td>
                            <td><input class="textbox1" type="date"></td>
                            <td><input class="del" type="button" name="" id="" value="delete"></td>
                        </tr>
                        <tr>
                            <td><input class="textbox" type="text"></td>
                            <td><input class="textbox1" type="date"></td>
                            <td><input class="del" type="button" name="" id="" value="delete"></td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </main>

</body>

</html>