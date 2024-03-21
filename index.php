<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Study Buddy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="res/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <?php include 'inc/header.php'; ?>
    <div id="content">
        <?php

        if (isset ($_GET['action']) && !empty ($_GET['action'])) {
            switch ($_GET['action']) {
                case 'home':
                    include 'inc/home.php';
                    break;
                case 'faq':
                    include 'inc/faq.php';
                    break;
            }
        }

        ?>
    </div>
    <?php include 'inc/footer.php'; ?>
    <script src="res/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>