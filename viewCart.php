<?php
// initializ shopping cart class
include 'includes/header.php';
include 'Cart.php';
$cart = new Cart;
?>

<style>


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

<body>
<div class="container">
    <div class="row">
        <div class="box">
    <h1>Košarica</h1>
    <table class="table">
        <thead>
        <tr>
            <th>Izdelek</th>
            <th>Cena v EUR</th>
            <th>Količina</th>
            <th>Vmesna vsota v EUR</th>
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
                    <td><?php echo $item["cena"]; ?></td>
                    <td><input type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>"
                               onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
                    <td><?php echo $item ["subtotal"] ; ?></td>
                    <td>
                        <!--<a href="cartAction.php?action=updateCartItem&id=" class="btn btn-info"><i class="glyphicon glyphicon-refresh"></i></a>-->
                        <a href="cartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>"
                           class="btn btn-danger" onclick="return confirm('Ste prepričani, da želite odstraniti artikel s seznama?')"><i
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
            <td><a href="izdelki_vsi.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i>
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
</div>
</div>
<?php
include 'includes/footer.php';
?>