<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./styles/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

</head>

<?php include 'header.php'; ?>

<body>
    <main>
        <div class="form-container">
            <div class="form">
                <?php
                if (!isset ($_SESSION['admin'])) {
                    header('location: ./index.php');
                    exit();
                }

                if (isset ($_POST["add"])) {
                    $uploadResult = uploadnews($_FILES["image"], $_POST["title"], $_POST["description"], $_POST["date"]);
                    if ($uploadResult == "success") {
                        echo '<p class="success"> <i class="fas fa-check"></i> News updated successfully</p>';
                        $_POST = array_map('trim', $_POST);
                        $_POST['title'] = '';
                        $_POST['description'] = '';
                        $_POST['date'] = '';
                    } else {
                        echo '<p class="error"> <i class="fas fa-times"></i> ' . @$uploadResult . '</p>';
                    }
                }
                ?>
                <h2>CREATE NEW NEWS</h2>
                <form method="POST" autocomplete="off" enctype="multipart/form-data">
                    <label for="image">IMAGE</label>
                    <input type="file" name="image" id="image" accept="image/*" required><br>

                    <label for="title">TITLE</label>
                    <input class="title" type="text" name="title" id="title" value="<?php echo @$_POST['title']; ?>"
                        placeholder="Title of the News" required><br>

                    <label for="description">DESCRIPTION</label>
                    <textarea name="description" class="desc" id="description" placeholder="Description of the News"
                        required><?php echo @$_POST['description']; ?></textarea>

                    <label for="date">DATE</label>
                    <input type="date" name="date" id="date" class="date" value="<?php echo @$_POST['date']; ?>"
                        required><br>

                    <div class="sub">
                        <input class="submit" type="submit" value="Add" name="add">
                    </div>
                </form>
            </div>
        </div>

        <div class="display">
            <div class="news-container">
                <?php
                $news = getnews();
                echo $news;
                ?>
            </div>
        </div>
    </main>

</body>

</html>