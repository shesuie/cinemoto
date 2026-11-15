document.getElementById('searchIcon').addEventListener('click', function(event) {
    var searchBox = document.getElementById('searchBox');
    searchBox.classList.toggle('show');
    event.stopPropagation(); // Prevents the click event from propagating further
});

// Function to close search box when clicking outside of it
document.addEventListener('click', function(event) {
    var searchBox = document.getElementById('searchBox');
    var targetElement = event.target; // Clicked element

    if (!searchBox.contains(targetElement)) {
        // Clicked outside the search box
        searchBox.classList.remove('show');
        var input = document.getElementById('searchInput');
        input.value = ''; // Clear input
    }
});
document.addEventListener('DOMContentLoaded', function() {
    const menuIcon = document.getElementById('menuIcon');
    const closeIcon = document.getElementById('closeIcon');
    const navbar = document.getElementById('navbar');

    // Check local storage to see if navbar should be active
    if (localStorage.getItem('navbarActive') === 'true') {
        navbar.classList.add('active');
        console.log('Navbar is active based on local storage');
    } else {
        console.log('Navbar is not active based on local storage');
    }

    // Function to toggle navbar visibility
    menuIcon.addEventListener('click', function() {
        navbar.classList.toggle('active');
        localStorage.setItem('navbarActive', navbar.classList.contains('active'));
        console.log('Navbar active state after menu click:', navbar.classList.contains('active'));
    });

    closeIcon.addEventListener('click', function() {
        navbar.classList.remove('active');
        localStorage.setItem('navbarActive', 'false');
        console.log('Navbar active state after close click:', navbar.classList.contains('active'));
    });
});



document.addEventListener("DOMContentLoaded", function() {
    const trailerButton = document.getElementById("trailer");
    const modal = document.getElementById("movie-modal");
    const closeModal = document.getElementById("close-modal");
    const video = document.getElementById("movie-video");
    const modalMovie = document.querySelector(".modal-movie");

    const closeVideoModal = () => {
        modal.classList.remove("active");
        modalMovie.classList.remove("show");
        video.pause();
        video.currentTime = 0;
    };

    trailerButton.addEventListener("click", function() {
        modal.classList.add("active");
        modalMovie.classList.add("show");
        video.play();
    });

    closeModal.addEventListener("click", closeVideoModal);

    window.addEventListener("click", function(event) {
        if (event.target === modal) {
            closeVideoModal();
        }
    });
});
