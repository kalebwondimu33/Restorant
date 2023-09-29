<?php
include("../admin/config/config.php");
session_start();
if(isset($_SESSION['order'])){
    echo $_SESSION['order'];
    unset($_SESSION['order']);
}
if(isset($_SESSION['orderStatus'])){
    echo $_SESSION['orderStatus'];
    unset($_SESSION['orderStatus']);
}
// Initialize the cart session variable if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Handle adding an item to the cart
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $_SESSION['id']=$id;
    $sql = "SELECT * FROM menu WHERE id=$id";
    $res = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($res);

    if ($row) {
        $item = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'image' => $row['image'],
            'price' => $row['price'],
            'quantity' => 1
        );

        //Check if the item is already in the cart, and if so, update the quantity
        if (array_key_exists($id, $_SESSION['cart'])) {
            $_SESSION['cart'][$id]['quantity']++;
        } else {
            $_SESSION['cart'][$id] = $item;
        }
    }
}

// Handle removing an item from the cart
if (isset($_GET['remove_id'])) {
    $remove_id = $_GET['remove_id'];
    if (array_key_exists($remove_id, $_SESSION['cart'])) {
        unset($_SESSION['cart'][$remove_id]);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
    <link rel="stylesheet" href="../css/cart.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body>
<div class="container">
    <div class="title">
    <h1 >Cart</h1>
    </div>
    <div class="header-title">
        <ul class="titles">
            <li class="img-titile">Image</li>
            <li class="name-title"> Name</li>
            <li class="price-title">Price</li>
            <li class="price-quantity">Quantity</li>
            <li class="total-price">Total</li>
        </ul>
    </div>
    <?php
    // Display items in the cart
    if (!empty($_SESSION['cart'])) {
        $grandTotal = 0; // Initialize the grand total outside the loop
        foreach ($_SESSION['cart'] as $id => $cartItem) {
            // Display individual product information
            ?>
            <div class="item">
                <div class="image">
                    <img src="<?php echo $cartItem['image']; ?>" alt="food image">
                </div>
                <div class="name"><?php echo $cartItem['name']; ?></div>
                <div class="delete"><a href="?remove_id=<?php echo $id; ?>"><ion-icon class="icon-delete" name="close-outline"></ion-icon></a></div>
                <div class="price"><?php echo $cartItem['price']; ?></div>
                <div class="quantity">
                    <div class="quantity-controls">
                        <!-- Replace links with buttons -->
                        <button class="decrement" data-id="<?php echo $id; ?>">-</button>
                        <span class="quantity-value"><?php echo $cartItem['quantity']; ?></span>
                        <button class="increment" data-id="<?php echo $id; ?>">+</button>
                    </div>
                </div>
                <!-- Display individual product total -->
                <div class="item-total" id="itemTotal_<?php echo $id; ?>">
                    <?php echo number_format($cartItem['price'] * $cartItem['quantity'], 2); ?> Birr
                </div>
            </div>
            <?php
            // Calculate the individual product total and add to the grand total
            $productTotal = $cartItem['price'] * $cartItem['quantity'];
            $grandTotal += $productTotal;
        }
        // Display the grand total at the bottom
        ?>
        <div class="total">Grand Total: <span id="totalAmount"><?php echo number_format($grandTotal, 2); ?></span> Birr</div>
       
       
        <?php
    } else {
        echo 'Your cart <a class="order-button" href="http://localhost/onlineRestorant/front/menu.php">Menu</a> is empty.';
    }
    ?>

</div>

<!-- ... Your HTML code ... -->
<form  method="post">
    <!-- Loop through the cart items to include each item's information -->
    <?php foreach ($_SESSION['cart'] as $id => $cartItem) { ?>
        <input type="hidden" name="items[<?php echo $id; ?>][name]" value="<?php echo $cartItem['name']; ?>">
        <input type="hidden" name="items[<?php echo $id; ?>][image]" value="<?php echo $cartItem['image']; ?>">
        <input type="hidden" name="items[<?php echo $id; ?>][price]" value="<?php echo $cartItem['price']; ?>">
        <input type="hidden" name="items[<?php echo $id; ?>][quantity]" value="<?php echo $cartItem['quantity']; ?>">
        <input type="hidden" name="items[<?php echo $id; ?>][total]" value="<?php echo $cartItem['price'] * $cartItem['quantity']; ?>">
    <?php } ?>

    <!-- Include the grand total as a hidden input field -->
    <input type="hidden" name="grand_total" value="<?php echo $grandTotal; ?>">
     
    <!-- Add a submit button to submit the form -->
    <div class="btn-order">
    <!-- <input class="order-button " name="checkout" type="submit" value="Proceed to Checkout" > -->
    <button name="checkout" class="order-button"><a class="ancor"  href="http://localhost/onlineRestorant/front/customer_info.php">Proceed to Checkout</a>
</button>
    </div>
</form>



<script>
    // JavaScript code for increment and decrement buttons
    const decrementButtons = document.querySelectorAll('.decrement');
    const incrementButtons = document.querySelectorAll('.increment');
    const quantityValues = document.querySelectorAll('.quantity-value');
    const priceElements = document.querySelectorAll('.price');
    const itemTotalElements = document.querySelectorAll('.item-total');

    decrementButtons.forEach((button, index) => {
        button.addEventListener('click', () => {
            const id = button.getAttribute('data-id');
            const currentValue = parseInt(quantityValues[index].textContent);
            if (currentValue > 1) {
                quantityValues[index].textContent = currentValue - 1;
                updateTotal(id, index);
            }
        });
    });

    incrementButtons.forEach((button, index) => {
        button.addEventListener('click', () => {
            const id = button.getAttribute('data-id');
            const currentValue = parseInt(quantityValues[index].textContent);
            quantityValues[index].textContent = currentValue + 1;
            updateTotal(id, index);
        });
    });

    function updateTotal(id, index) {
        const price = parseFloat(priceElements[index].textContent);
        const quantity = parseInt(quantityValues[index].textContent);
        const total = price * quantity;
        itemTotalElements[index].textContent = '$' + total.toFixed(2);
        
        // Recalculate the grand total
        let grandTotal = 0;
        itemTotalElements.forEach(itemTotal => {
            grandTotal += parseFloat(itemTotal.textContent.replace('$', ''));
        });
        
        document.getElementById('totalAmount').textContent =  + grandTotal.toFixed(2);
    }

    // Initial total calculation
    updateTotal();
</script>

</body>
</html>
