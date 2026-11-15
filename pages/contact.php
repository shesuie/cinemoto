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
        <link rel="stylesheet" href="/resources/css/contact.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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



        <form class="my-form">
            <div class="form-container">
                <h1>CONTACT US</h1>
                <div class="left-side">
                    <li>
                        <select>
                            <option selected disabled>-- Select Branch --</option>
                            <option>Bataan</option>
                            <option>Caloocan</option>
                            <option>Manila</option>
                            <option>Ayala Mall</option>
                            <option>GreenHills</option>
                        </select>
                    </li>

                    <h1>CINEMO'TO BATAAN</h1>
                    <div class="info">
                        <h2>Address:</h2>
                        <p>2F Vista Mall Bataan, Roman Super Highway, Cupang Proper, Balanga City, Bataan</p>
                    </div>
                    <div class="info">
                        <h2>Telephone:</h2>
                        <p>Landline: (047) 633-4867 | Mobile: (+63) 946-5029107</p>
                    </div>

                    <div class="social-container">
                        <ul class="social-icons">
                            <li>
                                <a href="#">
                                    <i class='bx bxl-instagram'></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class='bx bxl-facebook'></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class='bx bxl-tiktok'></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class='bx bxl-twitter'></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <ul>
                    <li>
                        <div class="grid grid-2">
                            <input type="text" placeholder="Name" required>
                            <input type="text" placeholder="Subjext" required>
                        </div>
                    </li>
                    <li>
                        <div class="grid grid-2">
                            <input type="email" placeholder="Email" required>
                            <input type="tel" placeholder="Phone">
                        </div>
                    </li>
                    <li>
                        <textarea placeholder="Message"></textarea>
                    </li>

                    <li>
                        <div class="grid grid-3">
                            <button class="btn-grid" type="submit" disabled>
                                <span class="front">SUBMIT</span>
                            </button>
                            <button class="btn-grid" type="reset" disabled>
                                <span class="front">RESET</span>
                            </button>
                        </div>
                    </li>
                </ul>
            </div>
        </form>

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
        <link rel="stylesheet" href="/resources/css/contact.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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




        <form class="my-form">
            <div class="form-container">
                <h1>CONTACT US</h1>
                <div class="left-side">
                    <li>
                        <select>
                            <option selected disabled>-- Select Branch --</option>
                            <option>Bataan</option>
                            <option>Caloocan</option>
                            <option>Manila</option>
                            <option>Ayala Mall</option>
                            <option>GreenHills</option>
                        </select>
                    </li>

                    <h1>CINEMO'TO BATAAN</h1>
                    <div class="info">
                        <h2>Address:</h2>
                        <p>2F Vista Mall Bataan, Roman Super Highway, Cupang Proper, Balanga City, Bataan</p>
                    </div>
                    <div class="info">
                        <h2>Telephone:</h2>
                        <p>Landline: (047) 633-4867 | Mobile: (+63) 946-5029107</p>
                    </div>

                    <div class="social-container">
                        <ul class="social-icons">
                            <li>
                                <a href="#">
                                    <i class='bx bxl-instagram'></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class='bx bxl-facebook'></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class='bx bxl-tiktok'></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class='bx bxl-twitter'></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <ul>
                    <li>
                        <div class="grid grid-2">
                            <input type="text" placeholder="Name" required>
                            <input type="text" placeholder="Subjext" required>
                        </div>
                    </li>
                    <li>
                        <div class="grid grid-2">
                            <input type="email" placeholder="Email" required>
                            <input type="tel" placeholder="Phone">
                        </div>
                    </li>
                    <li>
                        <textarea placeholder="Message"></textarea>
                    </li>

                    <li>
                        <div class="grid grid-3">
                            <button class="btn-grid" type="submit" disabled>
                                <span class="front">SUBMIT</span>
                            </button>
                            <button class="btn-grid" type="reset" disabled>
                                <span class="front">RESET</span>
                            </button>
                        </div>
                    </li>
                </ul>
            </div>
        </form>

        <?php include('/xampp/htdocs/cinemamoto/include/foooter.php'); ?>


        <script src="/resources/js/script.js"></script>
    </body>

    </html>
<?php
}
?>