<?php include('/xampp/htdocs/cinemamoto/include/movies-con.php'); ?>


<div class="moviess-container">

    <div class="image-cover">

        <img src="/resources/images/movies-landscape/twister-land.jpg" alt="image">
        <div class="detailes">
            <img src="/resources/images/movies-portrait/Twisters.PNG" alt="image">
            <div class="information">
                <h1>Twister</h1>
                <h3 class="price">₱370.00</h3>
                <div class="row">
                    <span class="ratings"><i class="fa-solid fa-star"></i> 9.7</span>
                    <span class="seperator">|</span>
                    <span class="mins"><i class="fa-regular fa-clock"></i>&nbsp;&nbsp;1h 57m</span>
                    <span class="seperator">|</span>
                    <button class="trailer" id="trailer">Watch Trailer</button>
                </div>
                <div class="down">
                    <h2>Overview:</h2>
                    <p>A retired tornado-chaser and meteorologist is persuaded to return
                        to Oklahoma to work with a new team and new technologies.
                    </p>

                    <div class="list-left">
                        <h3 class="text"><b>MTRCB Rating:</b>&nbsp;&nbsp;<span class="rated">R-13</span></h3>
                        <h3 class="text"><b>Released:</b> &nbsp;&nbsp;2024</h3>
                        <h3 class="text"><b>Genre:</b>&nbsp; &nbsp;Action, Adventure, Thriller</h3>
                        <h3 class="text"><b>Type of Movie:</b>&nbsp;&nbsp; 3D | HD</h3>
                    </div>
                    <div class="list-right">
                        <h3 class="text"><b>Director:</b>&nbsp;&nbsp; Lee Isaac Chung</h3>
                        <h3 class="text"><b>Cast:</b>&nbsp;&nbsp; Daisy Edgar-Jones, Glen </h3>
                        <h3 class="text"><b>Duration:</b> &nbsp;&nbsp; 1h 57m</h3>
                        <h3 class="text"><b>Country:</b>&nbsp;&nbsp; United States</h3>
                    </div>

                    <div class="down-selection">
                        <div class="selection-pair">
                            <label for="location">Location:</label>
                            <select id="location">
                                <option selected disabled>Select Location</option>
                                <option value="Alabang">Cinemo'to Alabang</option>
                                <option value="Caloocan">Cinemo'to Caloocan</option>
                                <option value="Marikina">Cinemo'to Marikina</option>
                                <option value="Makati">Cinemo'to Makati</option>
                                <option value="Malabon">Cinemo'to Malabon</option>
                                <option value="Valenzuela">Cinemo'to Valenzuela</option>
                            </select>
                        </div>

                        <div class="selection-pair">
                            <label for="date">Date:</label>
                            <select id="date">
                                <option selected disabled>-</option>
                            </select>
                        </div>

                        <div class="selection-pair">
                            <label for="time">Time:</label>
                            <select id="time">
                                <option selected disabled>-</option>
                            </select>
                        </div>

                        <div class="selection-pair">
                            <label for="type">Type:</label>
                            <select id="type">
                                <option selected disabled>-</option>
                            </select>
                        </div>

                        <div class="selection-pair">
                            <label for="type">Select Seat</label>
                            <select id="type">
                                <option selected disabled>- Select Seat -</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="movie-trailer" id="movie-modal">
    <div class="modal-movie">
        <span class="close" id="close-modal"><i class='bx bx-x'></i></span>
        <video id="movie-video" controls>
            <source src="/resources/trailer/avengersendgame.mp4" type="video/mp4">
        </video>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const locationSelect = document.getElementById('location');
        const dateSelect = document.getElementById('date');
        const timeSelect = document.getElementById('time');
        const typeSelect = document.getElementById('type');
        const seatBookingContainer = document.querySelector('.container-seat-booking');
        const screenTime = document.getElementById('bookingTime');
        const seats = document.querySelectorAll('.seat:not(.occupied)');


        const locationOptions = {
            "Alabang": {
                dates: ["2024-07-17", "2024-07-18", "2024-07-19"],
                times: ["8:00 AM", "10:00 AM", "12:00 PM", "3:00 PM", "5:00 PM"],
                types: ["2D", "3D"]
            },
            "Caloocan": {
                dates: ["2024-07-18", "2024-07-19"],
                times: ["1:00 PM", "3:00 PM", "5:00 PM", "8:00 PM"],
                types: ["2D"]
            },
            "Marikina": {
                dates: ["2024-07-12", "2024-07-13", "2024-07-14"],
                times: ["12:00 PM", "2:00 PM", "4:00 PM", "6:00 PM", "8:00 PM"],
                types: ["2D", "3D"]
            },
            "Makati": {
                dates: ["2024-07-12", "2024-07-13", "2024-07-14"],
                times: ["12:00 PM", "2:00 PM", "4:00 PM", "6:00 PM", "8:00 PM"],
                types: ["2D"]
            },
            "Malabon": {
                dates: ["2024-07-12", "2024-07-13", "2024-07-14"],
                times: ["12:00 PM", "2:00 PM", "4:00 PM", "6:00 PM", "8:00 PM"],
                types: ["2D"]
            },
            "Valenzuela": {
                dates: ["2024-07-12", "2024-07-13", "2024-07-14"],
                times: ["12:00 PM", "2:00 PM", "4:00 PM", "6:00 PM", "8:00 PM"],
                types: ["2D"]
            },
        };

        function updateOptions() {
            const selectedLocation = locationSelect.value;
            const locationData = locationOptions[selectedLocation];

            dateSelect.innerHTML = '<option selected disabled>- Select Date -</option>';
            locationData.dates.forEach(date => {
                const option = document.createElement('option');
                option.value = date;
                option.textContent = new Date(date).toLocaleDateString('en-US', {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });
                dateSelect.appendChild(option);
            });

            timeSelect.innerHTML = '<option selected disabled>- Select Time -</option>';
            locationData.times.forEach(time => {
                const option = document.createElement('option');
                option.textContent = time;
                timeSelect.appendChild(option);
            });

            typeSelect.innerHTML = '<option selected disabled>- Select Type -</option>';
            locationData.types.forEach(type => {
                const option = document.createElement('option');
                option.textContent = type;
                typeSelect.appendChild(option);
            });
        }

        function checkSelections() {
            if (locationSelect.value && dateSelect.value && timeSelect.value && typeSelect.value) {
                const selectedTime = timeSelect.value;
                screenTime.textContent = selectedTime;
                seatBookingContainer.style.display = 'block';
                generateSeats(); // Implement this function to generate seat rows
            } else {
                seatBookingContainer.style.display = 'none';
            }
        }



        locationSelect.addEventListener('change', updateOptions);
        dateSelect.addEventListener('change', checkSelections);
        timeSelect.addEventListener('change', checkSelections);
        typeSelect.addEventListener('change', checkSelections);

        seats.forEach(seat => {
            seat.addEventListener('click', () => {
                seat.classList.toggle('selected');
            });
        });
    });
