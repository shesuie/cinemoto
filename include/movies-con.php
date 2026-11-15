<?php
require __DIR__ . '/bootstrap.php';

$conn = cinemoto_require_db();
$sql = "SELECT * FROM movies";
$result = $conn->query($sql);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINEMO'TO</title>
    <link rel="icon" href="/resources/images/film-reel.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="/resources/css/movies.css">
</head>

<body>
    <header>
        <div class="long">
            <span class="icon" id="menuIcon"><i class="bx bx-menu"></i></span>
            <div class="menu">
                <img src="/resources/images/film-reel.png" alt="logo">
                <a href="#" class="header_name">CINEMO'TO</a>
            </div>

            <div class="header__search" id="searchBox">
                <input type="search" placeholder="Search Movie" class="header__search" id="searchInput">
                <i class='bx bx-search' id="searchIcon"></i>
            </div>

            <div class="sign">
                <span class="header-name"><?php echo isset($_SESSION['name']) ? htmlspecialchars($_SESSION['name']) : ''; ?></span>
                <button id="signOutBtn" class="button-56" role="button" data-csrf="<?php echo cinemoto_h(cinemoto_csrf_token()); ?>">Sign Out</button>
            </div>
        </div>
    </header>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const signOutBtn = document.querySelector('#signOutBtn');

            // Event listener for Sign Out button
            signOutBtn.addEventListener('click', function() {
                var form = document.createElement('form');
                form.method = 'POST';
                form.action = '/pages/logout.php';
                var token = document.createElement('input');
                token.type = 'hidden';
                token.name = 'csrf';
                token.value = signOutBtn.getAttribute('data-csrf') || '';
                form.appendChild(token);
                document.body.appendChild(form);
                form.submit();
            });
        });
    </script>

    <div class="navbar" id="navbar">
        <nav class="nav-container">
            <div class="nav-logo">
                <span class="icon" id="closeIcon"><i class="bx bx-menu-alt-left"></i></span>
                <img src="/resources/images/film-reel.png" alt="logo">
                <a href="#" class="header_name">CINEMO'TO</a>
            </div>

            <div class="nav-list">
                <a href="/pages/index.php" class="nav-link">
                    <i class='bx bx-home nav-icon'></i>
                    <span class="nav-name">Home</span>
                </a>

                <a href="/pages/branch.php" class="nav-link">
                    <i class='bx bx-sitemap nav-icon'></i>
                    <span class="nav-name">Cinema Branches</span>
                </a>

                <a href="/pages/foodacc.php" class="nav-link">
                    <i class='bx bx-basket nav-icon'></i>
                    <span class="nav-name">Food</span>
                </a>

                <a href="/pages/contact.php" class="nav-link">
                    <i class='bx bx-phone nav-icon'></i>
                    <span class="nav-name">Contact Us</span>
                </a>
            </div>
        </nav>
    </div>