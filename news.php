<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./styles/news.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEWS</title>
</head>

<?php include 'header.php'; ?>
<body>


    <main>

        <div class="news-container">
            <h1 class="head">NEWS</h1>
            <?php
            $news = news();
            echo $news;
            ?>

        </div>


    </main>

    <?php include 'footer.php'; ?>

</body>

</html>