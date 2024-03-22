<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./styles/enrollment.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENROLLMENT</title>
</head>

<body>
    <?php include 'header.php'; ?>

    <main>

        <h1 class="title">ENROLLMENT</h1>

        <div class="form-container">
            <div class="form-flex">
                <form action="">
                    <h1 class="h1">PERSONAL INFORMATION</h1>
                    <div class="block">
                        <label for="">NAME:</label>
                        <input type="text" name="" id=""><br>

                        <label for="">AGE:</label>
                        <input type="number" name="" id=""><br>
                    </div>
                    <div class="block">
                        <label for="">BIRTHDAY:</label>
                        <input type="date" name="" id=""><br>

                        <label for="">ADDRESS</label>
                        <input type="text" name="" id=""><br>
                    </div>
                    <div class="block">
                        <label for="">CONTACT NUMBER</label>
                        <input type="number" name="" id="">

                        <label for="">EMAIL</label>
                        <input type="email" name="" id="">
                    </div><br>

                    <H1 class="h1">ACADEMIC INFORMATION</H1>

                    <div class="block">
                        <label for="">YEAR LEVEL</label>
                        <select name="" id="">
                            <option value="" selected hidden>Choose Year Level</option>
                            <option value="">Kinder 1</option>
                            <option value="">Kinder 2</option>
                            <option value="">Grade 1</option>
                            <option value="">Grade 2</option>
                            <option value="">Grade 3</option>
                            <option value="">Grade 4</option>
                            <option value="">Grade 5</option>
                            <option value="">Grade 6</option>
                            <option value="">Grade 7</option>
                            <option value="">Grade 8</option>
                            <option value="">Grade 9</option>
                            <option value="">Grade 10</option>
                            <option value="">Grade 11</option>
                            <option value="">Grade 12</option>
                        </select>

                        <label for="">SCHOOL NAME <br>(If Transfer)</label>
                        <input type="text" name="" id="">


                    </div>

                    <div class="block">
                        <label for="">SCHOOL YEAR <br>(If Transfer)</label>
                        <input type="NUMBER" name="" id="" placeholder="eg. 2020-2021">

                        <label for="">REFERRAL NAME</label>
                        <input type="text">
                    </div><BR></BR>

                    <h1 class="h1">REQUIREMENTS</h1>
                    <div class="req">

                        <div class="check">
                            <label for="">2pcs 2x2 Picture</label>
                            <input type="checkbox" name="" id="">
                        </div>
                        <div class="check">
                            <label for="">Original Copy of PSA</label>
                            <input type="checkbox" name="" id="">
                        </div>
                        <div class="check">
                            <label for="">Good Moral</label>
                            <input type="checkbox" name="" id="">
                        </div>

                    </div>

                    <div class="req">

                        <div class="check">
                            <label for="">Report Card(From previous SY)</label>
                            <input type="checkbox" name="" id="">
                        </div>
                        <div class="check">
                            <label for="">ECD Checklist(Kinder)</label>
                            <input type="checkbox" name="" id="">
                        </div>
                        <div class="check">
                            <label for="">PHP 5,000(Reservation Fee)</label>
                            <input type="checkbox" name="" id="">
                        </div>
                    </div>

                    <br>

                    <h1 class="h1">APPOINTMENT CALENDAR</h1><br>

                    <div class="submit">
                        <input type="SUBMIT" name="" id="" value="SUBMIT">
                    </div>
                </form>
            </div>
        </div>

    </main>

    <?php include 'footer.php'; ?>
</body>

</html>