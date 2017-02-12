<?php
// initializ shopping cart class

include 'Cart.php';
$cart = new Cart;
?>
<!DOCTYPE html>
<html lang="si">
<head>
    <title>View Cart - PHP Shopping Cart Tutorial</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .container {
            padding: 50px;
        }

        input[type="number"] {
            width: 20%;
        }
    </style>
    <script>
        function updateCartItem(obj, id) {
            $.get("cartAction.php", {action: "updateCartItem", id: id, qty: obj.value}, function (data) {
                if (data == 'ok') {
                    location.reload();
                } else {
                    alert('Cart update failed, please try again.');
                }
            });
        }
    </script>
</head>
</head>
<body>
<div class="container">
    <h1>Shopping Cart</h1>
    <table class="table">
        <thead>
        <tr>
            <th>Izdelek</th>
            <th>Cena</th>
            <th>Količina</th>
            <th>Vmesna vsota</th>
            <th>&nbsp;</th>
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
                    <td><?php echo $item["cena"] . ' EUR'; ?></td>
                    <td><input type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>"
                               onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
                    <td><?php echo $item["subtotal"] . ' EUR'; ?></td>
                    <td>
                        <!--<a href="cartAction.php?action=updateCartItem&id=" class="btn btn-info"><i class="glyphicon glyphicon-refresh"></i></a>-->
                        <a href="cartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>"
                           class="btn btn-danger" onclick="return confirm('Are you sure?')"><i
                                class="glyphicon glyphicon-trash"></i></a>
                    </td>
                </tr>
            <?php }
        }else{ ?>
        <tr>
            <td colspan="5"><p>Vaša košarica je prazna....</p></td>
            <?php } ?>
        </tbody>
        <tfoot>
        <tr>
            <td><a href="../izdelki_vsi.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i>
                    Nadaljujte z nakupom</a></td>
            <td colspan="2"></td>
            <?php if ($cart->total_items() > 0) { ?>
                <td class="text-center"><strong>Skupaj <?php echo $cart->total() . ' EUR'; ?></strong></td>
                <td><a href="checkout.php" class="btn btn-success btn-block">Na blagajno <i
                            class="glyphicon glyphicon-menu-right"></i></a></td>
            <?php } ?>
        </tr>
        </tfoot>
    </table>
</div>
</body>
</html>
