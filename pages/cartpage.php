<?php
require __DIR__ . '/../include/bootstrap.php';

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
    <link rel="stylesheet" href="/resources/css/cartpage.css">
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
                form.action = 'logout.php';
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




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
      
    </style>


    <div class="shopping-cart-wrapper">
        <table class="table is-fullwidth shopping-cart">
            <thead>
                <tr>
                    <th><abbr title="Position"></abbr></th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </thead>
        </table>
        <div class="totals">
            <div class="totals-item">
                <label>Subtotal</label>
                <div class="totals-value" id="cart-subtotal">₱ 0</div>
            </div>
            <div class="totals-item">
                <label>Tax (5%)</label>
                <div class="totals-value" id="cart-tax">₱ 0</div>
            </div>
            
            <div class="totals-item totals-item-total">
                <label>Grand Total</label>
                <div class="totals-value" id="cart-total">₱ 0</div>
            </div>
        </div>
        <button class="checkout">Checkout</button>
    </div>


    <script>
        var taxRate = 0.05;
        var shipping = 15.0;
        $(function() {
            var jsonData = [{
                    title: "Popcorn",
                    price: 50,
                    quantity: 1,
                    total: 50
                },
                {
                    title: "Nestea",
                    price: 35,
                    quantity: 1,
                    total: 35
                },
                {
                    title: "Combo 1",
                    price: 140,
                    quantity: 1,
                    total: 140
                },
                {
                    title: "Fries",
                    price: 45,
                    quantity: 1,
                    total: 45
                },
                {
                    title: "Burger",
                    price: 66,
                    quantity: 1,
                    total: 66
                },
                {
                    title: "Betlog",
                    price: 199,
                    quantity: 1,
                    total: 199
                }
            ];
            var html = "<tbody>";
            $.each(jsonData, function() {
                html +=
                    '<tr class="cart-item">' +
                    "        <td>" +
                    '          <input type="checkbox" class="cart-item-check" checked />' +
                    "        </td>" +
                    "        <td>" +
                    "          " +
                    this.title +
                    "        </td>" +
                    "        <td>₱ " +
                    this.price +
                    "</td>" +
                    "        <td>" +
                    '          <input class="input is-primary cart-item-qty" style="width:100px" type="number" min="1" value="' +
                    this.quantity +
                    '" data-price="' +
                    this.price +
                    '">' +
                    "        </td>" +
                    '        <td class="cart-item-total">₱ ' +
                    this.total +
                    "</td>" +
                    "        <td>" +
                    '          <a class="is-small">Remove</a>' +
                    "        </td>" +
                    "      </tr>";
            });
            html += "</tbody>";
            $(".shopping-cart").append(html);

            recalculateCart();

            $(".cart-item-check").change(function() {
                recalculateCart();
            });

            $(".cart-item-qty").change(function() {
                var $this = $(this);
                var parent = $this.parent().parent();
                parent.find(".cart-item-check").prop("checked", "checked");
                var price = $this.attr("data-price");
                var quantity = $this.val();
                var total = price * quantity;
                parent.find(".cart-item-total").html(total.toFixed(2));
                recalculateCart();
            });

            $(".button").click(function() {
                var parent = $(this)
                    .parent()
                    .parent();
                parent.remove();
                recalculateCart();
            });
        });

        function recalculateCart() {
            var subTotal = 0;
            var grandTotal = 0;
            var tax = 0;
            var items = $(".cart-item");
            $.each(items, function() {
                var itemCheck = $(this).find(".cart-item-check");
                var itemQuantity = $(this).find(".cart-item-qty");
                if (itemCheck.prop("checked")) {
                    var itemTotal = itemQuantity.val() * itemQuantity.attr("data-price");
                    subTotal += itemTotal;
                }
            });
            if (subTotal > 0) {
                tax = subTotal * taxRate;
                grandTotal = subTotal + tax + shipping;
                $(".totals,.checkout").show();
            } else {
                $(".totals,.checkout").hide();
            }
            $("#cart-subtotal").html(subTotal.toFixed(2));
            $("#cart-total").html(grandTotal.toFixed(2));
            $("#cart-tax").html(tax.toFixed(2));
        }
    </script>






















    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>
    <script src="/resources/js/script.js"></script>
</body>

</html>