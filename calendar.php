<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.theme.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
</head>

<body>
    <input type="text" class="datepicker">


</body>

</html>

<script>
    //DATE PICKER
    var dd = new Date().getDate();
    var mm = new Date().getMonth();
    var yyyy = new Date().getFullYear();
    // var tommorrow = new Date().getDate() + 1;

    var holiday = [
        new Date(yyyy, 0, 1).getTime(),
        new Date(yyyy, 1, 16).getTime(),
        new Date(yyyy, 2, 30).getTime(),
        new Date(yyyy, 3, 11).getTime(),
        new Date(yyyy, 4, 1).getTime(),
        new Date(yyyy, 4, 10).getTime(),
        new Date(yyyy, 4, 29).getTime(),
        new Date(yyyy, 5, 1).getTime(),
        new Date(yyyy, 5, 15).getTime(),
        new Date(yyyy, 5, 16).getTime(),
        new Date(yyyy, 7, 17).getTime(),
        new Date(yyyy, 7, 22).getTime(),
        new Date(yyyy, 9, 11).getTime(),
        new Date(yyyy, 10, 20).getTime(),
        new Date(yyyy, 11, 25).getTime()
    ];

    $('.datepicker').datepicker({
        // Current date 
        minDate: new Date(yyyy, mm, dd + 1),
        beforeShowDay: function (date) {
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