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
                    $uploadResult = uploadImage($_FILES["image"], $_POST["title"], $_POST["description"], $_POST["date"]);
                    if ($uploadResult == "success") {
                        echo '<p class="success"> <i class="fas fa-check"></i> News updated successfully</p>';
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

                <!-- <div class="news">
                    <div class="del">
                        <input class="editbtn fa" type="button" name="" id="" value="&#xf044; Edit">
                        <input class="delbtn fa" type="button" name="" id="" value="&#xf1f8; Delete">

                    </div>
                    <div class="news-img">
                        <img src="../styles/images/2.png" alt="">
                    </div>
                    <div class="details">
                        <h1>CHAMPION ATA TO</h1>
                        <H3>[November 24, 2023]</H3> <br>
                        <p>Gathering together to commemorate the initiation of fresh chapters and the reminiscence of
                            meaningful moments during the Girl Scout Investiture ceremony. This is an occasion where the
                            values of bravery, self-assurance, and integrity come together to shape a profound sense of
                            unity. The event serves as a testament to the enduring spirit of the Girl Scouts, fostering
                            a
                            space where young minds embark on exciting journeys filled with exploration and growth.
                            Through
                            this celebration, we honor the past while embracing the excitement of the unknown, carrying
                            forward the legacy of Girl Scouts into promising new adventures ahead.</p>
                    </div>

                </div> -->
            </div>
        </div>
    </main>

</body>

</html>



<div class="modal-backdrop fade show" id="modal_backdrop" style="display:none;"></div>

<script>

    var table = new JSTable("#customer_table", {
        serverSide: true,
        deferLoading: <?php echo count_all_data($connect); ?>,
        ajax: "fetch.php"
    });

    function _(element) {
        return document.getElementById(element);
    }

    function open_modal() {
        _('modal_backdrop').style.display = 'block';
        _('customer_modal').style.display = 'block';
        _('customer_modal').classList.add('show');
    }

    function close_modal() {
        _('modal_backdrop').style.display = 'none';
        _('customer_modal').style.display = 'none';
        _('customer_modal').classList.remove('show');
    }

    function reset_data() {
        _('customer_form').reset();
        _('action').value = 'Add';
        _('first_name_error').innerHTML = '';
        _('last_name_error').innerHTML = '';
        _('customer_email_error').innerHTML = '';
        _('modal_title').innerHTML = 'Add Data';
        _('action_button').innerHTML = 'Add';
    }

    _('add_data').onclick = function () {
        open_modal();
        reset_data();
    }

    _('close_modal').onclick = function () {
        close_modal();
    }

    _('action_button').onclick = function () {

        var form_data = new FormData(_('customer_form'));

        _('action_button').disabled = true;

        fetch('action.php', {

            method: "POST",

            body: form_data

        }).then(function (response) {

            return response.json();

        }).then(function (responseData) {

            _('action_button').disabled = false;

            if (responseData.success) {
                _('success_message').innerHTML = responseData.success;

                close_modal();

                table.update();
            }
            else {
                if (responseData.first_name_error) {
                    _('first_name_error').innerHTML = responseData.first_name_error;
                }
                else {
                    _('first_name_error').innerHTML = '';
                }

                if (responseData.last_name_error) {
                    _('last_name_error').innerHTML = responseData.last_name_error;
                }
                else {
                    _('last_name_error').innerHTML = '';
                }

                if (responseData.customer_email_error) {
                    _('customer_email_error').innerHTML = responseData.customer_email_error;
                }
                else {
                    _('customer_email_error').innerHTML = '';
                }
            }

        });

    }

    function fetch_data(id) {
        var form_data = new FormData();

        form_data.append('id', id);

        form_data.append('action', 'fetch');

        fetch('action.php', {

            method: "POST",

            body: form_data

        }).then(function (response) {

            return response.json();

        }).then(function (responseData) {

            _('first_name').value = responseData.first_name;

            _('last_name').value = responseData.last_name;

            _('customer_email').value = responseData.customer_email;

            _('customer_gender').value = responseData.customer_gender;

            _('customer_id').value = id;

            _('action').value = 'Update';

            _('modal_title').innerHTML = 'Edit Data';

            _('action_button').innerHTML = 'Edit';

            open_modal();

        });
    }

    function delete_data(id) {
        if (confirm("Are you sure you want to remove it?")) {
            var form_data = new FormData();

            form_data.append('id', id);

            form_data.append('action', 'delete');

            fetch('action.php', {

                method: "POST",

                body: form_data

            }).then(function (response) {

                return response.json();

            }).then(function (responseData) {

                _('success_message').innerHTML = responseData.success;

                table.update();

            });
        }
    }

</script>