</script>







<div class="container-seat-booking" style="display: none;">
    <h1>Cinema Seat Booking</h1>
    <div class="screen">Movie Screen - <span id="bookingTime"></span></div>
    <div class="seats">
        <div class="row1">
            <h2 class="seatnumber">A</h2>
            <div class="seat"><i class='bx bx-chair'>A1</i></div>
            <div class="seat"><i class='bx bx-chair'>A2</i></div>
            <div class="seat"><i class='bx bx-chair'>A3</i></div>
            <div class="seat occupied"><i class='bx bx-chair'>A4</i></div>
            <div class="seat"><i class='bx bx-chair'>A5</i></div>
            <div class="seat occupied"><i class='bx bx-chair'>A6</i></div>

            <div class="seat"><i class='bx bx-chair'>A7</i></div>
            <div class="seat occupied"><i class='bx bx-chair'>A8</i></div>
            <div class="seat"><i class='bx bx-chair'>A9</i></div>
            <div class="seat"><i class='bx bx-chair'>A10</i></div>
            <div class="seat"><i class='bx bx-chair'>A11</i></div>
            <div class="seat occupied"><i class='bx bx-chair'>A12</i></div>
        </div>
        <div class="row2">
            <h2 class="seatnumber">B</h2>
            <div class="seat"><i class='bx bx-chair'>B1</i></div>
            <div class="seat"><i class='bx bx-chair'>B2</i></div>
            <div class="seat occupied"><i class='bx bx-chair'>B3</i></div>
            <div class="seat"><i class='bx bx-chair'>B4</i></div>
            <div class="seat"><i class='bx bx-chair'>B5</i></div>
            <div class="seat occupied"><i class='bx bx-chair'>B6</i></div>

            <div class="seat"><i class='bx bx-chair'>B7</i></div>
            <div class="seat occupied"><i class='bx bx-chair'>B8</i></div>
            <div class="seat"><i class='bx bx-chair'>B9</i></div>
            <div class="seat"><i class='bx bx-chair'>B10</i></div>
            <div class="seat"><i class='bx bx-chair'>B11</i></div>
            <div class="seat occupied"><i class='bx bx-chair'>B12</i></div>
        </div>
        <div class="row3">
            <h2 class="seatnumber">C</h2>
            <div class="seat"><i class='bx bx-chair'>C1</i></div>
            <div class="seat"><i class='bx bx-chair'>C2</i></div>
            <div class="seat occupied"><i class='bx bx-chair'>C3</i></div>
            <div class="seat"><i class='bx bx-chair'>C4</i></div>
            <div class="seat"><i class='bx bx-chair'>C5</i></div>
            <div class="seat occupied"><i class='bx bx-chair'>C6</i></div>

            <div class="seat"><i class='bx bx-chair'>C7</i></div>
            <div class="seat occupied"><i class='bx bx-chair'>C8</i></div>
            <div class="seat"><i class='bx bx-chair'>C9</i></div>
            <div class="seat"><i class='bx bx-chair'>C10</i></div>
            <div class="seat"><i class='bx bx-chair'>C11</i></div>
            <div class="seat occupied"><i class='bx bx-chair'>C12</i></div>
        </div>
        <div class="row4">
            <h2 class="seatnumber">D</h2>
            <div class="seat"><i class='bx bx-chair'>D1</i></div>
            <div class="seat occupied"><i class='bx bx-chair'>D2</i></div>
            <div class="seat"><i class='bx bx-chair'>D3</i></div>
            <div class="seat"><i class='bx bx-chair'>D4</i></div>
            <div class="seat"><i class='bx bx-chair'>D5</i></div>
            <div class="seat occupied"><i class='bx bx-chair'>D6</i></div>

            <div class="seat"><i class='bx bx-chair'>D7</i></div>
            <div class="seat occupied"><i class='bx bx-chair'>D8</i></div>
            <div class="seat"><i class='bx bx-chair'>D9</i></div>
            <div class="seat"><i class='bx bx-chair'>D10</i></div>
            <div class="seat"><i class='bx bx-chair'>D11</i></div>
            <div class="seat occupied"><i class='bx bx-chair'>D12</i></div>
        </div>
        <div class="row5">
            <h2 class="seatnumber">E</h2>
            <div class="seat"><i class='bx bx-chair'>E1</i></div>
            <div class="seat occupied"><i class='bx bx-chair'>E2</i></div>
            <div class="seat"><i class='bx bx-chair'>E3</i></div>
            <div class="seat"><i class='bx bx-chair'>E4</i></div>
            <div class="seat"><i class='bx bx-chair'>E5</i></div>
            <div class="seat occupied"><i class='bx bx-chair'>E6</i></div>

            <div class="seat"><i class='bx bx-chair'>E7</i></div>
            <div class="seat occupied"><i class='bx bx-chair'>E8</i></div>
            <div class="seat"><i class='bx bx-chair'>E9</i></div>
            <div class="seat"><i class='bx bx-chair'>E10</i></div>
            <div class="seat"><i class='bx bx-chair'>E11</i></div>
            <div class="seat occupied"><i class='bx bx-chair'>E12</i></div>
        </div>
    </div>
    <div class="legend">
        <div class="legend-item">
            <div class="seat"><i class='bx bx-chair'></i></div>
            <span>Available</span>
        </div>
        <div class="legend-item">
            <div class="seat selected"><i class='bx bx-chair'></i></div>
            <span>Selected</span>
        </div>
        <div class="legend-item">
            <div class="seat occupied"><i class='bx bx-chair'></i></div>
            <span>Occupied</span>
        </div>
    </div>
    <button class="proceed">View Receipt</button>




    <div class="payment-summary" style="display: none;">
        <h1>Payment Receipt</h1>
        <div class="payment-details">
            <h3 class="book-date">July 20, 2024</h3>
            <h3 class="title-movie">(2D)Despicable Me 4</h3>
            <h3 class="date">July 6, 2024</h3>
            <h3 class="seats">7:30 PM Reserved Seating</h3>
            <h3 class="seat-num">D07,</h3>
            <h3 class="payment-price">1x 300.00 php</h3>
            <h3 class="food-price">Popcorn 1x 100.00 php</h3>
            <span class="total-price">Total Price: 320.00 php</span>
        </div>
        <div class="barcode">
            <canvas id="barcode"></canvas>
        </div>
    </div>
</div>


<script>
    window.onload = function() {
        JsBarcode("#barcode", "D07", {
            format: "CODE128",
            lineColor: "#000",
            width: 2,
            height: 100,
            displayValue: true
        });
    }
</script>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cardsWrapper = document.getElementById('cardsWrapper');
        const cards = cardsWrapper.querySelectorAll('.card');
        const iconLeft = document.querySelector('.icon-left');
        const iconRight = document.querySelector('.icon-right');

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


        const slideLeft = () => {
            if (currentIndex > 0) {
                currentIndex--;
            } else {
                currentIndex = totalCards - 1;
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
            }, 2000);
        };


        startAutoSlide();


        iconLeft.addEventListener('click', () => {
            slideLeft();
            clearInterval(intervalId);
        });

        iconRight.addEventListener('click', () => {
            slideRight();
            clearInterval(intervalId);
        });


        cardsWrapper.addEventListener('mouseenter', () => {
            clearInterval(intervalId);
        });


        cardsWrapper.addEventListener('mouseleave', () => {
            startAutoSlide();
        });
    });
</script>

<?php include('/xampp/htdocs/cinemamoto/include/foooter.php'); ?>



<?php include('/xampp/htdocs/cinemamoto/include/movies-footer.php'); ?>