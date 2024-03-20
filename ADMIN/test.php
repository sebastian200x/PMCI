<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Height</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        :root {
            --image-height: 30px;
            /* Default height for the image */
        }

        .image-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: var(--image-height);
            /* Use the custom property for image height */
            overflow: hidden;
            border: 1px solid #ccc;
        }

        img {
            max-width: 100%;
            height: auto;
            /* Maintain aspect ratio */
        }
    </style>
</head>

<body>
    <div class="image-container">
        <img src="./newspics/ojt.png" alt="Your Image">
    </div>
</body>

</html>