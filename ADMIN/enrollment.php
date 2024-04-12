<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./styles/enrollment.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
include (__DIR__ . '/header.php');


if (!isset($_SESSION['admin'])) {
    header('location: ./index.php');
    exit();
}
?>

<body>

    <main>

        <nav>
            <div class="navi">

                <a class="active" href="./enrollment.php">Enrollment</a>
                <a href="./holiday.php">Holiday</a>
            </div>
        </nav>

        <div class="enroll">

            <div class="grade">
                <a href="./ENROLLMENT/kinder1.php">KINDER 1</a>
                <a href="./ENROLLMENT/kinder2.php">KINDER 2</a>
                <a href="./ENROLLMENT/grade1.php">GRADE 1</a>
                <a href="./ENROLLMENT/grade2.php">GRADE 2</a>
                <a href="./ENROLLMENT/grade3.php">GRADE 3</a>
                <a href="./ENROLLMENT/grade4.php">GRADE 4</a>
                <a href="./ENROLLMENT/grade5.php">GRADE 5</a>
                <a href="./ENROLLMENT/grade6.php">GRADE 6</a>
                <a href="./ENROLLMENT/grade7.php">GRADE 7</a>
                <a href="./ENROLLMENT/grade8.php">GRADE 8</a>
                <a href="./ENROLLMENT/grade9.php">GRADE 9</a>
                <a href="./ENROLLMENT/grade10.php">GRADE 10</a>
                <a href="./ENROLLMENT/grade11.php">GRADE 11</a>
                <a href="./ENROLLMENT/grade12.php">GRADE 12</a>
            </div>

            <div class="tbl">
                <p>Choose a grade level</p>
            </div>
        </div>

    </main>

</body>

</html>