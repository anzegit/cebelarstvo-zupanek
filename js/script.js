// highlight current day on opeining hours
$(document).ready(function () {
    $('.opening-hours li').eq(new Date().getDay()).addClass('today');
});


function updateCartItem(obj, id) {
    $.get("cartAction.php", {action: "updateCartItem", id: id, qty: obj.value}, function (data) {
        if (data == 'ok') {
            location.reload();
        } else {
            alert('Cart update failed, please try again.');
        }
    });
}
