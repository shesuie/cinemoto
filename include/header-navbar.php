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
            <button class="button-56" role="button">SignIn</button>
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


<style>
    header {
        background-color: var(--header-color);
        color: #fff;
        padding: 25px 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 30px;
    }

    .long {
        display: flex;
        align-items: center;
        width: 100%;
    }

    .icon {
        display: flex;
        align-items: center;
        cursor: pointer;
        font-size: 36px;
    }

    .menu {
        display: flex;
        align-items: center;
        margin-left: 20px;
    }

    .menu img {
        width: 40px;
        height: 40px;
    }

    .header_name {
        color: #fff;
        text-decoration: none;
        font-size: 24px;
        margin-left: 10px;
    }

    .header__search {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 50px;
        position: relative;
        background-color: var(--blue-color);
        border-radius: 5px;
        padding: 5px 20px;
        transition: width 0.3s ease;
        overflow: hidden;
        width: 0;
        margin-left: auto;
    }

    .header__search input {
        background: transparent;
        border: none;
        outline: none;
        color: var(--white-color);
        font-size: 16px;
        font-weight: bold;
        margin-right: 5px;
        width: 250px;
        transition: opacity 0.3s ease;
        opacity: 0;
    }

    .header__search input::placeholder {
        color: var(--white-color);
    }

    .header__search i {
        color: var(--white-color);
        font-size: 35px;
        cursor: pointer;
        margin-right: 40px;
    }

    .header__search.show {
        width: 300px;
    }

    .header__search.show input {
        opacity: 1;
    }


    /* CSS */
    .button-56 {
        align-items: center;
        background-color: var(--blue-color);
        border: 2px solid var(--white-color);
        border-radius: 8px;
        box-sizing: border-box;
        color: var(--white-color);
        cursor: pointer;
        display: flex;
        font-family: Inter, sans-serif;
        font-size: 24px;
        font-weight: bold;
        height: 48px;
        justify-content: center;
        line-height: 24px;
        max-width: 100%;
        padding: 0 25px;
        position: relative;
        text-align: center;
        text-decoration: none;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
    }

    .button-56:after {
        background-color: var(--blue-color);
        border-radius: 8px;
        content: "";
        display: block;
        height: 48px;
        left: 0;
        width: 100%;
        position: absolute;
        top: -2px;
        transform: translate(8px, 8px);
        transition: transform .2s ease-out;
        z-index: -1;
    }

    .button-56:hover:after {
        transform: translate(0, 0);
    }

    .button-56:active {
        background-color: var(--darkenblue-color);
        outline: 0;
    }

    .button-56:hover {
        outline: 0;
    }



    /* Sidebar styles */
    .navbar {

        position: fixed;
        left: -270px;
        top: 0;
        height: 100%;
        width: 270px;
        background-color: var(--bg-color);
        color: #fff;
        overflow-y: auto;
        padding-top: 25px;
        transition: left 0.3s ease;
        z-index: 12;
    }

    .navbar.active {
        left: 0;
        /* Slide the navbar in when active */

    }

    .nav-container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .nav-logo {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 15px;
        border-bottom: 1px solid var(--white-color);
    }

    .nav-logo img {
        width: 40px;
        height: 40px;
    }

    .nav-logo .icon {
        margin-right: 10px;
    }

    .nav-logo .header_name {
        color: var(--white-color);
        text-decoration: none;
        font-size: 20px;
    }

    .nav-list {
        width: 100%;
        padding-top: 50px;
    }

    .nav-link {
        display: flex;
        align-items: center;
        padding: 25px;
        margin-bottom: 10px;
        text-decoration: none;
        color: var(--white-color);
        transition: background-color 0.3s ease;
    }

    .nav-link:hover {
        background-color: #31363F;
        color: white;
    }

    .nav-icon {
        margin-right: 10px;
        font-size: 30px;
    }

    .nav-name {
        font-size: 18px;
    }
</style>