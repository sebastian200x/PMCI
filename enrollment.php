<!DOCTYPE html>
<html lang="en">

<head>


    <link rel="stylesheet" href="./styles/enrollment.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENROLLMENT</title>


    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.theme.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

</head>

<body>
    <?php
    include 'header.php';

    if (isset($_POST['enroll'])) {

        // form data
        $firstname = strtoupper($_POST['firstname']);
        $middlename = strtoupper($_POST['middlename']);
        $lastname = strtoupper($_POST['lastname']);

        $bday = $_POST['bday'];
        $age = calculateAgeFromBirthdate($bday);

        $address = strtoupper($_POST['address']);
        $contact = $_POST['contact'];

        $email = strtoupper($_POST['email']);
        $level = strtoupper($_POST['level']);
        $school = strtoupper($_POST['school']);
        $sy = strtoupper($_POST['sy']);
        $referral = strtoupper($_POST['referral']);

        // checkbox values
        $pic = isset($_POST['pic']) ? 1 : 0;
        $psa = isset($_POST['psa']) ? 1 : 0;
        $goodmoral = isset($_POST['goodmoral']) ? 1 : 0;
        $card = isset($_POST['card']) ? 1 : 0;
        $ecd = isset($_POST['ecd']) ? 1 : 0;
        $fee = isset($_POST['fee']) ? 1 : 0;

        // date formatting
        $appointdatenoformat = $_POST['appointdate'];
        $date_parts = explode('/', $appointdatenoformat);
        $appointdate = $date_parts[2] . '-' . $date_parts[0] . '-' . $date_parts[1];
        $appointtime = strtoupper($_POST['appointtime']);


        // Call the enrollment function
        $response = enrollment($firstname, $middlename, $lastname, $age, $bday, $address, $contact, $email, $level, $school, $sy, $referral, $pic, $psa, $goodmoral, $card, $ecd, $fee, $appointdate, $appointtime);

        if ($response == "success") {
            $_POST = array_map('trim', $_POST);
            $_POST['firstname'] = "";
            $_POST['middlename'] = "";
            $_POST['lastname'] = "";
            $_POST['age'] = "";
            $_POST['bday'] = "";
            $_POST['address'] = "";
            $_POST['contact'] = "";
            $_POST['email'] = "";
            $_POST['level'] = "";
            $_POST['school'] = "";
            $_POST['sy'] = "";
            $_POST['referral'] = "";
            $_POST['pic'] = "";
            $_POST['psa'] = "";
            $_POST['goodmoral'] = "";
            $_POST['card'] = "";
            $_POST['ecd'] = "";
            $_POST['fee'] = "";
            $_POST['appointdate'] = "";
            $_POST['appointtime'] = "";

            echo "<script>alert('Enrollment Successful!')</script>";
        } else {
            echo "<script>alert('" . $response . "')</script>";
        }
    }
    ?>

    <main>

        <h1 class="title">ENROLLMENT</h1>

        <div class="form-container">
            <div class="form-flex">
                <form action="" id="enrollmentForm" method="POST" autocomplete="off">


                    <h1 class="h1">STUDENT'S INFORMATION</h1>

                    <div class="row-custom">
                        <div class="column-custom">
                            <label for="firstname" class="label-custom">FIRST NAME:</label>
                            <input type="text" name="firstname" class="input-custom" id="firstname" placeholder="First Name" value="<?php echo @$_POST['firstname']; ?>" required>

                        </div>
                        <div class="column-custom">
                            <label for="middlename" class="label-custom">MIDDLE NAME:</label>
                            <input type="text" name="middlename" id="middlename" placeholder="Middle Name" value="<?php echo @$_POST['middlename']; ?>" class="input-custom" required>

                        </div>
                        <div class="column-custom">
                            <label for="lastname" class="label-custom">LAST NAME:</label>
                            <input type="text" name="lastname" id="lastname" placeholder="Last Name" value="<?php echo @$_POST['lastname']; ?>" class="input-custom" required>
                        </div>
                    </div>

                    <div class="half">
                        <div class="row">
                            <div class="col">
                                <label for="bday">BIRTHDAY:</label>
                                <input type="date" name="bday" id="bday" onchange="calculateAge()" value="<?php echo @$_POST['bday']; ?>" max="<?php echo date('Y-m-d'); ?>" required>
                            </div>
                            <div class="col">
                                <label for="age">AGE:</label>
                                <input type="text" name="age" id="age" title="Please select birth date" placeholder="Please select birth date" value="<?php echo @$_POST['age']; ?>" readonly><br>
                            </div>
                        </div>
                    </div>

                    <div class="full">

                        <label for="address">ADDRESS</label>
                        <input type="text" name="address" id="address" placeholder="Home Address" value="<?php echo @$_POST['address']; ?>" required><br>
                    </div>

                    <div class="half">
                        <div class="row">
                            <div class="col">
                                <label for="contact">CONTACT NUMBER</label>
                                <input type="number" id="contact" name="contact" placeholder="Enter phone number" value="<?php echo isset($_POST['contact']) ? htmlspecialchars($_POST['contact']) : '09'; ?>" min="09000000000" max="09999999999" oninput="contactnum(this)" pattern="09\d{9}" title="Please enter a valid phone number starting with 09 followed by 9 digits" required>
                            </div>

                            <div class="col">
                                <label for="email">EMAIL</label>
                                <input type="email" name="email" id="email" placeholder="E-Mail" value="<?php echo @$_POST['email']; ?> " required>
                            </div>
                        </div>
                    </div>

                    <H1 class="h1">ACADEMIC INFORMATION</H1>

                    <div class="half">
                        <div class="row">
                            <div class="col">
                                <label for="level">YEAR LEVEL</label>
                                <select name="level" id="level" required>

                                    <?php if (!isset($response) || empty($response)) : ?>
                                        <option value="" selected hidden>Choose Year Level</option>
                                    <?php else : ?>
                                        <option value="<?php echo @$_POST['level']; ?>" selected hidden>
                                            <?php echo @$_POST['level']; ?>
                                        </option>
                                    <?php endif; ?>

                                    <option value="Kinder 1">Kinder 1</option>
                                    <option value="Kinder 2">Kinder 2</option>
                                    <option value="Grade 1">Grade 1</option>
                                    <option value="Grade 2">Grade 2</option>
                                    <option value="Grade 3">Grade 3</option>
                                    <option value="Grade 4">Grade 4</option>
                                    <option value="Grade 5">Grade 5</option>
                                    <option value="Grade 6">Grade 6</option>
                                    <option value="Grade 7">Grade 7</option>
                                    <option value="Grade 8">Grade 8</option>
                                    <option value="Grade 9">Grade 9</option>
                                    <option value="Grade 10">Grade 10</option>
                                    <option value="Grade 11">Grade 11</option>
                                    <option value="Grade 12">Grade 12</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="school">SCHOOL NAME (If Transfer)</label>
                                <input type="text" name="school" id="school" placeholder="School Name (If transferee)" value="<?php echo isset($_POST['school']) ? htmlspecialchars($_POST['school']) : ''; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="half">
                        <div class="row">
                            <div class="col">
                                <label for="sy">SCHOOL YEAR (If Transfer)</label>
                                <input type="text" name="sy" id="sy" placeholder="eg. 2020-2021" pattern="\d{4}-\d{4}" title="Enter a valid school year in the format YYYY-YYYY" value="<?php echo isset($_POST['sy']) ? htmlspecialchars($_POST['sy']) : ''; ?>" maxlength="9" minlength="9" oninput="autoFillSchoolYear(this)">

                            </div>
                            <div class="col">
                                <label for="referral">REFERRAL NAME</label>
                                <input type="text" name="referral" id="referral" placeholder="Referral Name" value="<?php echo @$_POST['referral']; ?>" onchange="toggleSchoolYearRequired()">
                            </div>
                        </div>
                    </div>

                    <h1 class="h1">REQUIREMENTS</h1>
                    <div class="req">
                        <div class="check">
                            <label for="pic">2pcs 2x2 Picture</label>
                            <input type="checkbox" name="pic" id="pic" <?php echo @$_POST['pic'] ? 'checked' : ''; ?>>
                        </div>
                        <div class="check">
                            <label for="psa">Original Copy of PSA</label>
                            <input type="checkbox" name="psa" id="psa" <?php echo @$_POST['psa'] ? 'checked' : ''; ?>>
                        </div>
                        <div class="check">
                            <label for="goodmoral">Good Moral</label>
                            <input type="checkbox" name="goodmoral" id="goodmoral" <?php echo @$_POST['goodmoral'] ? 'checked' : ''; ?>>
                        </div>
                    </div>
                    <div class="req">
                        <div class="check">
                            <label for="card">Report Card(From previous SY)</label>
                            <input type="checkbox" name="card" id="card" <?php echo @$_POST['card'] ? 'checked' : ''; ?>>
                        </div>
                        <div class="check">
                            <label for="ecd">ECD Checklist(Kinder)</label>
                            <input type="checkbox" name="ecd" id="ecd" <?php echo @$_POST['ecd'] ? 'checked' : ''; ?>>
                        </div>
                        <div class="check">
                            <label for="fee">PHP 5,000(Reservation Fee)</label>
                            <input type="checkbox" name="fee" id="fee" <?php echo @$_POST['fee'] ? 'checked' : ''; ?>>
                        </div>
                    </div>

                    <br>

                    <h1 class="h1">APPOINTMENT CALENDAR</h1><br>


                    <div class="calendar">
                        <div class="date">
                            <label for="appointdate">DATE</label><br>
                            <input type="text" name="appointdate" id="appointdate" class="datepicker" value="<?php echo @$_POST['appointdate']; ?>" onchange="check()" required>

                        </div>

                        <div class="time">
                            <label for="appointtime">TIME</label><br>
                            <select name="appointtime" id="appointtime" required onchange="check()">
                                <?php if (!isset($response) || empty($response)) : ?>
                                    <option value="" hidden selected>Choose Appointment Time</option>
                                <?php else : ?>
                                    <option value="<?php echo @$_POST['appointtime']; ?>" hidden selected>
                                        <?php echo @$_POST['appointtime']; ?>
                                    </option>
                                <?php endif; ?>

                                <option value="8:00 AM - 9:30 AM">8:00 AM - 9:30 AM</option>
                                <option value="10:00 AM - 11:30 AM">10:00 AM - 11:30 AM</option>
                                <option value="1:00 PM - 2:30 PM">1:00 PM - 2:30 PM</option>
                                <option value="3:00 PM - 4:30 PM">3:00 PM - 4:30 PM</option>
                            </select>
                        </div>

                        <p class="avail" id="avail" style="display: none; width: 100%; text-align: center">Appointment
                            available!</p>
                        <p class="notavail" id="notavail" style="display: none; width: 100%; text-align: center">
                            Appointment not available. Please
                            choose another date or time.</p>
                        <p class="notavail" id="novalue" style="display: none; width: 100%; text-align: center">Date or
                            Time is required</p>

                    </div>
                    <div class="submit">
                        <input type="submit" name="enroll" class="enroll" id="enroll" style="display: none;" value="ENROLL">
                    </div>
                </form>
            </div>
        </div>

    </main>

    <?php include 'footer.php'; ?>
