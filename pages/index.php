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
        <link rel="stylesheet" href="/resources/css/super.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>

        <section>
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


            <div class="swiper mySwiper">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="image">
                            <div class="black">
                                <h1>Avengers: EndGame</h1>
                                <div class="star">
                                    <i class="fa-solid fa-star"></i>
                                    <span class="ratings"> &nbsp;9.8</span>
                                    <span class="separator">|</span>
                                    <span class="quality">HD</span>
                                    <span class="separator">|</span>
                                    <span class="mins"><i class="fa-regular fa-clock"></i> &nbsp;3h 1m</span>
                                    <span class="separator">|</span>
                                    <span class="quality">Action/Sci-fi</span>
                                </div>
                                <p>
                                    Stark steals the Stones and uses them to disintegrate
                                    Thanos and his army, sacrificing himself. After Stark's
                                    funeral, Thor appoints Valkyrie as the new king of New
                                    Asgard and joins the Guardians. Rogers returns the Stones
                                    and Mjolnir to their proper timelines and remains in the
                                    past to live with Carter.
                                </p>
                                <div class="watch">
                                    <button class="playButton play"><i class="bx bx-play"></i></button>
                                    <button class="ticket" onclick="window.location.href='/pages/movies.php'">Buy Your Ticket Now</button>
                                </div>
                            </div>
                            <!-- <video class="video-item" loop src="/resources/trailer/avengersendgame.mp4"></video> -->
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="image">
                            <div class="black">
                                <h1>Oppenheimer</h1>
                                <div class="star">
                                    <i class="fa-solid fa-star"></i>
                                    <span class="ratings"> &nbsp;9.2</span>
                                    <span class="separator">|</span>
                                    <span class="quality">HD</span>
                                    <span class="separator">|</span>
                                    <span class="mins"><i class="fa-regular fa-clock"></i> &nbsp;3h</span>
                                    <span class="separator">|</span>
                                    <span class="quality">Thriller/Historical drama</span>
                                </div>
                                <p>
                                    During World War II, Lt. Gen. Leslie Groves Jr. appoints physicist J.
                                    Robert Oppenheimer to work on the top-secret Manhattan Project. Oppenheimer
                                    and a team of scientists spend years developing and designing the atomic
                                    bomb. Their work comes to fruition on July 16, 1945, as they witness the
                                    world's first nuclear explosion, forever changing the course of history.
                                </p>

                                <div class="watch">
                                    <button class="playButton play"><i class="bx bx-play"></i></button>
                                    <button class="ticket" onclick="window.location.href='/pages/movies.php'">Buy Your Ticket Now</button>
                                </div>
                            </div>
                            <!-- <video class="video-item" loop src="/resources/trailer/oppenheimer.mp4"></video> -->
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="image">
                            <div class="black">
                                <h1>Kung Fu Panda 2</h1>
                                <div class="star">
                                    <i class="fa-solid fa-star"></i>
                                    <span class="ratings"> &nbsp;9.6</span>
                                    <span class="separator">|</span>
                                    <span class="quality">HD</span>
                                    <span class="separator">|</span>
                                    <span class="mins"><i class="fa-regular fa-clock"></i> &nbsp;1h 32m</span>
                                    <span class="separator">|</span>
                                    <span class="quality">Family/Comedy</span>
                                </div>
                                <p>
                                    Now known as the Dragon Warrior, Po (Chawalit Simankhongtham) protects
                                    the Valley of Peace alongside his friends and fellow kung fu masters, the
                                    Furious Five. However, a dangerous villain threatens Po's awesome new life
                                    with plans to use a secret weapon to wipe out the martial art and conquer
                                    China.
                                </p>

                                <div class="watch">
                                    <button class="playButton play"><i class="bx bx-play"></i></button>
                                    <button class="ticket" onclick="window.location.href='/pages/movies.php'">Buy Your Ticket Now</button>
                                </div>
                            </div>
                            <!-- <video class="video-item" loop src="/resources/trailer/kungfupand2.mp4"></video> -->
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="image">
                            <div class="black">
                                <h1>Garfield</h1>
                                <div class="star">
                                    <i class="fa-solid fa-star"></i>
                                    <span class="ratings"> &nbsp;9.4</span>
                                    <span class="separator">|</span>
                                    <span class="quality">HD</span>
                                    <span class="separator">|</span>
                                    <span class="mins"><i class="fa-regular fa-clock"></i> &nbsp;1h 41m</span>
                                    <span class="separator">|</span>
                                    <span class="quality">Family/Comedy</span>
                                </div>
                                <p>
                                    After an unexpected reunion with his long-lost father, the street cat
                                    Vic, Garfield is forced to leave his very comfortable life with Harald
                                    behind. Together with Vic and Odie, he plans a crazy robbery.
                                </p>

                                <div class="watch">
                                    <button class="playButton play"><i class="bx bx-play"></i></button>
                                    <button class="ticket" onclick="window.location.href='/pages/movies.php'">Buy Your Ticket Now</button>
                                </div>
                            </div>
                            <!-- <video class="video-item" loop src="/resources/trailer/garfield.mp4"></video> -->
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="image">
                            <div class="black">
                                <h1>Inside Out 2</h1>
                                <div class="star">
                                    <i class="fa-solid fa-star"></i>
                                    <span class="ratings"> &nbsp;9.5</span>
                                    <span class="separator">|</span>
                                    <span class="quality">HD</span>
                                    <span class="separator">|</span>
                                    <span class="mins"><i class="fa-regular fa-clock"></i> &nbsp;1h 36m</span>
                                    <span class="separator">|</span>
                                    <span class="quality">Family/Comedy</span>
                                </div>
                                <p>
                                    Joy, Sadness, Anger, Fear and Disgust have been running a
                                    successful operation by all accounts. However, when Anxiety shows up,
                                    they aren't sure how to feel.
                                </p>

                                <div class="watch">
                                    <button class="playButton play"><i class="bx bx-play"></i></button>
                                    <button class="ticket" onclick="window.location.href='/pages/movies.php'">Buy Your Ticket Now</button>
                                </div>
                            </div>
                            <video class="video-item" loop src="/resources/trailer/insideout2.mp4"></video>
                        </div>
                    </div>
                </div>

                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </section>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var videos = document.querySelectorAll('.video-item');
                var playButtons = document.querySelectorAll('.playButton');

                // Function to attempt playing the video with sound
                function attemptPlay(video) {
                    video.muted = false;
                    video.play().catch(function(error) {
                        console.log('Autoplay failed:', error);
                        video.muted = true;
                        video.play();
                    });
                }

                // Try to play each video once the page has fully loaded
                videos.forEach(function(video) {
                    attemptPlay(video);
                });

                // Mute video when user scrolls down
                window.addEventListener('scroll', function() {
                    videos.forEach(function(video) {
                        if (window.scrollY > 0) {
                            video.muted = true;
                        }
                    });
                });

                // Toggle video sound when play button is clicked
                playButtons.forEach(function(button, index) {
                    button.addEventListener('click', function() {
                        var video = videos[index];
                        video.muted = !video.muted;
                    });
                });
            });
        </script>

        <div class="second-movies">
            <div class="latest">
                <h1>Now Showing</h1>
                <div class="box">
                    <div class="cards-wrapper" id="cardWrapper2">

                        <div class="card">
                            <div class="details">
                                <div class="left">
                                    <p class="name">Twister</p>
                                    <div class="date_quality">
                                        <p class="quality">HD</p>
                                        <p class="date">2024</p>
                                    </div>
                                    <div class="info">
                                        <div class="rate">
                                            <i class="fa-solid fa-star"></i>
                                            <p>9.4</p>
                                        </div>
                                        <div class="time">
                                            <i class="fa-regular fa-clock"></i>
                                            <p> &nbsp;1h 57m</p>
                                        </div>
                                    </div>
                                    <p class="category">Action, Adventure, Thriller</p>
                                    <p class="price">₱400.00</p>
                                    <button class="ticket-button" onclick="window.location.href='/pages/moviepages/twister.php'">Buy Ticket</button>
                                </div>
                            </div>
                            <img src="/resources/images/movies-portrait/Twisters.PNG" alt="OppenHeimer">
                        </div>

                        <div class="card">
                            <div class="details">
                                <div class="left">
                                    <p class="name">Fly Me to the Moon</p>
                                    <div class="date_quality">
                                        <p class="quality">HD</p>
                                        <p class="date">2024</p>
                                    </div>
                                    <div class="info">
                                        <div class="rate">
                                            <i class="fa-solid fa-star"></i>
                                            <p>9.1</p>
                                        </div>
                                        <div class="time">
                                            <i class="fa-regular fa-clock"></i>
                                            <p> &nbsp;2h 11m</p>
                                        </div>
                                    </div>
                                    <p class="category">Romance/Comedy</p>
                                    <p class="price">₱350.00</p>
                                    <button class="ticket-button" onclick="window.location.href='/pages/moviepages/flymetothemoon.php'">Buy Ticket</button>
                                </div>
                            </div>
                            <img src="/resources/images/movies-portrait/Fly me to the moon.PNG" alt="OppenHeimer">
                        </div>

                        <div class="card">
                            <div class="details">
                                <div class="left">
                                    <p class="name">How To Make Millions Before Grandma Dies</p>
                                    <div class="date_quality">
                                        <p class="quality">HD</p>
                                        <p class="date">2024</p>
                                    </div>
                                    <div class="info">
                                        <div class="rate">
                                            <i class="fa-solid fa-star"></i>
                                            <p>9.9</p>
                                        </div>
                                        <div class="time">
                                            <i class="fa-regular fa-clock"></i>
                                            <p> &nbsp;2h 7m</p>
                                        </div>
                                    </div>
                                    <p class="category">Drama/Family film</p>
                                    <p class="price">₱400.00</p>
                                    <button class="ticket-button">Buy Ticket</button>
                                </div>
                            </div>
                            <img src="/resources/images/movies-portrait/HOW TO MAKE MILLION.PNG" alt="OppenHeimer">
                        </div>

                        <div class="card">
                            <div class="details">
                                <div class="left">
                                    <p class="name">Doraemon: Nobita's Earth Symphony</p>
                                    <div class="date_quality">
                                        <p class="quality">HD</p>
                                        <p class="date">2024</p>
                                    </div>
                                    <div class="info">
                                        <div class="rate">
                                            <i class="fa-solid fa-star"></i>
                                            <p>9.2</p>
                                        </div>
                                        <div class="time">
                                            <i class="fa-regular fa-clock"></i>
                                            <p> &nbsp;1h 55m
                                            </p>
                                        </div>
                                    </div>
                                    <p class="category">Adventure/Musical</p>
                                    <p class="price">₱380.00</p>
                                    <button class="ticket-button">Buy Ticket</button>
                                </div>
                            </div>
                            <img src="/resources/images/movies-portrait/DOREMON.PNG" alt="OppenHeimer">
                        </div>

                        <div class="card">
                            <div class="details">
                                <div class="left">
                                    <p class="name">Despicable Me 4</p>
                                    <div class="date_quality">
                                        <p class="quality">HD</p>
                                        <p class="date">2024</p>
                                    </div>
                                    <div class="info">
                                        <div class="rate">
                                            <i class="fa-solid fa-star"></i>
                                            <p>9.7</p>
                                        </div>
                                        <div class="time">
                                            <i class="fa-regular fa-clock"></i>
                                            <p> &nbsp;1h 34m
                                            </p>
                                        </div>
                                    </div>
                                    <p class="category">Family/Comedy</p>
                                    <p class="price">₱500.00</p>
                                    <button class="ticket-button">Buy Ticket</button>
                                </div>
                            </div>
                            <img src="/resources/images/movies-portrait/despicable me 4.png" alt="OppenHeimer">
                        </div>

                        <div class="card">
                            <div class="details">
                                <div class="left">
                                    <p class="name">That Kind of Love</p>
                                    <div class="date_quality">
                                        <p class="quality">HD</p>
                                        <p class="date">2024</p>
                                    </div>
                                    <div class="info">
                                        <div class="rate">
                                            <i class="fa-solid fa-star"></i>
                                            <p>9.6</p>
                                        </div>
                                        <div class="time">
                                            <i class="fa-regular fa-clock"></i>
                                            <p> &nbsp;2h 16m</p>
                                        </div>
                                    </div>
                                    <p class="category">
                                        Drama</p>
                                    <p class="price">₱380.00</p>
                                    <button class="ticket-button">Buy Ticket</button>
                                </div>
                            </div>
                            <img src="/resources/images/movies-portrait/That kind of love.PNG" alt="OppenHeimer">
                        </div>

                        <div class="card">
                            <div class="details">
                                <div class="left">
                                    <p class="name">A Quiet Place: Day One</p>
                                    <div class="date_quality">
                                        <p class="quality">HD</p>
                                        <p class="date">2024</p>
                                    </div>
                                    <div class="info">
                                        <div class="rate">
                                            <i class="fa-solid fa-star"></i>
                                            <p>9.4</p>
                                        </div>
                                        <div class="time">
                                            <i class="fa-regular fa-clock"></i>
                                            <p> &nbsp;1h 39m</p>
                                        </div>
                                    </div>
                                    <p class="category">Horror/Sci-fi</p>
                                    <p class="price">₱400.00</p>
                                    <button class="ticket-button">Buy Ticket</button>
                                </div>
                            </div>
                            <img src="/resources/images/movies-portrait/Quiet Place Day one.PNG" alt="OppenHeimer">
                        </div>

                    </div>
                </div>
            </div>
        </div>



        <div class="second-movies">
            <div class="latest">
                <h1>Latest Movie</h1>
                <div class="box">
                    <div class="cards-wrapper" id="cardWrapper1">

                        <div class="card">
                            <div class="details">
                                <div class="left">
                                    <p class="name">IF</p>
                                    <div class="date_quality">
                                        <p class="quality">HD</p>
                                        <p class="date">2024</p>
                                    </div>
                                    <div class="info">
                                        <div class="rate">
                                            <i class="fa-solid fa-star"></i>
                                            <p>9.6</p>
                                        </div>
                                        <div class="time">
                                            <i class="fa-regular fa-clock"></i>
                                            <p> &nbsp;1h 44m</p>
                                        </div>
                                    </div>
                                    <p class="category">Family/Comedy</p>
                                    <p class="price">₱380.00</p>
                                    <button class="ticket-button" onclick="window.location.href='/pages/moviepages/if.php'">Buy Ticket</button>
                                </div>
                            </div>
                            <img src="/resources/images/movies-portrait/if.jpg" alt="OppenHeimer">
                        </div>

                        <div class="card">
                            <div class="details">
                                <div class="left">
                                    <p class="name">Tarot</p>
                                    <div class="date_quality">
                                        <p class="quality">HD</p>
                                        <p class="date">May 3, 2024</p>
                                    </div>
                                    <div class="info">
                                        <div class="rate">
                                            <i class="fa-solid fa-star"></i>
                                            <p>9.2</p>
                                        </div>
                                        <div class="time">
                                            <i class="fa-regular fa-clock"></i>
                                            <p> &nbsp;1h 32m</p>
                                        </div>
                                    </div>
                                    <p class="category">Horror/Supernatural</p>
                                    <p class="price">₱380.00</p>
                                    <button class="ticket-button">Buy Ticket</button>
                                </div>
                            </div>
                            <img src="/resources/images/movies-portrait/tarot.jpg" alt="OppenHeimer">
                        </div>

                        <div class="card">
                            <div class="details">
                                <div class="left">
                                    <p class="name">Monkey Man</p>
                                    <div class="date_quality">
                                        <p class="quality">HD</p>
                                        <p class="date">2024</p>
                                    </div>
                                    <div class="info">
                                        <div class="rate">
                                            <i class="fa-solid fa-star"></i>
                                            <p>9.5</p>
                                        </div>
                                        <div class="time">
                                            <i class="fa-regular fa-clock"></i>
                                            <p> &nbsp;2h 1m</p>
                                        </div>
                                    </div>
                                    <p class="category">Action/Thriller</p>
                                    <p class="price">₱380.00</p>
                                    <button class="ticket-button">Buy Ticket</button>
                                </div>
                            </div>
                            <img src="/resources/images/movies-portrait/Monkey_Man_film.jpg" alt="OppenHeimer">
                        </div>

                        <div class="card">
                            <div class="details">
                                <div class="left">
                                    <p class="name">Trap</p>
                                    <div class="date_quality">
                                        <p class="quality">HD</p>
                                        <p class="date">2023</p>
                                    </div>
                                    <div class="info">
                                        <div class="rate">
                                            <i class="fa-solid fa-star"></i>
                                            <p>9.3</p>
                                        </div>
                                        <div class="time">
                                            <i class="fa-regular fa-clock"></i>
                                            <p> &nbsp;2h 30m</p>
                                        </div>
                                    </div>
                                    <p class="category">Thriller/Mystery</p>
                                    <p class="price">₱300.00</p>
                                    <button class="ticket-button">Buy Ticket</button>
                                </div>
                            </div>
                            <img src="/resources/images/movies-portrait/trap.jpg" alt="OppenHeimer">
                        </div>

                        <div class="card">
                            <div class="details">
                                <div class="left">
                                    <p class="name">Rebel Moon – Part Two: The Scargiver</p>
                                    <div class="date_quality">
                                        <p class="quality">HD</p>
                                        <p class="date">2024</p>
                                    </div>
                                    <div class="info">
                                        <div class="rate">
                                            <i class="fa-solid fa-star"></i>
                                            <p>9.1</p>
                                        </div>
                                        <div class="time">
                                            <i class="fa-regular fa-clock"></i>
                                            <p> &nbsp;2h 2m
                                            </p>
                                        </div>
                                    </div>
                                    <p class="category">Action/Adventure</p>
                                    <p class="price">₱350.00</p>
                                    <button class="ticket-button">Buy Ticket</button>
                                </div>
                            </div>
                            <img src="/resources/images/movies-portrait/RABEL MOON.jpg" alt="OppenHeimer">
                        </div>

                        <div class="card">
                            <div class="details">
                                <div class="left">
                                    <p class="name">Megamind vs. the Doom Syndicate
                                    </p>
                                    <div class="date_quality">
                                        <p class="quality">HD</p>
                                        <p class="date">2024</p>
                                    </div>
                                    <div class="info">
                                        <div class="rate">
                                            <i class="fa-solid fa-star"></i>
                                            <p>9.2</p>
                                        </div>
                                        <div class="time">
                                            <i class="fa-regular fa-clock"></i>
                                            <p> &nbsp;1h 25m</p>
                                        </div>
                                    </div>
                                    <p class="category">
                                        Animation/Comedy/Family/Sci-Fi</p>
                                    <p class="price">₱500.00</p>
                                    <button class="ticket-button">Buy Ticket</button>
                                </div>
                            </div>
                            <img src="/resources/images/movies-portrait/Megamind.jpg" alt="OppenHeimer">
                        </div>

                        <div class="card">
                            <div class="details">
                                <div class="left">
                                    <p class="name">The Watchers</p>
                                    <div class="date_quality">
                                        <p class="quality">HD</p>
                                        <p class="date">2024</p>
                                    </div>
                                    <div class="info">
                                        <div class="rate">
                                            <i class="fa-solid fa-star"></i>
                                            <p>9.4</p>
                                        </div>
                                        <div class="time">
                                            <i class="fa-regular fa-clock"></i>
                                            <p> &nbsp;1h 42m
                                            </p>
                                        </div>
                                    </div>
                                    <p class="category">Horror/Fantasy </p>
                                    <p class="price">₱380.00</p>
                                    <button class="ticket-button">Buy Ticket</button>
                                </div>
                            </div>
                            <img src="/resources/images/movies-portrait/watchers.jpg" alt="OppenHeimer">
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <div class="second-movies">
            <div class="latest">
                <h1>Coming Soon</h1>
                <div class="box">
                    <div class="cards-wrapper" id="cardWrapper3">

                        <div class="card">
                            <div class="details">
                                <div class="left">
                                    <p class="name">Deadpool & wolverine</p>
                                    <div class="date_quality">
                                        <p class="quality">HD</p>
                                        <p class="date">2024</p>
                                    </div>
                                    <div class="info">
                                        <div class="rate">
                                            <i class="fa-solid fa-star"></i>
                                            <p>9.2</p>
                                        </div>
                                        <div class="time">
                                            <i class="fa-regular fa-clock"></i>
                                            <p> &nbsp;2h 7m</p>
                                        </div>
                                    </div>
                                    <p class="category">Action,Comedy Sci-fi</p>
                                    <p class="price">N/A</p>
                                    <button class="ticket-button" onclick="window.location.href='/pages/moviepages/daedpoolandwol.php'">COMING SOON</button>
                                </div>
                            </div>
                            <img src="/resources/images/movies-portrait/Deadpool & Wolverine.PNG" alt="OppenHeimer">
                        </div>

                        <div class="card">
                            <div class="details">
                                <div class="left">
                                    <p class="name">Kraven the Hunter
                                    </p>
                                    <div class="date_quality">
                                        <p class="quality">N/A</p>
                                        <p class="date">2024</p>
                                    </div>
                                    <div class="info">
                                        <div class="rate">
                                            <i class="fa-solid fa-star"></i>
                                            <p>N/A</p>
                                        </div>
                                        <div class="time">
                                            <i class="fa-regular fa-clock"></i>
                                            <p> &nbsp;N/A</p>
                                        </div>
                                    </div>
                                    <p class="category">N/A</p>
                                    <p class="price">N/A</p>
                                    <button class="ticket-button">COMING SOON</button>
                                </div>
                            </div>
                            <img src="/resources/images/movies-portrait/Kraven.PNG" alt="OppenHeimer">
                        </div>

                        <div class="card">
                            <div class="details">
                                <div class="left">
                                    <p class="name">Borderlands</p>
                                    <div class="date_quality">
                                        <p class="quality">HD</p>
                                        <p class="date">2024</p>
                                    </div>
                                    <div class="info">
                                        <div class="rate">
                                            <i class="fa-solid fa-star"></i>
                                            <p>N/A</p>
                                        </div>
                                        <div class="time">
                                            <i class="fa-regular fa-clock"></i>
                                            <p> &nbsp;1h 41m
                                            </p>
                                        </div>
                                    </div>
                                    <p class="category">Action/Adventure</p>
                                    <p class="price">N/A</p>
                                    <button class="ticket-button">COMING SOON</button>
                                </div>
                            </div>
                            <img src="/resources/images/movies-portrait/BORDERLAND.PNG" alt="OppenHeimer">
                        </div>

                        <div class="card">
                            <div class="details">
                                <div class="left">
                                    <p class="name">Born Pink</p>
                                    <div class="date_quality">
                                        <p class="quality">N/A</p>
                                        <p class="date">2024</p>
                                    </div>
                                    <div class="info">
                                        <div class="rate">
                                            <i class="fa-solid fa-star"></i>
                                            <p>N/A</p>
                                        </div>
                                        <div class="time">
                                            <i class="fa-regular fa-clock"></i>
                                            <p> &nbsp;N/A</p>
                                        </div>
                                    </div>
                                    <p class="category">N/A</p>
                                    <p class="price">N/A</p>
                                    <button class="ticket-button">COMING SOON</button>
                                </div>
                            </div>
                            <img src="/resources/images/movies-portrait/BORN PINK.PNG" alt="OppenHeimer">
                        </div>

                        <div class="card">
                            <div class="details">
                                <div class="left">
                                    <p class="name">Blue Lock
                                    </p>
                                    <div class="date_quality">
                                        <p class="quality">N/A</p>
                                        <p class="date">2024</p>
                                    </div>
                                    <div class="info">
                                        <div class="rate">
                                            <i class="fa-solid fa-star"></i>
                                            <p>N/A</p>
                                        </div>
                                        <div class="time">
                                            <i class="fa-regular fa-clock"></i>
                                            <p> &nbsp;N/A</p>
                                        </div>
                                    </div>
                                    <p class="category">N/A</p>
                                    <p class="price">N/A</p>
                                    <button class="ticket-button">COMING SOON</button>
                                </div>
                            </div>
                            <img src="/resources/images/movies-portrait/BLUELOCK.PNG" alt="OppenHeimer">
                        </div>

                        <div class="card">
                            <div class="details">
                                <div class="left">
                                    <p class="name">Un/Happy For You</p>
                                    <div class="date_quality">
                                        <p class="quality">HD</p>
                                        <p class="date">2024</p>
                                    </div>
                                    <div class="info">
                                        <div class="rate">
                                            <i class="fa-solid fa-star"></i>
                                            <p>N/A</p>
                                        </div>
                                        <div class="time">
                                            <i class="fa-regular fa-clock"></i>
                                            <p> &nbsp;N/A</p>
                                        </div>
                                    </div>
                                    <p class="category">N/A</p>
                                    <p class="price">N/A</p>
                                    <button class="ticket-button">COMING SOON</button>
                                </div>
                            </div>
                            <img src="/resources/images/movies-portrait/UNHAPPY FOR YOU.PNG" alt="OppenHeimer">
                        </div>

                        <div class="card">
                            <div class="details">
                                <div class="left">
                                    <p class="name">Venom: The Last Dance
                                    </p>
                                    <div class="date_quality">
                                        <p class="quality">N/A</p>
                                        <p class="date">2024</p>
                                    </div>
                                    <div class="info">
                                        <div class="rate">
                                            <i class="fa-solid fa-star"></i>
                                            <p>N/A</p>
                                        </div>
                                        <div class="time">
                                            <i class="fa-regular fa-clock"></i>
                                            <p> &nbsp;N/A</p>
                                        </div>
                                    </div>
                                    <p class="category">Action/Sci-fi
                                    </p>
                                    <p class="price">N/A</p>
                                    <button class="ticket-button">COMING SOON</button>
                                </div>
                            </div>
                            <img src="/resources/images/movies-portrait/VENOM.jpg" alt="OppenHeimer">
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const wrappers = [{
                        id: 'cardWrapper1',
                        interval: 7000
                    },
                    {
                        id: 'cardWrapper2',
                        interval: 8000
                    },
                    {
                        id: 'cardWrapper3',
                        interval: 9000
                    }
                ];

                wrappers.forEach(wrapper => {
                    const cardsWrapper = document.getElementById(wrapper.id);
                    const cards = cardsWrapper.querySelectorAll('.card');

                    let startX;
                    let isMouseDown = false;
                    let currentIndex = 0;
                    const totalCards = cards.length;
                    let intervalId;

                    const slideRight = () => {
                        if (currentIndex < totalCards - 1) {
                            currentIndex++;
                        } else {
                            currentIndex = 0;
                        }
                        scrollToCurrentIndex();
                    };

                    const scrollToCurrentIndex = () => {
                        const cardWidth = cards[currentIndex].offsetWidth;
                        const scrollPosition = currentIndex * cardWidth;
                        cardsWrapper.scrollTo({
                            left: scrollPosition,
                            behavior: 'smooth'
                        });
                    };

                    const startAutoSlide = () => {
                        intervalId = setInterval(() => {
                            slideRight();
                        }, wrapper.interval);
                    };

                    startAutoSlide();

                    cardsWrapper.addEventListener('mousedown', (e) => {
                        isMouseDown = true;
                        startX = e.pageX - cardsWrapper.offsetLeft;
                        clearInterval(intervalId);
                    });

                    cardsWrapper.addEventListener('mousemove', (e) => {
                        if (!isMouseDown) return;
                        e.preventDefault();
                        const x = e.pageX - cardsWrapper.offsetLeft;
                        const walk = (x - startX) * 2;

                        cardsWrapper.scrollLeft = startX - walk;
                    });

                    cardsWrapper.addEventListener('mouseup', () => {
                        isMouseDown = false;
                        const movedIndex = Math.round(cardsWrapper.scrollLeft / cards[0].offsetWidth);
                        currentIndex = Math.min(Math.max(movedIndex, 0), totalCards - 1);
                        scrollToCurrentIndex();
                        startAutoSlide();
                    });

                    cardsWrapper.addEventListener('mouseleave', () => {
                        isMouseDown = false;
                        startAutoSlide();
                    });
                });
            });
        </script>



        <?php include('/xampp/htdocs/cinemamoto/include/foooter.php'); ?>





        <script src="/resources/js/script.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

        <!-- Initialize Swiper -->
        <script>
            var swiper = new Swiper(".mySwiper", {
                slidesPerView: 1,
                spaceBetween: 30,
                loop: true,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
            });
        </script>

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
        <link rel="stylesheet" href="/resources/css/super.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>

        <section>
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


            <div class="swiper mySwiper">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="image">
                            <div class="black">
                                <h1>Avengers: EndGame</h1>
                                <div class="star">
                                    <i class="fa-solid fa-star"></i>
                                    <span class="ratings"> &nbsp;9.8</span>
                                    <span class="separator">|</span>
                                    <span class="quality">HD</span>
                                    <span class="separator">|</span>
                                    <span class="mins"><i class="fa-regular fa-clock"></i> &nbsp;3h 1m</span>
                                    <span class="separator">|</span>
                                    <span class="quality">Action/Sci-fi</span>
                                </div>
                                <p>
                                    Stark steals the Stones and uses them to disintegrate
                                    Thanos and his army, sacrificing himself. After Stark's
                                    funeral, Thor appoints Valkyrie as the new king of New
                                    Asgard and joins the Guardians. Rogers returns the Stones
                                    and Mjolnir to their proper timelines and remains in the
                                    past to live with Carter.
                                </p>
                                <div class="watch">
                                    <button class="playButton play"><i class="bx bx-play"></i></button>
                                    <button class="ticket" onclick="showmodal()">Buy Your Ticket Now</button>
                                </div>
                            </div>
                            <video class="video-item" loop src="/resources/trailer/avengersendgame.mp4"></video>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="image">
                            <div class="black">
                                <h1>Oppenheimer</h1>
                                <div class="star">
                                    <i class="fa-solid fa-star"></i>
                                    <span class="ratings"> &nbsp;9.2</span>
                                    <span class="separator">|</span>
                                    <span class="quality">HD</span>
                                    <span class="separator">|</span>
                                    <span class="mins"><i class="fa-regular fa-clock"></i> &nbsp;3h</span>
                                    <span class="separator">|</span>
                                    <span class="quality">Thriller/Historical drama</span>
                                </div>
                                <p>
                                    During World War II, Lt. Gen. Leslie Groves Jr. appoints physicist J.
                                    Robert Oppenheimer to work on the top-secret Manhattan Project. Oppenheimer
                                    and a team of scientists spend years developing and designing the atomic
                                    bomb. Their work comes to fruition on July 16, 1945, as they witness the
                                    world's first nuclear explosion, forever changing the course of history.
                                </p>

                                <div class="watch">
                                    <button class="playButton play"><i class="bx bx-play"></i></button>
                                    <button class="ticket" onclick="showmodal()">Buy Your Ticket Now</button>
                                </div>
                            </div>
                            <video class="video-item" loop src="/resources/trailer/oppenheimer.mp4"></video>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="image">
                            <div class="black">
                                <h1>Kung Fu Panda 2</h1>
                                <div class="star">
                                    <i class="fa-solid fa-star"></i>
                                    <span class="ratings"> &nbsp;9.6</span>
                                    <span class="separator">|</span>
                                    <span class="quality">HD</span>
                                    <span class="separator">|</span>
                                    <span class="mins"><i class="fa-regular fa-clock"></i> &nbsp;1h 32m</span>
                                    <span class="separator">|</span>
                                    <span class="quality">Family/Comedy</span>
                                </div>
                                <p>
                                    Now known as the Dragon Warrior, Po (Chawalit Simankhongtham) protects
                                    the Valley of Peace alongside his friends and fellow kung fu masters, the
                                    Furious Five. However, a dangerous villain threatens Po's awesome new life
                                    with plans to use a secret weapon to wipe out the martial art and conquer
                                    China.
                                </p>

                                <div class="watch">
                                    <button class="playButton play"><i class="bx bx-play"></i></button>
                                    <button class="ticket" onclick="showmodal()">Buy Your Ticket Now</button>
                                </div>
                            </div>
                            <video class="video-item" loop src="/resources/trailer/kungfupand2.mp4"></video>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="image">
                            <div class="black">
                                <h1>Garfield</h1>
                                <div class="star">
                                    <i class="fa-solid fa-star"></i>
                                    <span class="ratings"> &nbsp;9.4</span>
                                    <span class="separator">|</span>
                                    <span class="quality">HD</span>
                                    <span class="separator">|</span>
                                    <span class="mins"><i class="fa-regular fa-clock"></i> &nbsp;1h 41m</span>
                                    <span class="separator">|</span>
                                    <span class="quality">Family/Comedy</span>
                                </div>
                                <p>
                                    After an unexpected reunion with his long-lost father, the street cat
                                    Vic, Garfield is forced to leave his very comfortable life with Harald
                                    behind. Together with Vic and Odie, he plans a crazy robbery.
                                </p>

                                <div class="watch">
                                    <button class="playButton play"><i class="bx bx-play"></i></button>
                                    <button class="ticket" onclick="showmodal()">Buy Your Ticket Now</button>
                                </div>
                            </div>
                            <video class="video-item" loop src="/resources/trailer/garfield.mp4"></video>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="image">
                            <div class="black">
                                <h1>Inside Out 2</h1>
                                <div class="star">
                                    <i class="fa-solid fa-star"></i>
                                    <span class="ratings"> &nbsp;9.5</span>
                                    <span class="separator">|</span>
                                    <span class="quality">HD</span>
                                    <span class="separator">|</span>
                                    <span class="mins"><i class="fa-regular fa-clock"></i> &nbsp;1h 36m</span>
                                    <span class="separator">|</span>
                                    <span class="quality">Family/Comedy</span>
                                </div>
                                <p>
                                    Joy, Sadness, Anger, Fear and Disgust have been running a
                                    successful operation by all accounts. However, when Anxiety shows up,
                                    they aren't sure how to feel.
                                </p>

                                <div class="watch">
                                    <button class="playButton play"><i class="bx bx-play"></i></button>
                                    <button class="ticket" onclick="showmodal()">Buy Your Ticket Now</button>
                                </div>
                            </div>
                            <video class="video-item" loop src="/resources/trailer/insideout2.mp4"></video>
                        </div>
                    </div>
                </div>

                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </section>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var videos = document.querySelectorAll('.video-item');
                var playButtons = document.querySelectorAll('.playButton');

                function attemptPlay(video) {
                    video.muted = false;
                    video.play().catch(function(error) {
                        console.log('Autoplay failed:', error);
                        video.muted = true;
                        video.play();
                    });
                }

                videos.forEach(function(video) {
                    attemptPlay(video);
                });

                window.addEventListener('scroll', function() {
                    videos.forEach(function(video) {
                        if (window.scrollY > 0) {
                            video.muted = true;
                        }
                    });
                });

                playButtons.forEach(function(button, index) {
                    button.addEventListener('click', function() {
                        var video = videos[index];
                        video.muted = !video.muted;
                    });
                });
            });
        </script>




        <div class="modal <?php echo isset($_GET['error']) || isset($_GET['reg_error']) || isset($_GET['reg_success']) ? 'show' : ''; ?>" id="signInModal">
            <div class="modal-content">
                <span class="close" id="closeModal">&times;</span>
                <div class="form-container <?php echo isset($_GET['reg_error']) || isset($_GET['reg_success']) ? 'active' : ''; ?>">
                    <div class="forms">
                        <!-- Login Form -->
                        <div class="form login">
                            <span class="title">Login</span>
                            <?php if (isset($_GET['error'])) { ?>
                                <p class="error"><?php echo htmlspecialchars($_GET['error']); ?></p>
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
                            <form action="register.php" method="post">
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
            });
        </script>


        <div class="second-movies">
            <div class="latest">
                <h1>Now Showing</h1>
                <div class="box">
                    <div class="cards-wrapper" id="cardWrapper2">

                        <div class="card">
                            <div class="details">
                                <div class="left">
                                    <p class="name">Twister</p>
                                    <div class="date_quality">
                                        <p class="quality">HD</p>
                                        <p class="date">2024</p>
                                    </div>
                                    <div class="info">
                                        <div class="rate">
                                            <i class="fa-solid fa-star"></i>
                                            <p>9.4</p>
                                        </div>
                                        <div class="time">
                                            <i class="fa-regular fa-clock"></i>
                                            <p> &nbsp;1h 57m</p>
                                        </div>
                                    </div>
                                    <p class="category">Action, Adventure, Thriller</p>
                                    <p class="price">₱400.00</p>
                                    <button class="ticket-button" onclick="showModal()">Buy Ticket</button>
                                </div>
                            </div>
                            <img src="/resources/images/movies-portrait/Twisters.PNG" alt="OppenHeimer">
                        </div>

                        <div class="card">
                            <div class="details">
                                <div class="left">
                                    <p class="name">OppenHeimer</p>
                                    <div class="date_quality">
                                        <p class="quality">HD</p>
                                        <p class="date">2023</p>
                                    </div>
                                    <div class="info">
                                        <div class="rate">
                                            <i class="fa-solid fa-star"></i>
                                            <p>9.2</p>
                                        </div>
                                        <div class="time">
                                            <i class="fa-regular fa-clock"></i>
                                            <p> &nbsp;120min</p>
                                        </div>
                                    </div>
                                    <p class="category">Action/Adventure</p>
                                    <p class="price">₱500.00</p>
                                    <button class="ticket-button" onclick="showModal()">Buy Ticket</button>
                                </div>
                            </div>
                            <img src="/resources/images/movies-portrait/Fly me to the moon.PNG" alt="OppenHeimer">
                        </div>

                        <div class="card">
                            <div class="details">
                                <div class="left">
                                    <p class="name">OppenHeimer</p>
                                    <div class="date_quality">
                                        <p class="quality">HD</p>
                                        <p class="date">2023</p>
                                    </div>
                                    <div class="info">
                                        <div class="rate">
                                            <i class="fa-solid fa-star"></i>
                                            <p>9.2</p>
                                        </div>
                                        <div class="time">
                                            <i class="fa-regular fa-clock"></i>
                                            <p> &nbsp;120min</p>
                                        </div>
                                    </div>
                                    <p class="category">Action/Adventure</p>
                                    <p class="price">₱500.00</p>
                                    <button class="ticket-button" onclick="showModal()">Buy Ticket</button>
                                </div>
                            </div>
                            <img src="/resources/images/movies-portrait/HOW TO MAKE MILLION.PNG" alt="OppenHeimer">
                        </div>

                        <div class="card">
                            <div class="details">
                                <div class="left">
                                    <p class="name">OppenHeimer</p>
                                    <div class="date_quality">
                                        <p class="quality">HD</p>
                                        <p class="date">2023</p>
                                    </div>
                                    <div class="info">
                                        <div class="rate">
                                            <i class="fa-solid fa-star"></i>
                                            <p>9.2</p>
                                        </div>
                                        <div class="time">
                                            <i class="fa-regular fa-clock"></i>
                                            <p> &nbsp;120min</p>
                                        </div>
                                    </div>
                                    <p class="category">Action/Adventure</p>
                                    <p class="price">₱500.00</p>
                                    <button class="ticket-button" onclick="showModal()">Buy Ticket</button>
                                </div>
                            </div>
                            <img src="/resources/images/movies-portrait/DOREMON.PNG" alt="OppenHeimer">
                        </div>

                        <div class="card">
                            <div class="details">
                                <div class="left">
                                    <p class="name">OppenHeimer</p>
                                    <div class="date_quality">
                                        <p class="quality">HD</p>
                                        <p class="date">2023</p>
                                    </div>
                                    <div class="info">
                                        <div class="rate">
                                            <i class="fa-solid fa-star"></i>
                                            <p>9.2</p>
                                        </div>
                                        <div class="time">
                                            <i class="fa-regular fa-clock"></i>
                                            <p> &nbsp;120min</p>
                                        </div>
                                    </div>
                                    <p class="category">Action/Adventure</p>
                                    <p class="price">₱500.00</p>
                                    <button class="ticket-button" onclick="showModal()">Buy Ticket</button>
                                </div>
                            </div>
                            <img src="/resources/images/movies-portrait/despicable me 4.png" alt="OppenHeimer">
                        </div>

                        <div class="card">
                            <div class="details">
                                <div class="left">
                                    <p class="name">OppenHeimer</p>
                                    <div class="date_quality">
                                        <p class="quality">HD</p>
                                        <p class="date">2023</p>
                                    </div>
                                    <div class="info">
                                        <div class="rate">
                                            <i class="fa-solid fa-star"></i>
                                            <p>9.2</p>
                                        </div>
                                        <div class="time">
                                            <i class="fa-regular fa-clock"></i>
                                            <p> &nbsp;120min</p>
                                        </div>
                                    </div>
                                    <p class="category">Action/Adventure</p>
                                    <p class="price">₱500.00</p>
                                    <button class="ticket-button" onclick="showModal()">Buy Ticket</button>
                                </div>
                            </div>
                            <img src="/resources/images/movies-portrait/That kind of love.PNG" alt="OppenHeimer">
                        </div>

                        <div class="card">
                            <div class="details">
                                <div class="left">
                                    <p class="name">OppenHeimer</p>
                                    <div class="date_quality">
                                        <p class="quality">HD</p>
                                        <p class="date">2023</p>
                                    </div>
                                    <div class="info">
                                        <div class="rate">
                                            <i class="fa-solid fa-star"></i>
                                            <p>9.2</p>
                                        </div>
                                        <div class="time">
                                            <i class="fa-regular fa-clock"></i>
                                            <p> &nbsp;120min</p>
                                        </div>
                                    </div>
                                    <p class="category">Action/Adventure</p>
                                    <p class="price">₱500.00</p>
                                    <button class="ticket-button" onclick="showModal()">Buy Ticket</button>
                                </div>
                            </div>
                            <img src="/resources/images/movies-portrait/Quiet Place Day one.PNG" alt="OppenHeimer">
                        </div>

                    </div>
                </div>
            </div>
        </div>



        <div class="second-movies">
            <div class="latest">
                <h1>Latest Movie</h1>
                <div class="box">
                    <div class="cards-wrapper" id="cardWrapper1">

                        <div class="card">
                            <div class="details">
                                <div class="left">
                                    <p class="name">OppenHeimer</p>
                                    <div class="date_quality">
                                        <p class="quality">HD</p>
                                        <p class="date">2023</p>
                                    </div>
                                    <div class="info">
                                        <div class="rate">
                                            <i class="fa-solid fa-star"></i>
                                            <p>9.2</p>
                                        </div>
                                        <div class="time">
                                            <i class="fa-regular fa-clock"></i>
                                            <p> &nbsp;120min</p>
                                        </div>
                                    </div>
                                    <p class="category">Action/Adventure</p>
                                    <p class="price">₱500.00</p>
                                    <button class="ticket-button" onclick="showModal()">Buy Ticket</button>
                                </div>
                            </div>
                            <img src="/resources/images/movies-portrait/if.jpg" alt="OppenHeimer">
                        </div>

                        <div class="card">
                            <div class="details">
                                <div class="left">
                                    <p class="name">OppenHeimer</p>
                                    <div class="date_quality">
                                        <p class="quality">HD</p>
                                        <p class="date">2023</p>
                                    </div>
                                    <div class="info">
                                        <div class="rate">
                                            <i class="fa-solid fa-star"></i>
                                            <p>9.2</p>
                                        </div>
                                        <div class="time">
                                            <i class="fa-regular fa-clock"></i>
                                            <p> &nbsp;120min</p>
                                        </div>
                                    </div>
                                    <p class="category">Action/Adventure</p>
                                    <p class="price">₱500.00</p>
                                    <button class="ticket-button" onclick="showModal()">Buy Ticket</button>
                                </div>
                            </div>
                            <img src="/resources/images/movies-portrait/tarot.jpg" alt="OppenHeimer">
                        </div>

                        <div class="card">
                            <div class="details">
                                <div class="left">
                                    <p class="name">OppenHeimer</p>
                                    <div class="date_quality">
                                        <p class="quality">HD</p>
                                        <p class="date">2023</p>
                                    </div>
                                    <div class="info">
                                        <div class="rate">
                                            <i class="fa-solid fa-star"></i>
                                            <p>9.2</p>
                                        </div>
                                        <div class="time">
                                            <i class="fa-regular fa-clock"></i>
                                            <p> &nbsp;120min</p>
                                        </div>
                                    </div>
                                    <p class="category">Action/Adventure</p>
                                    <p class="price">₱500.00</p>
                                    <button class="ticket-button" onclick="showModal()">Buy Ticket</button>
                                </div>
                            </div>
                            <img src="/resources/images/movies-portrait/Monkey_Man_film.jpg" alt="OppenHeimer">
                        </div>

                        <div class="card">
                            <div class="details">
                                <div class="left">
                                    <p class="name">OppenHeimer</p>
                                    <div class="date_quality">
                                        <p class="quality">HD</p>
                                        <p class="date">2023</p>
                                    </div>
                                    <div class="info">
                                        <div class="rate">
                                            <i class="fa-solid fa-star"></i>
                                            <p>9.2</p>
                                        </div>
                                        <div class="time">
                                            <i class="fa-regular fa-clock"></i>
                                            <p> &nbsp;120min</p>
                                        </div>
                                    </div>
                                    <p class="category">Action/Adventure</p>
                                    <p class="price">₱500.00</p>
                                    <button class="ticket-button" onclick="showModal()">Buy Ticket</button>
                                </div>
                            </div>
                            <img src="/resources/images/movies-portrait/trap.jpg" alt="OppenHeimer">
                        </div>

                        <div class="card">
                            <div class="details">
                                <div class="left">
                                    <p class="name">OppenHeimer</p>
                                    <div class="date_quality">
                                        <p class="quality">HD</p>
                                        <p class="date">2023</p>
                                    </div>
                                    <div class="info">
                                        <div class="rate">
                                            <i class="fa-solid fa-star"></i>
                                            <p>9.2</p>
                                        </div>
                                        <div class="time">
                                            <i class="fa-regular fa-clock"></i>
                                            <p> &nbsp;120min</p>
                                        </div>
                                    </div>
                                    <p class="category">Action/Adventure</p>
                                    <p class="price">₱500.00</p>
                                    <button class="ticket-button" onclick="showModal()">Buy Ticket</button>
                                </div>
                            </div>
                            <img src="/resources/images/movies-portrait/RABEL MOON.jpg" alt="OppenHeimer">
                        </div>

                        <div class="card">
                            <div class="details">
                                <div class="left">
                                    <p class="name">OppenHeimer</p>
                                    <div class="date_quality">
                                        <p class="quality">HD</p>
                                        <p class="date">2023</p>
                                    </div>
                                    <div class="info">
                                        <div class="rate">
                                            <i class="fa-solid fa-star"></i>
                                            <p>9.2</p>
                                        </div>
                                        <div class="time">
                                            <i class="fa-regular fa-clock"></i>
                                            <p> &nbsp;120min</p>
                                        </div>
                                    </div>
                                    <p class="category">Action/Adventure</p>
                                    <p class="price">₱500.00</p>
                                    <button class="ticket-button" onclick="showModal()">Buy Ticket</button>
                                </div>
                            </div>
                            <img src="/resources/images/movies-portrait/Megamind.jpg" alt="OppenHeimer">
                        </div>

                        <div class="card">
                            <div class="details">
                                <div class="left">
                                    <p class="name">OppenHeimer</p>
                                    <div class="date_quality">
                                        <p class="quality">HD</p>
                                        <p class="date">2023</p>
                                    </div>
                                    <div class="info">
                                        <div class="rate">
                                            <i class="fa-solid fa-star"></i>
                                            <p>9.2</p>
                                        </div>
                                        <div class="time">
                                            <i class="fa-regular fa-clock"></i>
                                            <p> &nbsp;120min</p>
                                        </div>
                                    </div>
                                    <p class="category">Action/Adventure</p>
                                    <p class="price">₱500.00</p>
                                    <button class="ticket-button" onclick="showModal()">Buy Ticket</button>
                                </div>
                            </div>
                            <img src="/resources/images/movies-portrait/watchers.jpg" alt="OppenHeimer">
                        </div>

                    </div>
                </div>
            </div>
        </div>



        <div class="second-movies">
            <div class="latest">
                <h1>Coming Soon</h1>
                <div class="box">
                    <div class="cards-wrapper" id="cardWrapper3">

                        <div class="card">
                            <div class="details">
                                <div class="left">
                                    <p class="name">Deadpool and wolverine</p>
                                    <div class="date_quality">
                                        <p class="quality">HD</p>
                                        <p class="date">2024</p>
                                    </div>
                                    <div class="info">
                                        <div class="rate">
                                            <i class="fa-solid fa-star"></i>
                                            <p>9.2</p>
                                        </div>
                                        <div class="time">
                                            <i class="fa-regular fa-clock"></i>
                                            <p> &nbsp;2h 7m</p>
                                        </div>
                                    </div>
                                    <p class="category">Action,Comedy Sci-fi</p>
                                    <p class="price">₱400.00</p>
                                    <button class="ticket-button" onclick="showModal()">Buy Ticket</button>
                                </div>
                            </div>
                            <img src="/resources/images/movies-portrait/Deadpool & Wolverine.PNG" alt="OppenHeimer">
                        </div>

                        <div class="card">
                            <div class="details">
                                <div class="left">
                                    <p class="name">OppenHeimer</p>
                                    <div class="date_quality">
                                        <p class="quality">N/A</p>
                                        <p class="date">2023</p>
                                    </div>
                                    <div class="info">
                                        <div class="rate">
                                            <i class="fa-solid fa-star"></i>
                                            <p>9.2</p>
                                        </div>
                                        <div class="time">
                                            <i class="fa-regular fa-clock"></i>
                                            <p> &nbsp;120min</p>
                                        </div>
                                    </div>
                                    <p class="category">Action/Adventure</p>
                                    <p class="price">₱500.00</p>
                                    <button class="ticket-button" onclick="showModal()">Buy Ticket</button>
                                </div>
                            </div>
                            <img src="/resources/images/movies-portrait/Kraven.PNG" alt="OppenHeimer">
                        </div>

                        <div class="card">
                            <div class="details">
                                <div class="left">
                                    <p class="name">OppenHeimer</p>
                                    <div class="date_quality">
                                        <p class="quality">HD</p>
                                        <p class="date">2023</p>
                                    </div>
                                    <div class="info">
                                        <div class="rate">
                                            <i class="fa-solid fa-star"></i>
                                            <p>9.2</p>
                                        </div>
                                        <div class="time">
                                            <i class="fa-regular fa-clock"></i>
                                            <p> &nbsp;120min</p>
                                        </div>
                                    </div>
                                    <p class="category">Action/Adventure</p>
                                    <p class="price">₱500.00</p>
                                    <button class="ticket-button" onclick="showModal()">Buy Ticket</button>
                                </div>
                            </div>
                            <img src="/resources/images/movies-portrait/BORDERLAND.PNG" alt="OppenHeimer">
                        </div>

                        <div class="card">
                            <div class="details">
                                <div class="left">
                                    <p class="name">OppenHeimer</p>
                                    <div class="date_quality">
                                        <p class="quality">N/A</p>
                                        <p class="date">2023</p>
                                    </div>
                                    <div class="info">
                                        <div class="rate">
                                            <i class="fa-solid fa-star"></i>
                                            <p>9.2</p>
                                        </div>
                                        <div class="time">
                                            <i class="fa-regular fa-clock"></i>
                                            <p> &nbsp;120min</p>
                                        </div>
                                    </div>
                                    <p class="category">Action/Adventure</p>
                                    <p class="price">₱500.00</p>
                                    <button class="ticket-button" onclick="showModal()">Buy Ticket</button>
                                </div>
                            </div>
                            <img src="/resources/images/movies-portrait/BORN PINK.PNG" alt="OppenHeimer">
                        </div>

                        <div class="card">
                            <div class="details">
                                <div class="left">
                                    <p class="name">OppenHeimer</p>
                                    <div class="date_quality">
                                        <p class="quality">N/A</p>
                                        <p class="date">2023</p>
                                    </div>
                                    <div class="info">
                                        <div class="rate">
                                            <i class="fa-solid fa-star"></i>
                                            <p>9.2</p>
                                        </div>
                                        <div class="time">
                                            <i class="fa-regular fa-clock"></i>
                                            <p> &nbsp;120min</p>
                                        </div>
                                    </div>
                                    <p class="category">Action/Adventure</p>
                                    <p class="price">₱500.00</p>
                                    <button class="ticket-button" onclick="showModal()">Buy Ticket</button>
                                </div>
                            </div>
                            <img src="/resources/images/movies-portrait/BLUELOCK.PNG" alt="OppenHeimer">
                        </div>

                        <div class="card">
                            <div class="details">
                                <div class="left">
                                    <p class="name">OppenHeimer</p>
                                    <div class="date_quality">
                                        <p class="quality">N/A</p>
                                        <p class="date">2023</p>
                                    </div>
                                    <div class="info">
                                        <div class="rate">
                                            <i class="fa-solid fa-star"></i>
                                            <p>9.2</p>
                                        </div>
                                        <div class="time">
                                            <i class="fa-regular fa-clock"></i>
                                            <p> &nbsp;120min</p>
                                        </div>
                                    </div>
                                    <p class="category">Action/Adventure</p>
                                    <p class="price">₱500.00</p>
                                    <button class="ticket-button" onclick="showModal()">Buy Ticket</button>
                                </div>
                            </div>
                            <img src="/resources/images/movies-portrait/UNHAPPY FOR YOU.PNG" alt="OppenHeimer">
                        </div>

                        <div class="card">
                            <div class="details">
                                <div class="left">
                                    <p class="name">OppenHeimer</p>
                                    <div class="date_quality">
                                        <p class="quality">N/A</p>
                                        <p class="date">2023</p>
                                    </div>
                                    <div class="info">
                                        <div class="rate">
                                            <i class="fa-solid fa-star"></i>
                                            <p>9.2</p>
                                        </div>
                                        <div class="time">
                                            <i class="fa-regular fa-clock"></i>
                                            <p> &nbsp;120min</p>
                                        </div>
                                    </div>
                                    <p class="category">Action/Adventure</p>
                                    <p class="price">₱500.00</p>
                                    <button class="ticket-button" onclick="showModal()">Buy Ticket</button>
                                </div>
                            </div>
                            <img src="/resources/images/movies-portrait/trap.jpg" alt="OppenHeimer">
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const wrappers = [{
                        id: 'cardWrapper1',
                        interval: 7000
                    },
                    {
                        id: 'cardWrapper2',
                        interval: 8000
                    },
                    {
                        id: 'cardWrapper3',
                        interval: 9000
                    }
                ];

                wrappers.forEach(wrapper => {
                    const cardsWrapper = document.getElementById(wrapper.id);
                    const cards = cardsWrapper.querySelectorAll('.card');

                    let startX;
                    let isMouseDown = false;
                    let currentIndex = 0;
                    const totalCards = cards.length;
                    let intervalId;

                    const slideRight = () => {
                        if (currentIndex < totalCards - 1) {
                            currentIndex++;
                        } else {
                            currentIndex = 0;
                        }
                        scrollToCurrentIndex();
                    };

                    const scrollToCurrentIndex = () => {
                        const cardWidth = cards[currentIndex].offsetWidth;
                        const scrollPosition = currentIndex * cardWidth;
                        cardsWrapper.scrollTo({
                            left: scrollPosition,
                            behavior: 'smooth'
                        });
                    };

                    const startAutoSlide = () => {
                        intervalId = setInterval(() => {
                            slideRight();
                        }, wrapper.interval);
                    };

                    startAutoSlide();

                    cardsWrapper.addEventListener('mousedown', (e) => {
                        isMouseDown = true;
                        startX = e.pageX - cardsWrapper.offsetLeft;
                        clearInterval(intervalId);
                    });

                    cardsWrapper.addEventListener('mousemove', (e) => {
                        if (!isMouseDown) return;
                        e.preventDefault();
                        const x = e.pageX - cardsWrapper.offsetLeft;
                        const walk = (x - startX) * 2;

                        cardsWrapper.scrollLeft = startX - walk;
                    });

                    cardsWrapper.addEventListener('mouseup', () => {
                        isMouseDown = false;
                        const movedIndex = Math.round(cardsWrapper.scrollLeft / cards[0].offsetWidth);
                        currentIndex = Math.min(Math.max(movedIndex, 0), totalCards - 1);
                        scrollToCurrentIndex();
                        startAutoSlide();
                    });

                    cardsWrapper.addEventListener('mouseleave', () => {
                        isMouseDown = false;
                        startAutoSlide();
                    });
                });
            });
        </script>



        <?php include('/xampp/htdocs/cinemamoto/include/foooter.php'); ?>

        <script src="/resources/js/script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

        <!-- Initialize Swiper -->
        <script>
            var swiper = new Swiper(".mySwiper", {
                slidesPerView: 1,
                spaceBetween: 30,
                loop: true,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
            });
        </script>

    </body>

    </html>


<?php
}
?>