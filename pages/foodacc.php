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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
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

                <div class="food-cart">
                    <a href="cartpage.php">
                        <i class='bx bx-cart'></i>
                        <span class="cart__count">0</span>
                    </a>
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

        <?php include('/xampp/htdocs/cinemamoto/include/navbar.php'); ?>





        <div class="wrap">
            <div class="title-flex">
                <h1>Food & Beverages</h1>
            </div>

            <div class="choices">
                <span class="snacks active" onclick="showContent('snacks')">Snacks</span>
                <span class="drinks" onclick="showContent('drinks')">Drinks</span>
                <span class="combos" onclick="showContent('combos')">Combo</span>
            </div>

            <script>
                $(document).ready(function() {
                    // Ensure only digits are allowed in input
                    $('.input-qty').on('input', function() {
                        $(this).val($(this).val().replace(/\D/, ''));
                    });

                    // Increment button click
                    $(document).on('click', '.incrementbtn', function(e) {
                        e.preventDefault();
                        var qty = $(this).closest('.box').find('.input-qty');
                        var value = parseInt(qty.val(), 10);
                        value = isNaN(value) ? 0 : value;
                        value++;
                        qty.val(value);
                    });

                    // Decrement button click
                    $(document).on('click', '.decrementbtn', function(e) {
                        e.preventDefault();
                        var qty = $(this).closest('.box').find('.input-qty');
                        var value = parseInt(qty.val(), 10);
                        value = isNaN(value) ? 0 : value;
                        if (value > 1) {
                            value--;
                            qty.val(value);
                        }
                    });

                    // Ensure minimum value is 1
                    $('.input-qty').on('change', function() {
                        var value = $(this).val();
                        if (value <= 0) {
                            $(this).val(1);
                        }
                    });
                });
            </script>

            <div class="choice-snacks">
                <div class="box-row">
                    <div class="box">
                        <div class="box-top">
                            <img class="box-image" src="/resources/images/food/snakcs/BURGER.png" alt="Girl Eating Pizza">
                            <div class="title-flex">
                                <h3 class="box-title">Burger</h3>
                            </div>
                        </div>
                        <h1 class="food-price">₱ 115.00</h1>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="input-group-text decrementbtn"><strong>-</strong></button>
                            </div>
                            <input type="text" class="form-control text-center input-qty" value="1">
                            <div class="input-group-append">
                                <button class="input-group-text incrementbtn"><strong>+</strong></button>
                            </div>
                        </div>
                        <a href="#" class="button1">Buy</a>
                    </div>



                    <div class="box">
                        <div class="box-top">
                            <img class="box-image" src="/resources/images/food/snakcs/CORNDOG.png" alt="Girl Eating Pizza">
                            <div class="title-flex">
                                <h3 class="box-title">Corn Dog</h3>
                            </div>
                        </div>
                        <h1 class="food-price">₱ 95.00</h1>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="input-group-text decrementbtn"><strong>-</strong></button>
                            </div>
                            <input type="text" class="form-control text-center input-qty" value="1">
                            <div class="input-group-append">
                                <button class="input-group-text incrementbtn"><strong>+</strong></button>
                            </div>
                        </div>
                        <a href="#" class="button1">Buy</a>
                    </div>

                    <div class="box">
                        <div class="box-top">
                            <img class="box-image" src="/resources/images/food/snakcs/popcorn.png" alt="Girl Eating Pizza">
                            <div class="title-flex">
                                <h3 class="box-title">Pop Corn</h3>
                            </div>
                        </div>
                        <h1 class="food-price">₱ 175.00</h1>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="input-group-text decrementbtn"><strong>-</strong></button>
                            </div>
                            <input type="text" class="form-control text-center input-qty" value="1">
                            <div class="input-group-append">
                                <button class="input-group-text incrementbtn"><strong>+</strong></button>
                            </div>
                        </div>
                        <a href="#" class="button1">Buy</a>
                    </div>
                </div>


                <div class="box-row">
                    <div class="box">
                        <div class="box-top">
                            <img class="box-image" src="/resources/images/food/snakcs/DONUT.png" alt="Girl Eating Pizza">
                            <div class="title-flex">
                                <h3 class="box-title">Donut</h3>
                            </div>
                        </div>
                        <h1 class="food-price">₱ 75.00</h1>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="input-group-text decrementbtn"><strong>-</strong></button>
                            </div>
                            <input type="text" class="form-control text-center input-qty" value="1">
                            <div class="input-group-append">
                                <button class="input-group-text incrementbtn"><strong>+</strong></button>
                            </div>
                        </div>
                        <a href="#" class="button1">Buy</a>
                    </div>

                    <div class="box">
                        <div class="box-top">
                            <img class="box-image" src="/resources/images/food/snakcs/NACHOS.png" alt="Girl Eating Pizza">
                            <div class="title-flex">
                                <h3 class="box-title">Nachos w/dip</h3>
                            </div>
                        </div>
                        <h1 class="food-price">₱ 120.00</h1>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="input-group-text decrementbtn"><strong>-</strong></button>
                            </div>
                            <input type="text" class="form-control text-center input-qty" value="1">
                            <div class="input-group-append">
                                <button class="input-group-text incrementbtn"><strong>+</strong></button>
                            </div>
                        </div>
                        <a href="#" class="button1">Buy</a>
                    </div>


                    <div class="box">
                        <div class="box-top">
                            <img class="box-image" src="/resources/images/food/snakcs/PIZZA.png" alt="Girl Eating Pizza">
                            <div class="title-flex">
                                <h3 class="box-title">Pizza</h3>
                            </div>
                        </div>
                        <h1 class="food-price">₱ 100.00</h1>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="input-group-text decrementbtn"><strong>-</strong></button>
                            </div>
                            <input type="text" class="form-control text-center input-qty" value="1">
                            <div class="input-group-append">
                                <button class="input-group-text incrementbtn"><strong>+</strong></button>
                            </div>
                        </div>
                        <a href="#" class="button1">Buy</a>
                    </div>
                </div>
            </div>


            <div class="choice-drinks" style="display: none;">
                <div class="box-row">
                    <div class="box">
                        <div class="box-top">
                            <img class="box-image" src="/resources/images/food/drinks/COKE.png" alt="Girl Eating Pizza">
                            <div class="title-flex">
                                <h3 class="box-title">Coca Cola</h3>
                            </div>
                        </div>
                        <h1 class="food-price">₱ 50.00</h1>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="input-group-text decrementbtn"><strong>-</strong></button>
                            </div>
                            <input type="text" class="form-control text-center input-qty" value="1">
                            <div class="input-group-append">
                                <button class="input-group-text incrementbtn"><strong>+</strong></button>
                            </div>
                        </div>
                        <a href="#" class="button1">Buy</a>
                    </div>



                    <div class="box">
                        <div class="box-top">
                            <img class="box-image" src="/resources/images/food/drinks/PEPSI.png" alt="Girl Eating Pizza">
                            <div class="title-flex">
                                <h3 class="box-title">Pepsi</h3>
                            </div>
                        </div>
                        <h1 class="food-price">₱ 50.00</h1>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="input-group-text decrementbtn"><strong>-</strong></button>
                            </div>
                            <input type="text" class="form-control text-center input-qty" value="1">
                            <div class="input-group-append">
                                <button class="input-group-text incrementbtn"><strong>+</strong></button>
                            </div>
                        </div>
                        <a href="#" class="button1">Buy</a>
                    </div>

                    <div class="box">
                        <div class="box-top">
                            <img class="box-image" src="/resources/images/food/drinks/ROYAL.png" alt="Girl Eating Pizza">
                            <div class="title-flex">
                                <h3 class="box-title">Royal</h3>
                            </div>
                        </div>
                        <h1 class="food-price">₱ 50.00</h1>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="input-group-text decrementbtn"><strong>-</strong></button>
                            </div>
                            <input type="text" class="form-control text-center input-qty" value="1">
                            <div class="input-group-append">
                                <button class="input-group-text incrementbtn"><strong>+</strong></button>
                            </div>
                        </div>
                        <a href="#" class="button1">Buy</a>
                    </div>
                </div>

                <div class="box-row">
                    <div class="box">
                        <div class="box-top">
                            <img class="box-image" src="/resources/images/food/drinks/ROOT BEER.png" alt="Girl Eating Pizza">
                            <div class="title-flex">
                                <h3 class="box-title">Root Beer</h3>
                            </div>
                        </div>
                        <h1 class="food-price">₱ 50.00</h1>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="input-group-text decrementbtn"><strong>-</strong></button>
                            </div>
                            <input type="text" class="form-control text-center input-qty" value="1">
                            <div class="input-group-append">
                                <button class="input-group-text incrementbtn"><strong>+</strong></button>
                            </div>
                        </div>
                        <a href="#" class="button1">Buy</a>
                    </div>

                    <div class="box">
                        <div class="box-top">
                            <img class="box-image" src="/resources/images/food/drinks/SPRITE.png" alt="Girl Eating Pizza">
                            <div class="title-flex">
                                <h3 class="box-title">Sprite</h3>
                            </div>
                        </div>
                        <h1 class="food-price">₱ 50.00</h1>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="input-group-text decrementbtn"><strong>-</strong></button>
                            </div>
                            <input type="text" class="form-control text-center input-qty" value="1">
                            <div class="input-group-append">
                                <button class="input-group-text incrementbtn"><strong>+</strong></button>
                            </div>
                        </div>
                        <a href="#" class="button1">Buy</a>
                    </div>


                    <div class="box">
                        <div class="box-top">
                            <img class="box-image" src="/resources/images/food/drinks/WATER.png" alt="Girl Eating Pizza">
                            <div class="title-flex">
                                <h3 class="box-title">Water</h3>
                            </div>
                        </div>
                        <h1 class="food-price">₱ 30.00</h1>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="input-group-text decrementbtn"><strong>-</strong></button>
                            </div>
                            <input type="text" class="form-control text-center input-qty" value="1">
                            <div class="input-group-append">
                                <button class="input-group-text incrementbtn"><strong>+</strong></button>
                            </div>
                        </div>
                        <a href="#" class="button1">Buy</a>
                    </div>
                </div>
            </div>


            <div class="choice-combos" style="display: none;">
                <div class="box-row">
                    <div class="box">
                        <div class="box-top">
                            <img class="box-image" src="/resources/images/food/combo/BURGER AND NUGGETS.png" alt="Girl Eating Pizza">
                            <div class="title-flex">
                                <h3 class="box-title">Burger & Nuggets</h3>
                            </div>
                        </div>
                        <h1 class="food-price">₱ 50.00</h1>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="input-group-text decrementbtn"><strong>-</strong></button>
                            </div>
                            <input type="text" class="form-control text-center input-qty" value="1">
                            <div class="input-group-append">
                                <button class="input-group-text incrementbtn"><strong>+</strong></button>
                            </div>
                        </div>
                        <a href="#" class="button1">Buy</a>
                    </div>

                    <div class="box">
                        <div class="box-top">
                            <img class="box-image" src="/resources/images/food/combo/COKE copy.png" alt="Girl Eating Pizza">
                            <div class="title-flex">
                                <h3 class="box-title">Burger & Pizza w/Drinks</h3>
                            </div>
                        </div>
                        <h1 class="food-price">₱ 345.00</h1>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="input-group-text decrementbtn"><strong>-</strong></button>
                            </div>
                            <input type="text" class="form-control text-center input-qty" value="1">
                            <div class="input-group-append">
                                <button class="input-group-text incrementbtn"><strong>+</strong></button>
                            </div>
                        </div>
                        <a href="#" class="button1">Buy</a>
                    </div>



                    <div class="box">
                        <div class="box-top">
                            <img class="box-image" src="/resources/images/food/combo/NUGGETS AND CORNDOG with drinks.png" alt="Girl Eating Pizza">
                            <div class="title-flex">
                                <h3 class="box-title">Burger & Nachos w/Drinks</h3>
                            </div>
                        </div>
                        <h1 class="food-price">₱ 260.00</h1>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="input-group-text decrementbtn"><strong>-</strong></button>
                            </div>
                            <input type="text" class="form-control text-center input-qty" value="1">
                            <div class="input-group-append">
                                <button class="input-group-text incrementbtn"><strong>+</strong></button>
                            </div>
                        </div>
                        <a href="#" class="button1">Buy</a>
                    </div>
                </div>

                <div class="box-row">
                    <div class="box">
                        <div class="box-top">
                            <img class="box-image" src="/resources/images/food/combo/NUGGETS AND CORNDOG.png" alt="Girl Eating Pizza">
                            <div class="title-flex">
                                <h3 class="box-title">Nuggets & Corn Dog</h3>
                            </div>
                        </div>
                        <h1 class="food-price">₱ 200.00</h1>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="input-group-text decrementbtn"><strong>-</strong></button>
                            </div>
                            <input type="text" class="form-control text-center input-qty" value="1">
                            <div class="input-group-append">
                                <button class="input-group-text incrementbtn"><strong>+</strong></button>
                            </div>
                        </div>
                        <a href="#" class="button1">Buy</a>
                    </div>

                    <div class="box">
                        <div class="box-top">
                            <img class="box-image" src="/resources/images/food/combo/PIZZA AND NACHOS with drinks.png" alt="Girl Eating Pizza">
                            <div class="title-flex">
                                <h3 class="box-title">Nuggets & Corn Dog w/Drinks</h3>
                            </div>
                        </div>
                        <h1 class="food-price">₱ 240.00</h1>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="input-group-text decrementbtn"><strong>-</strong></button>
                            </div>
                            <input type="text" class="form-control text-center input-qty" value="1">
                            <div class="input-group-append">
                                <button class="input-group-text incrementbtn"><strong>+</strong></button>
                            </div>
                        </div>
                        <a href="#" class="button1">Buy</a>
                    </div>





                    <div class="box">
                        <div class="box-top">
                            <img class="box-image" src="/resources/images/food/combo/PIZZA AND NACHOS.png" alt="Girl Eating Pizza">
                            <div class="title-flex">
                                <h3 class="box-title">Pizza & Nachos</h3>
                            </div>
                        </div>
                        <h1 class="food-price">₱ 200.00</h1>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="input-group-text decrementbtn"><strong>-</strong></button>
                            </div>
                            <input type="text" class="form-control text-center input-qty" value="1">
                            <div class="input-group-append">
                                <button class="input-group-text incrementbtn"><strong>+</strong></button>
                            </div>
                        </div>
                        <a href="#" class="button1">Buy</a>
                    </div>
                </div>

            </div>


        </div>

        <script>
            function showContent(choice) {
                document.querySelectorAll('.choice-snacks, .choice-drinks, .choice-combos').forEach(function(el) {
                    el.style.display = 'none';
                });


                document.querySelectorAll('.choices span').forEach(function(el) {
                    el.classList.remove('active');
                });


                document.querySelector('.choice-' + choice).style.display = 'block';


                document.querySelector('.' + choice).classList.add('active');
            }
        </script>








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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
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

                <div class="food-cart">
                    <i class='bx bx-cart'></i>
                    <span class="cart__count">0</span>
                </div>


                <div class="sign">
                    <button id="signInBtn" class="button-56" role="button">Login</button>
                </div>
            </div>
        </header>


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


        <div class="modal" id="signInModal">
            <div class="modal-content">
                <span class="close" id="closeModal">&times;</span>
                <div class="form-container">
                    <div class="forms">
                        <!-- Login Form -->
                        <div class="form login">
                            <span class="title">Login</span>
                            <?php if (isset($_GET['error'])) { ?>
                                <p class="error"><?php echo $_GET['error']; ?></p>
                            <?php } ?>
                            <form action="login-conn.php" method="post">
                                <div class="input-field">
                                    <input type="email" name="email" placeholder="Enter your email" required>
                                    <i class="uil uil-envelope icon"></i>
                                </div>
                                <div class="input-field">
                                    <input type="password" name="password" class="password" placeholder="Enter your password" required>
                                    <i class="uil uil-lock icon"></i>
                                </div>
                                <div class="checkbox-text">
                                    <div class="checkbox-content">
                                        <input type="checkbox" id="logCheck">
                                        <label for="logCheck" class="text">Remember me</label>
                                    </div>
                                    <a href="#" class="text">Forgot password?</a>
                                </div>
                                <div class="input-field button">
                                    <input type="submit" value="Login">
                                </div>
                            </form>
                            <div class="login-signup">
                                <span class="text">Not a member?
                                    <a href="#" class="signup-link">Signup Now</a>
                                </span>
                            </div>
                        </div>

                        <!-- Registration Form -->
                        <div class="form signup">
                            <span class="title">Sign up</span>
                            <?php if (isset($_GET['reg_error'])) { ?>
                                <p class="error"><?php echo $_GET['reg_error']; ?></p>
                            <?php } ?>
                            <?php if (isset($_GET['reg_success'])) { ?>
                                <p class="success"><?php echo $_GET['reg_success']; ?></p>
                            <?php } ?>
                            <form action="registration-conn.php" method="post">
                                <div class="input-field">
                                    <input type="text" name="name" placeholder="Enter your name" required>
                                    <i class="uil uil-user icon"></i>
                                </div>
                                <div class="input-field">
                                    <input type="tel" name="phone" placeholder="Enter your phone number" required>
                                    <i class="uil uil-phone icon"></i>
                                </div>
                                <div class="input-field">
                                    <input type="email" name="email" placeholder="Enter your email" required>
                                    <i class="uil uil-envelope icon"></i>
                                </div>
                                <div class="input-field">
                                    <input type="password" name="password" class="password" placeholder="Create a password" required>
                                    <i class="uil uil-lock icon"></i>
                                    <i class="uil uil-eye-slash showHidePw"></i>
                                </div>
                                <div class="input-field">
                                    <input type="password" name="confirm_password" class="password" placeholder="Confirm a password" required>
                                    <i class="uil uil-lock icon"></i>
                                    <i class="uil uil-eye-slash showHidePw"></i>
                                </div>
                                <div class="input-field">
                                    <select name="gender" required>
                                        <option value="" disabled selected>Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                    <i class="uil uil-genderless icon"></i>
                                </div>
                                <div class="input-field button">
                                    <input type="submit" value="Signup">
                                </div>
                            </form>
                            <div class="login-signup">
                                <span class="text">Already a member?
                                    <a href="#" class="login-link">Login Now</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const signInBtn = document.querySelector('#signInBtn');
                const signInModal = document.querySelector('#signInModal');
                const closeModal = document.querySelector('#closeModal');

                signInBtn.addEventListener('click', function() {
                    signInModal.classList.add('show');
                    signInModal.classList.remove('hide');
                });

                closeModal.addEventListener('click', function() {
                    signInModal.classList.remove('show');
                    signInModal.classList.add('hide');
                });

                window.addEventListener('click', function(event) {
                    if (event.target === signInModal) {
                        signInModal.classList.remove('show');
                        signInModal.classList.add('hide');
                    }
                });
            });

            // Expose the showModal function to the global scope for the ticket button
            window.showModal = function() {
                signInModal.classList.add('show');
                signInModal.classList.remove('hide');
            };

            const formContainer = document.querySelector('.form-container');
            const signupLink = document.querySelector('.signup-link');
            const loginLink = document.querySelector('.login-link');

            signupLink.addEventListener('click', () => {
                formContainer.classList.add('active');
            });

            loginLink.addEventListener('click', () => {
                formContainer.classList.remove('active');
            });

            // Show/Hide password functionality
            const showHidePw = document.querySelectorAll('.showHidePw');
            const pwFields = document.querySelectorAll('.password');

            showHidePw.forEach(eyeIcon => {
                eyeIcon.addEventListener('click', () => {
                    pwFields.forEach(pwField => {
                        if (pwField.type === "password") {
                            pwField.type = "text";
                            eyeIcon.classList.replace("uil-eye-slash", "uil-eye");
                        } else {
                            pwField.type = "password";
                            eyeIcon.classList.replace("uil-eye", "uil-eye-slash");
                        }
                    })
                })
            });
        </script>















        <div class="wrap">
            <div class="title-flex">
                <h1>Food & Beverages</h1>
            </div>

            <div class="choices">
                <span class="snacks active" onclick="showContent('snacks')">Snacks</span>
                <span class="drinks" onclick="showContent('drinks')">Drinks</span>
                <span class="combos" onclick="showContent('combos')">Combo</span>
            </div>

            <script>
                $(document).ready(function() {
                    // Ensure only digits are allowed in input
                    $('.input-qty').on('input', function() {
                        $(this).val($(this).val().replace(/\D/, ''));
                    });

                    // Increment button click
                    $(document).on('click', '.incrementbtn', function(e) {
                        e.preventDefault();
                        var qty = $(this).closest('.box').find('.input-qty');
                        var value = parseInt(qty.val(), 10);
                        value = isNaN(value) ? 0 : value;
                        value++;
                        qty.val(value);
                    });

                    // Decrement button click
                    $(document).on('click', '.decrementbtn', function(e) {
                        e.preventDefault();
                        var qty = $(this).closest('.box').find('.input-qty');
                        var value = parseInt(qty.val(), 10);
                        value = isNaN(value) ? 0 : value;
                        if (value > 1) {
                            value--;
                            qty.val(value);
                        }
                    });

                    // Ensure minimum value is 1
                    $('.input-qty').on('change', function() {
                        var value = $(this).val();
                        if (value <= 0) {
                            $(this).val(1);
                        }
                    });
                });
            </script>


            <div class="choice-snacks">
                <div class="box-row">
                    <div class="box">
                        <div class="box-top">
                            <img class="box-image" src="/resources/images/food/snakcs/BURGER.png" alt="Girl Eating Pizza">
                            <div class="title-flex">
                                <h3 class="box-title">Burger</h3>
                            </div>
                        </div>
                        <h1 class="food-price">₱ 115.00</h1>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="input-group-text decrementbtn"><strong>-</strong></button>
                            </div>
                            <input type="text" class="form-control text-center input-qty" value="1">
                            <div class="input-group-append">
                                <button class="input-group-text incrementbtn"><strong>+</strong></button>
                            </div>
                        </div>
                        <a href="#" class="button1" onclick="showModal()">Buy</a>
                    </div>



                    <div class="box">
                        <div class="box-top">
                            <img class="box-image" src="/resources/images/food/snakcs/CORNDOG.png" alt="Girl Eating Pizza">
                            <div class="title-flex">
                                <h3 class="box-title">Corn Dog</h3>
                            </div>
                        </div>
                        <h1 class="food-price">₱ 95.00</h1>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="input-group-text decrementbtn"><strong>-</strong></button>
                            </div>
                            <input type="text" class="form-control text-center input-qty" value="1">
                            <div class="input-group-append">
                                <button class="input-group-text incrementbtn"><strong>+</strong></button>
                            </div>
                        </div>
                        <a href="#" class="button1" onclick="showModal()">Buy</a>
                    </div>

                    <div class="box">
                        <div class="box-top">
                            <img class="box-image" src="/resources/images/food/snakcs/popcorn.png" alt="Girl Eating Pizza">
                            <div class="title-flex">
                                <h3 class="box-title">Pop Corn</h3>
                            </div>
                        </div>
                        <h1 class="food-price">₱ 175.00</h1>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="input-group-text decrementbtn"><strong>-</strong></button>
                            </div>
                            <input type="text" class="form-control text-center input-qty" value="1">
                            <div class="input-group-append">
                                <button class="input-group-text incrementbtn"><strong>+</strong></button>
                            </div>
                        </div>
                        <a href="#" class="button1" onclick="showModal()">Buy</a>
                    </div>
                </div>


                <div class="box-row">
                    <div class="box">
                        <div class="box-top">
                            <img class="box-image" src="/resources/images/food/snakcs/DONUT.png" alt="Girl Eating Pizza">
                            <div class="title-flex">
                                <h3 class="box-title">Donut</h3>
                            </div>
                        </div>
                        <h1 class="food-price">₱ 75.00</h1>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="input-group-text decrementbtn"><strong>-</strong></button>
                            </div>
                            <input type="text" class="form-control text-center input-qty" value="1">
                            <div class="input-group-append">
                                <button class="input-group-text incrementbtn"><strong>+</strong></button>
                            </div>
                        </div>
                        <a href="#" class="button1" onclick="showModal()">Buy</a>
                    </div>

                    <div class="box">
                        <div class="box-top">
                            <img class="box-image" src="/resources/images/food/snakcs/NACHOS.png" alt="Girl Eating Pizza">
                            <div class="title-flex">
                                <h3 class="box-title">Nachos w/dip</h3>
                            </div>
                        </div>
                        <h1 class="food-price">₱ 120.00</h1>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="input-group-text decrementbtn"><strong>-</strong></button>
                            </div>
                            <input type="text" class="form-control text-center input-qty" value="1">
                            <div class="input-group-append">
                                <button class="input-group-text incrementbtn"><strong>+</strong></button>
                            </div>
                        </div>
                        <a href="#" class="button1" onclick="showModal()">Buy</a>
                    </div>


                    <div class="box">
                        <div class="box-top">
                            <img class="box-image" src="/resources/images/food/snakcs/PIZZA.png" alt="Girl Eating Pizza">
                            <div class="title-flex">
                                <h3 class="box-title">Pizza</h3>
                            </div>
                        </div>
                        <h1 class="food-price">₱ 100.00</h1>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="input-group-text decrementbtn"><strong>-</strong></button>
                            </div>
                            <input type="text" class="form-control text-center input-qty" value="1">
                            <div class="input-group-append">
                                <button class="input-group-text incrementbtn"><strong>+</strong></button>
                            </div>
                        </div>
                        <a href="#" class="button1" onclick="showModal()">Buy</a>
                    </div>
                </div>
            </div>


            <div class="choice-drinks" style="display: none;">
                <div class="box-row">
                    <div class="box">
                        <div class="box-top">
                            <img class="box-image" src="/resources/images/food/drinks/COKE.png" alt="Girl Eating Pizza">
                            <div class="title-flex">
                                <h3 class="box-title">Coca Cola</h3>
                            </div>
                        </div>
                        <h1 class="food-price">₱ 50.00</h1>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="input-group-text decrementbtn"><strong>-</strong></button>
                            </div>
                            <input type="text" class="form-control text-center input-qty" value="1">
                            <div class="input-group-append">
                                <button class="input-group-text incrementbtn"><strong>+</strong></button>
                            </div>
                        </div>
                        <a href="#" class="button1" onclick="showModal()">Buy</a>
                    </div>

                    <div class="box">
                        <div class="box-top">
                            <img class="box-image" src="/resources/images/food/drinks/PEPSI.png" alt="Girl Eating Pizza">
                            <div class="title-flex">
                                <h3 class="box-title">Pepsi</h3>
                            </div>
                        </div>
                        <h1 class="food-price">₱ 50.00</h1>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="input-group-text decrementbtn"><strong>-</strong></button>
                            </div>
                            <input type="text" class="form-control text-center input-qty" value="1">
                            <div class="input-group-append">
                                <button class="input-group-text incrementbtn"><strong>+</strong></button>
                            </div>
                        </div>
                        <a href="#" class="button1" onclick="showModal()">Buy</a>
                    </div>


                    <div class="box">
                        <div class="box-top">
                            <img class="box-image" src="/resources/images/food/drinks/ROYAL.png" alt="Girl Eating Pizza">
                            <div class="title-flex">
                                <h3 class="box-title">Royal</h3>
                            </div>
                        </div>
                        <h1 class="food-price">₱ 50.00</h1>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="input-group-text decrementbtn"><strong>-</strong></button>
                            </div>
                            <input type="text" class="form-control text-center input-qty" value="1">
                            <div class="input-group-append">
                                <button class="input-group-text incrementbtn"><strong>+</strong></button>
                            </div>
                        </div>
                        <a href="#" class="button1" onclick="showModal()">Buy</a>
                    </div>
                </div>

                <div class="box-row">
                    <div class="box">
                        <div class="box-top">
                            <img class="box-image" src="/resources/images/food/drinks/ROOT BEER.png" alt="Girl Eating Pizza">
                            <div class="title-flex">
                                <h3 class="box-title">Root Beer</h3>
                            </div>
                        </div>
                        <h1 class="food-price">₱ 50.00</h1>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="input-group-text decrementbtn"><strong>-</strong></button>
                            </div>
                            <input type="text" class="form-control text-center input-qty" value="1">
                            <div class="input-group-append">
                                <button class="input-group-text incrementbtn"><strong>+</strong></button>
                            </div>
                        </div>
                        <a href="#" class="button1" onclick="showModal()">Buy</a>
                    </div>

                    <div class="box">
                        <div class="box-top">
                            <img class="box-image" src="/resources/images/food/drinks/SPRITE.png" alt="Girl Eating Pizza">
                            <div class="title-flex">
                                <h3 class="box-title">Sprite</h3>
                            </div>
                        </div>
                        <h1 class="food-price">₱ 50.00</h1>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="input-group-text decrementbtn"><strong>-</strong></button>
                            </div>
                            <input type="text" class="form-control text-center input-qty" value="1">
                            <div class="input-group-append">
                                <button class="input-group-text incrementbtn"><strong>+</strong></button>
                            </div>
                        </div>
                        <a href="#" class="button1" onclick="showModal()">Buy</a>
                    </div>

                    <div class="box">
                        <div class="box-top">
                            <img class="box-image" src="/resources/images/food/drinks/WATER.png" alt="Girl Eating Pizza">
                            <div class="title-flex">
                                <h3 class="box-title">Water</h3>
                            </div>
                        </div>
                        <h1 class="food-price">₱ 30.00</h1>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="input-group-text decrementbtn"><strong>-</strong></button>
                            </div>
                            <input type="text" class="form-control text-center input-qty" value="1">
                            <div class="input-group-append">
                                <button class="input-group-text incrementbtn"><strong>+</strong></button>
                            </div>
                        </div>
                        <a href="#" class="button1" onclick="showModal()">Buy</a>
                    </div>
                </div>

            </div>


            <div class="choice-combos" style="display: none;">
                <div class="box-row">
                    <div class="box">
                        <div class="box-top">
                            <img class="box-image" src="/resources/images/movies-portrait/oh2.jpg" alt="Girl Eating Pizza">
                            <div class="title-flex">
                                <h3 class="box-title">POPCORN</h3>
                            </div>
                            <p class="description">DCGDFGDFG</p>
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="input-group-text decrementbtn"><strong>-</strong></button>
                            </div>
                            <input type="text" class="form-control text-center input-qty" value="1">
                            <div class="input-group-append">
                                <button class="input-group-text incrementbtn"><strong>+</strong></button>
                            </div>
                        </div>
                        <a href="#" class="button1" onclick="showModal()">Buy</a>
                    </div>

                    <div class="box">
                        <div class="box-top">
                            <img class="box-image" src="/resources/images/movies-portrait/oh2.jpg" alt="Girl Eating Pizza">
                            <div class="title-flex">
                                <h3 class="box-title">POPCORN</h3>
                            </div>
                            <p class="description">DCGDFGDFG</p>
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="input-group-text decrementbtn"><strong>-</strong></button>
                            </div>
                            <input type="text" class="form-control text-center input-qty" value="1">
                            <div class="input-group-append">
                                <button class="input-group-text incrementbtn"><strong>+</strong></button>
                            </div>
                        </div>
                        <a href="#" class="button1" onclick="showModal()">Buy</a>
                    </div>



                    <div class="box">
                        <div class="box-top">
                            <img class="box-image" src="/resources/images/movies-portrait/oh2.jpg" alt="Girl Eating Pizza">
                            <div class="title-flex">
                                <h3 class="box-title">POPCORN</h3>
                            </div>
                            <p class="description">DCGDFGDFG</p>
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="input-group-text decrementbtn"><strong>-</strong></button>
                            </div>
                            <input type="text" class="form-control text-center input-qty" value="1">
                            <div class="input-group-append">
                                <button class="input-group-text incrementbtn"><strong>+</strong></button>
                            </div>
                        </div>
                        <a href="#" class="button1" onclick="showModal()">Buy</a>
                    </div>
                </div>

                <div class="box-row">
                    <div class="box">
                        <div class="box-top">
                            <img class="box-image" src="/resources/images/movies-portrait/oh2.jpg" alt="Girl Eating Pizza">
                            <div class="title-flex">
                                <h3 class="box-title">POPCORN</h3>
                            </div>
                            <p class="description">DCGDFGDFG</p>
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="input-group-text decrementbtn"><strong>-</strong></button>
                            </div>
                            <input type="text" class="form-control text-center input-qty" value="1">
                            <div class="input-group-append">
                                <button class="input-group-text incrementbtn"><strong>+</strong></button>
                            </div>
                        </div>
                        <a href="#" class="button1" onclick="showModal()">Buy</a>
                    </div>

                    <div class="box">
                        <div class="box-top">
                            <img class="box-image" src="/resources/images/movies-portrait/oh2.jpg" alt="Girl Eating Pizza">
                            <div class="title-flex">
                                <h3 class="box-title">POPCORN</h3>
                            </div>
                            <p class="description">DCGDFGDFG</p>
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="input-group-text decrementbtn"><strong>-</strong></button>
                            </div>
                            <input type="text" class="form-control text-center input-qty" value="1">
                            <div class="input-group-append">
                                <button class="input-group-text incrementbtn"><strong>+</strong></button>
                            </div>
                        </div>
                        <a href="#" class="button1" onclick="showModal()">Buy</a>
                    </div>





                    <div class="box">
                        <div class="box-top">
                            <img class="box-image" src="/resources/images/movies-portrait/oh2.jpg" alt="Girl Eating Pizza">
                            <div class="title-flex">
                                <h3 class="box-title">POPCORN</h3>
                            </div>
                            <p class="description">DCGDFGDFG</p>
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="input-group-text decrementbtn"><strong>-</strong></button>
                            </div>
                            <input type="text" class="form-control text-center input-qty" value="1">
                            <div class="input-group-append">
                                <button class="input-group-text incrementbtn"><strong>+</strong></button>
                            </div>
                        </div>
                        <a href="#" class="button1" onclick="showModal()">Buy</a>
                    </div>
                </div>

            </div>


        </div>

        <script>
            function showContent(choice) {
                document.querySelectorAll('.choice-snacks, .choice-drinks, .choice-combos').forEach(function(el) {
                    el.style.display = 'none';
                });


                document.querySelectorAll('.choices span').forEach(function(el) {
                    el.classList.remove('active');
                });


                document.querySelector('.choice-' + choice).style.display = 'block';


                document.querySelector('.' + choice).classList.add('active');
            }
        </script>

        <script>
            $(document).ready(function() {

                $('.input-qty').on('input', function() {
                    $(this).val($(this).val().replace(/\D/, ''));
                });


                $('.incrementbtn').click(function(e) {
                    e.preventDefault();

                    var qty = $(this).closest('.product_data').find('.input-qty').val();

                    var value = parseInt(qty, 10);
                    value = isNaN(value) ? 0 : value;

                    value++;
                    $(this).closest('.product_data').find('.input-qty').val(value);
                });


                $('.decrementbtn').click(function(e) {
                    e.preventDefault();

                    var qty = $(this).closest('.product_data').find('.input-qty').val();

                    var value = parseInt(qty, 10);
                    value = isNaN(value) ? 0 : value;
                    if (value > 1) {
                        value--;
                        $(this).closest('.product_data').find('.input-qty').val(value);
                    }
                });

                $('.input-qty').on('change', function() {
                    var value = $(this).val();
                    if (value <= 0) {
                        $(this).val(1);
                    }
                });


            });
        </script>



        <?php include('/xampp/htdocs/cinemamoto/include/foooter.php'); ?>


        <script src="/resources/js/script.js"></script>
    </body>

    </html>


<?php
}
?>