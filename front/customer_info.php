<?php
include("../admin/config/config.php");

session_start();

 // Start the session (if not already started)

// Check if there are cart items in the session
    // Check if the form was submitted with the name "order"
    if (isset($_POST['order'])) {
        $fname = $_POST['firstName'];
        $lname = $_POST['lastName'];
        $phone = $_POST['phoneNumber']; // Assign the value from the form
        $address = $_POST['address'];

        // Insert customer information into the "customer" table
        $sql = "INSERT INTO customer (fname, lname, phone, address) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "ssss", $fname, $lname, $phone, $address);
        $res = mysqli_stmt_execute($stmt);

        if ($res) {
            $customerId = mysqli_insert_id($con);
            $_SESSION['customer_id'] = $customerId;
            
            if (!empty($_SESSION['cart'])) {
                $grandTotal=0;
                foreach ($_SESSION['cart'] as $id => $cartItem) {
                    // Access cart item details using $cartItem['name'], $cartItem['price'], etc.
                    $itemName = $cartItem['name'];
                    $itemPrice = $cartItem['price'];
                    $itemQuantity = $cartItem['quantity'];
                    $itemImage=$cartItem['image'];
                    $itemTotal=$itemPrice*$itemQuantity;
                   
                    $count=1;
                        
                    $grandTotal+=$itemTotal;
                 

                    // Store the grand total in the session
                    
                    
                    // Perform any processing or display logic you need here.
                    // For example, you can echo out the details or calculate a subtotal.
                    echo "Item: $itemName | Price: $itemPrice | Quantity: $itemQuantity<br>";
                    $sql = "INSERT INTO orders (customer_id, item_name, item_image, item_price, item_quantity, item_total, grant_total) VALUES (?, ?, ?, ?, ?, ?, ?)";
                    $stmt = mysqli_prepare($con, $sql);
                    mysqli_stmt_bind_param($stmt, "ssssddi", $_SESSION['customer_id'], $itemName, $itemImage, $itemPrice, $itemQuantity, $itemTotal, $grandTotal); // Use $phone here
                    $res = mysqli_stmt_execute($stmt);
            
                    if (!$res) {
                        die('Order insertion failed: ' . mysqli_error($con));
                        $count=0;
                    }
                    
                    
                }
                if ($count == 1) {
                    // Construct the SQL query to retrieve order status
                    $sql = "SELECT order_status FROM orders WHERE customer_id = " . $_SESSION['customer_id'];
                
                    // Execute the query
                    $stmt = mysqli_query($con, $sql);
                    
                    if ($stmt) {
                        // Fetch the result
                        $orderStatus = mysqli_fetch_assoc($stmt);
                        
                        // Store the order status in a session variable
                        // $_SESSION['orderStatus'] = $orderStatus['order_status'];
                        $_SESSION['orderStatus'] = "<span style='color: green; font-size: 2rem; margin-left: center;'>{$orderStatus['order_status']}...., You will recive short sms through your phone</span>";

                        header("Location: http://localhost/onlineRestorant/front/cart.php");
                    } else {
                        // Handle any query execution errors
                        die('Query execution failed: ' . mysqli_error($con));
                    }
                }
                
                
                }
                unset($_SESSION['customer_id']);
            } else {
                echo "Your cart is empty.";
            }
            
            
                    // Insert item data into the "orders" table, associating it with the customer
                    // $sql = "INSERT INTO orders (customer_id, item_name, item_image, item_price, item_quantity, item_total, grant_total) VALUES (?, ?, ?, ?, ?, ?, ?)";
                    // $stmt = mysqli_prepare($con, $sql);
                    // mysqli_stmt_bind_param($stmt, "ssssddi", $customerId, $itemName, $itemImage, $itemPrice, $itemQuantity, $itemTotal, $grandTotal); // Use $phone here
                    // $res = mysqli_stmt_execute($stmt);
            
        //             if (!$res) {
        //                 die('Order insertion failed: ' . mysqli_error($con));
        //             }
        //             unset($_SESSION['customer_id']);
        //         }} else {
        //             // Handle the case where customer_id is not set in the session
        //             die('Customer ID not found in session.');
        //         }
        //     }

        // }
        // else{
        //     die('Customer insertion failed: ' . mysqli_error($con));
        // }
    
    // Check if the form was submitted with the name "checkout"
  

    // Redirect or display a confirmation message as needed
    // header("Location: confirmation.php");
    // exit();


    // Access the items and grand_total from the session
    $items = $_SESSION['items'];
    $grandTotal = $_SESSION['grand_total'];
    $itemId = $_SESSION['id'];
    // Access a specific item from the cart (if you stored it)
     // Replace with the actual item ID you want to retrieve
    if (isset($_SESSION['cart'][$itemId])) {
        $itemData = $_SESSION['cart'][$itemId];
        $itemName = $itemData['name'];
        $itemImage = $itemData['image'];
        $itemPrice = $itemData['price'];
        $itemQuantity = $itemData['quantity'];
        $itemTotal = $itemData['total'];
    }
    echo $itemName;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Form</title>
    <link rel="stylesheet" href="../css/order_form.css">
    

</head>
<body>
  <div class="order-div">
    <h1>Order Form</h1>
    <form  method="POST" >
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" required><br><br>
        
        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" required><br><br>
        
        <label for="phoneNumber">Phone Number:</label>
        <input type="tel" id="phoneNumber" name="phoneNumber" pattern="[0-9]{10}" required><br><br>
        
        <label for="address">Address:</label>
        <textarea id="address" name="address" rows="4" cols="50" required></textarea><br><br>
        
        <input name="order" type="submit" class="submit-btn" value="Submit Order"> 
        <div class="order-div">
       
            <!-- Your order items and other fields go here -->

            <!-- Checkout button -->
            <input name="checkout" type="submit" class="submit-btn" value="Submit Order" hidden>
       
    </div> 
    </form>
  
</div>
</body>
</html>