</body>
<script>
    function contactnum(input) {
        // Get the current value of the input field
        var value = input.value;

        // Check if the length of the value is greater than 11
        if (value.length > 11) {
            // If it is, truncate the value to 11 characters
            input.value = value.slice(0, 11);
        }

        // Check if the input value does not start with "09"
        if (!input.value.startsWith("09")) {
            input.value = "09" + input.value; // Add "09" to the beginning of the value
        }
    }

    function autoFillSchoolYear(input) {
        // Get the entered value
        let enteredValue = input.value;

        // Check if the entered value matches the pattern for a valid school year (YYYY-YYYY)
        let pattern = /^\d{4}$/;
        if (pattern.test(enteredValue)) {
            // Extract the first four digits and convert to a number
            let startYear = parseInt(enteredValue);

            // Calculate the end year by adding 1 to the start year
            let endYear = startYear + 1;

            // Update the input value with the formatted school year (YYYY-YYYY)
            input.value = startYear + '-' + endYear;
        }
    }


    function formatDateForSQL(dateString) {
        var parts = dateString.split('/');
        if (parts.length === 3) {
            var year = parts[2];
            var month = String(parts[0]).padStart(2, '0'); // Ensure 2 digits for month (zero-padded)
            var day = String(parts[1]).padStart(2, '0'); // Ensure 2 digits for day (zero-padded)
            return year + '-' + month + '-' + day;
        }
        return dateString; // Return original string if format is invalid
    }

    function check() {
        var date = document.getElementById("appointdate").value;
        var appointDate = formatDateForSQL(date);
        var appointTime = document.getElementById("appointtime").value;

        if (appointDate && appointTime) {
            $.ajax({
                url: './ADMIN/functions.php',
                type: 'POST',
                data: {
                    action: 'checkAppointment', // Ensure 'action' key is set
                    appointDate: appointDate,
                    appointTime: appointTime
                },

                success: function(response) {
                    console.log('Response from server:', response);
                    if (response === "true" || response === true) {
                        console.log('Appointment is available.');
                        document.getElementById("avail").style.display = "block";
                        document.getElementById("enroll").style.display = "block";
                        document.getElementById("notavail").style.display = "none";
                        document.getElementById("novalue").style.display = "none";
                    } else {
                        console.log('Appointment is unavailable.');
                        document.getElementById("notavail").style.display = "block";
                        document.getElementById("avail").style.display = "none";
                        document.getElementById("enroll").style.display = "none";
                        document.getElementById("novalue").style.display = "none";
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        } else {
            document.getElementById("novalue").style.display = "block";
            document.getElementById("notavail").style.display = "none";
            document.getElementById("avail").style.display = "none";
            document.getElementById("enroll").style.display = "none";
        }
    }



    function calculateAge() {
        var bday = document.getElementById("bday").value;
        var birthDate = new Date(bday);
        var today = new Date();
        var age = today.getFullYear() - birthDate.getFullYear();
        var month = today.getMonth() - birthDate.getMonth();
        if (month < 0 || (month === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }

        // Update the value of the readonly input field with id "age"
        document.getElementById("age").value = age;
    }

    //DATE PICKER
    var dd = new Date().getDate();
    var mm = new Date().getMonth();
    var yyyy = new Date().getFullYear();
    // var tommorrow = new Date().getDate() + 1;

    <?php
    $getholidays = getholidays();
    echo "var holiday = [\n\t" . $getholidays . "\n];";
    ?>

    $('.datepicker').datepicker({
        // Current date 
        minDate: new Date(yyyy, mm, dd + 1),
        beforeShowDay: function(date) {
            var showDay = true;

            // Disabler for weekends
            if (date.getDay() == 0 || date.getDay() == 6) {
                showDay = false;
            }
            // Disabler for holiday array
            if ($.inArray(date.getTime(), holiday) > -1) {
                showDay = false;
            }
            return [showDay];
        }
    });
</script>

</html>