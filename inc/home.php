<?php

// Database connection
require 'config/dbaccess.php';
require 'config/session.php'; // Starts session

// Check if the user is logged in and set the user ID
if ($_SESSION['userrole'] == "guest" || $_SESSION['userrole'] == "admin") {
    $userId = $_SESSION['userId'];
    $isLoggedIn = true;
} else {
    $isLoggedIn = false;
}

// Fetch user profiles only if the user is logged in
$profiles = [];
if ($isLoggedIn) {
    $swipedProfiles = isset($_SESSION['swipedProfiles']) ? $_SESSION['swipedProfiles'] : [];
    $swipedProfilesList = implode(",", array_map('intval', $swipedProfiles));

    if (empty($swipedProfilesList)) {
        $sql = "SELECT userID, username, age, major, profiletext, picturepath FROM users WHERE userID != $userId";
    } else {
        $sql = "SELECT userID, username, age, major, profiletext, picturepath FROM users WHERE userID != $userId AND userID NOT IN ($swipedProfilesList)";
    }

    $result = $conn->query($sql); // conn is the variable from dbaccess

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $profiles[] = $row;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User Discovery</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <style>
        .swiper-container {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            width: 300px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            display: flex;
            flex-direction: column;
            flex-grow: 1;
            padding: 15px;
        }

        .card-text {
            flex-grow: 1;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
            background: #fff;
        }

        .btn {
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>

<body>
<?php if ($isLoggedIn) : ?>
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php foreach ($profiles as $profile) : ?>
                <div class="swiper-slide">
                    <div class="card">
                        <img src="res/img/<?php echo $profile['picturepath']; ?>" alt="Profile Picture">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $profile['username']; ?>
                                , <?php echo $profile['age']; ?></h5>
                            <p class="card-text">Major: <?php echo $profile['major']; ?></p>
                            <p class="card-text"><?php echo $profile['profiletext']; ?></p>
                            <div class="card-footer">
                                <button class="btn btn-primary swipe-button" data-id="<?php echo $profile['userID']; ?>">
                                    Send Like
                                </button>
                                <a href="index.php?page=reportuser&userid=<?php echo $profile['userID']; ?>" class="btn btn-danger">Report User</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
<?php else : ?>
    <div class="login-prompt">
        <h1>Welcome to <span class="studybuddy">StudyBuddy</span></h1>
        <p class="login-instruction">Please sign in to continue.</p>
    </div>
<?php endif; ?>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper('.swiper-container', {
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    document.querySelectorAll('.swipe-button').forEach(button => {
        button.addEventListener('click', function () {
            var profileId = this.dataset.id;
            fetch('inc/swipe.php', { // Adjust this path to the correct location
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    id: profileId
                }),
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        swiper.removeSlide(swiper.activeIndex);
                    }
                });
        });
    });
</script>
</body>

</html>
