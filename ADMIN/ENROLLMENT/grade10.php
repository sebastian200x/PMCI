<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./styles.css">
    <script src="./script.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php include 'header.php'; ?>

<body>

    <main>

        <nav>
            <div class="navi">

                <a class="active" href="../enrollment.php">Enrollment</a>
                <a href="../holiday.php">Holiday</a>
            </div>
        </nav>

        <div class="enroll">

            <div class="grade">
                <a href="./kinder1.php">KINDER 1</a>
                <a href="./kinder2.php">KINDER 2</a>
                <a href="./grade1.php">GRADE 1</a>
                <a href="./grade2.php">GRADE 2</a>
                <a href="./grade3.php">GRADE 3</a>
                <a href="./grade4.php">GRADE 4</a>
                <a href="./grade5.php">GRADE 5</a>
                <a href="./grade6.php">GRADE 6</a>
                <a href="./grade7.php">GRADE 7</a>
                <a href="./grade8.php">GRADE 8</a>
                <a href="./grade9.php">GRADE 9</a>
                <a href="#" class="active">GRADE 10</a>
                <a href="./grade11.php">GRADE 11</a>
                <a href="./grade12.php">GRADE 12</a>
            </div>

            <?php
                        echo getenrollment('GRADE 10');
                        ?>
            </div>
        </div>

    </main>

</body>

</html>