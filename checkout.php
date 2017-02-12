<?php
include_once 'includes/header.php';

// include database configuration file
//include 'includes/db.php';

// initializ shopping cart class
include 'Cart.php';
$cart = new Cart;

// redirect to home if cart is empty
if ($cart->total_items() <= 0) {
    header("Location: index.php");
}

// set customer ID in session
$_SESSION['sessCustomerID'] = 1;

// get customer details by session customer ID
$query = $db->query("SELECT * FROM customers WHERE id = " . $_SESSION['sessCustomerID']);
$custRow = $query->fetch_assoc();
?>


    <style>

        .table {
            width: 65%;
            float: left;
            text-align: center;
        }



        .shipAddr {
            width: 30%;
            float: right;
            margin-left: 30px;
        }

        .footBtn {
            width: 95%;
            float: left;
        }

        .orderBtn {
            float: right;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="box">
    <h1>Predogled naročila</h1>
    <table class="table">
        <thead>
        <tr>
            <th>Izdelek</th>
            <th>Cena v EUR</th>
            <th>Količina</th>
            <th>Vmesna vsota</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if ($cart->total_items() > 0){
            //get cart items from session
            $cartItems = $cart->contents();

            foreach ($cartItems as $item) {
                ?>
                <tr>
                    <td><?php echo $item["naziv"]; ?></td>
                    <td><?php echo $item["cena"]; ?></td>
                    <td><?php echo $item["qty"]; ?></td>
                    <td><?php echo $item["subtotal"] . ' EUR'; ?></td>
                </tr>
            <?php }
        }else{ ?>
        <tr>
            <td colspan="4"><p>Vaš seznam je prazen......</p></td>
            <?php } ?>
        </tbody>
        <tfoot>
        <tr>
            <td colspan="3"></td>
            <?php if ($cart->total_items() > 0) { ?>
                <td class="text-center"><strong>Skupaj <?php echo $cart->total() . ' EUR'; ?></strong></td>
            <?php } ?>
        </tr>
        </tfoot>
    </table>
    <div class="shipAddr">
        <h4>Podatki o naročniku</h4>
        <p><?php echo $custRow['name']; ?></p>
        <p><?php echo $custRow['email']; ?></p>
        <p><?php echo $custRow['phone']; ?></p>
        <p><?php echo $custRow['address']; ?></p>
    </div>
    <div class="footBtn">
        <a href="izdelki_vsi.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Nazaj na artikle</a>
        <a href="cartAction.php?action=placeOrder" class="btn btn-success orderBtn">Oddaj naročilo <i
                class="glyphicon glyphicon-menu-right"></i></a>
    </div>
</div>
    </div>
</div>

<?php
    include_once 'includes/footer.php';
?>