<?php
session_start();



if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) {
    $user_id = $_SESSION['user_id'];
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CINEMO'TO</title>
        <link rel="icon" href="/resources/images/film-reel.png" type="image/x-icon" />
        <link rel="stylesheet" href="/resources/css/branch.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
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
                    <button id="signOutBtn" class="button-56" role="button">Sign Out</button>
                </div>
            </div>
        </header>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const signOutBtn = document.querySelector('#signOutBtn');

                // Event listener for Sign Out button
                signOutBtn.addEventListener('click', function() {
                    // Redirect to sign out action (logout)
                    window.location.href = 'logout.php';
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




        <section class="branch section">
            <h2 class="section__title-1">
                <span>Cinemas Branches</span>
            </h2>

            <div class="branch__container container grid">
                <article class="branch__card">
                    <div class="branch__image">
                        <img src="/resources/images/branch/VALENZUELA.png" alt="image" class="branch__img">

                        <a href="#" class="branch__button button">
                            <i class="ri-arrow-right-up-line"></i>
                        </a>
                    </div>

                    <div class="branch__content">
                        <h2 class="branch__title">Cinemo'to Valenzuela</h2>

                        <p class="branch__description">
                            MacArthur Highway, Brgy. Karuhatan, Valenzuela, Metro Manila
                        </p>
                    </div>

                </article>

                <article class="branch__card">
                    <div class="branch__image">
                        <img src="/resources/images/branch/ALABANG.png" alt="image" class="branch__img">

                        <a href="#" class="branch__button button">
                            <i class="ri-arrow-right-up-line"></i>
                        </a>
                    </div>

                    <div class="branch__content">
                        <h2 class="branch__title">Cinemo'to Alabang</h2>

                        <p class="branch__description">
                            Alabang–Zapote Rd, Almanza, Las Piñas, 1750 Metro Manila
                        </p>
                    </div>

                </article>

                <article class="branch__card">
                    <div class="branch__image">
                        <img src="/resources/images/branch/CALOOCAN.png" alt="image" class="branch__img">

                        <a href="#" class="branch__button button">
                            <i class="ri-arrow-right-up-line"></i>
                        </a>
                    </div>

                    <div class="branch__content">
                        <h2 class="branch__title">Cinemo'to Caloocan</h2>

                        <p class="branch__description">
                            Deparo Road, Barangay 171, Zone 15, District 1, Bagumbong 1421 Caloocan City, Metro Manila
                        </p>
                    </div>

                </article>

                <article class="branch__card">
                    <div class="branch__image">
                        <img src="/resources/images/branch/MAKATI.png" alt="image" class="branch__img">

                        <a href="#" class="branch__button button">
                            <i class="ri-arrow-right-up-line"></i>
                        </a>
                    </div>

                    <div class="branch__content">
                        <h2 class="branch__title">Cinemo'to Makati</h2>

                        <p class="branch__description">
                            Hotel Dr, East St, Ayala Center, Makati, 12242 Metro Manila
                        </p>
                    </div>

                </article>

                <article class="branch__card">
                    <div class="branch__image">
                        <img src="/resources/images/branch/MALABON.png" alt="image" class="branch__img">

                        <a href="#" class="branch__button button">
                            <i class="ri-arrow-right-up-line"></i>
                        </a>
                    </div>

                    <div class="branch__content">
                        <h2 class="branch__title">Cinemo'to Malabon</h2>

                        <p class="branch__description">
                            Gen. Borromeo St, Malabon, Metro Manila
                        </p>
                    </div>

                </article>

                <article class="branch__card">
                    <div class="branch__image">
                        <img src="/resources/images/branch/MARIKINA.png" alt="image" class="branch__img">

                        <a href="#" class="branch__button button">
                            <i class="ri-arrow-right-up-line"></i>
                        </a>
                    </div>

                    <div class="branch__content">
                        <h2 class="branch__title">Cinemo'to Marikina</h2>

                        <p class="branch__description">
                            SM Marikina, Marikina-Infanta Hwy, Marikina, 1801 Metro Manila</p>
                    </div>

                </article>
            </div>
        </section>


        <?php include('/xampp/htdocs/cinemamoto/include/foooter.php'); ?>

        <script src="/resources/js/script.js"></script>
    </body>

    </html>


<?php
} else {

?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CINEMO'TO</title>
        <link rel="icon" href="/resources/images/film-reel.png" type="image/x-icon" />
        <link rel="stylesheet" href="/resources/css/branch.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
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
                    <button id="signInBtn" class="button-56" role="button">Login</button>
                </div>
            </div>
        </header>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const signInBtn = document.querySelector('#signInBtn');

                // Event listener for Sign In button
                signInBtn.addEventListener('click', function() {
                    // Redirect to sign in page
                    window.location.href = 'login.php';
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





        <section class="branch section">
            <h2 class="section__title-1">
                <span>Cinemas Branches</span>
            </h2>

            <div class="branch__container container grid">
                <article class="branch__card">
                    <div class="branch__image">
                        <img src="/resources/images/branch/VALENZUELA.png" alt="image" class="branch__img">

                        <a href="#" class="branch__button button">
                            <i class="ri-arrow-right-up-line"></i>
                        </a>
                    </div>

                    <div class="branch__content">
                        <h2 class="branch__title">Cinemo'to Valenzuela</h2>

                        <p class="branch__description">
                            3/F SM Megamall Building, Edsa corner Julia Vargas Avenue, Ortigas, Mandaluyong
                        </p>
                    </div>

                </article>

                <article class="branch__card">
                    <div class="branch__image">
                        <img src="/resources/images/branch/ALABANG.png" alt="image" class="branch__img">

                        <a href="#" class="branch__button button">
                            <i class="ri-arrow-right-up-line"></i>
                        </a>
                    </div>

                    <div class="branch__content">
                        <h2 class="branch__title">Cinemo'to Alabang</h2>

                        <p class="branch__description">
                            3/F SM Megamall Building, Edsa corner Julia Vargas Avenue, Ortigas, Mandaluyong
                        </p>
                    </div>

                </article>

                <article class="branch__card">
                    <div class="branch__image">
                        <img src="/resources/images/branch/CALOOCAN.png" alt="image" class="branch__img">

                        <a href="#" class="branch__button button">
                            <i class="ri-arrow-right-up-line"></i>
                        </a>
                    </div>

                    <div class="branch__content">
                        <h2 class="branch__title">Cinemo'to Caloocan</h2>

                        <p class="branch__description">
                            3/F SM Megamall Building, Edsa corner Julia Vargas Avenue, Ortigas, Mandaluyong
                        </p>
                    </div>

                </article>

                <article class="branch__card">
                    <div class="branch__image">
                        <img src="/resources/images/branch/MAKATI.png" alt="image" class="branch__img">

                        <a href="#" class="branch__button button">
                            <i class="ri-arrow-right-up-line"></i>
                        </a>
                    </div>

                    <div class="branch__content">
                        <h2 class="branch__title">Cinemo'to Makati</h2>

                        <p class="branch__description">
                            3/F SM Megamall Building, Edsa corner Julia Vargas Avenue, Ortigas, Mandaluyong
                        </p>
                    </div>

                </article>

                <article class="branch__card">
                    <div class="branch__image">
                        <img src="/resources/images/branch/MALABON.png" alt="image" class="branch__img">

                        <a href="#" class="branch__button button">
                            <i class="ri-arrow-right-up-line"></i>
                        </a>
                    </div>

                    <div class="branch__content">
                        <h2 class="branch__title">Cinemo'to Malabon</h2>

                        <p class="branch__description">
                            3/F SM Megamall Building, Edsa corner Julia Vargas Avenue, Ortigas, Mandaluyong
                        </p>
                    </div>

                </article>

                <article class="branch__card">
                    <div class="branch__image">
                        <img src="/resources/images/branch/MARIKINA.png" alt="image" class="branch__img">

                        <a href="#" class="branch__button button">
                            <i class="ri-arrow-right-up-line"></i>
                        </a>
                    </div>

                    <div class="branch__content">
                        <h2 class="branch__title">Cinemo'to Marikina</h2>

                        <p class="branch__description">
                            3/F SM Megamall Building, Edsa corner Julia Vargas Avenue, Ortigas, Mandaluyong
                        </p>
                    </div>

                </article>
            </div>
        </section>



        <?php include('/xampp/htdocs/cinemamoto/include/foooter.php'); ?>

        <script src="/resources/js/script.js"></script>
    </body>

    </html>
<?php
}
?>