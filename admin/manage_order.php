<?php include("partial/header.php");?>
<?php include("config/config.php");?>
<div class="heading-primary admin-heading">
    <h1>Manage Order</h1>
</div>
<div class="table">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Item Name</th>
                <th>Phone Number</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Image</th>
                <th class="action" colspan="5">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM orders WHERE order_status='pending' ORDER BY id DESC";
            $result = mysqli_query($con, $query);

            // Create an associative array to group orders by customer name
            $ordersByCustomer = array();

            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['customer_id'];
                $sql = "SELECT * FROM customer WHERE id=$id";
                $exe = mysqli_query($con, $sql);
                if ($exe) {
                    $arr = mysqli_fetch_array($exe);
                    $fullName = $arr[1] . ' ' . $arr[2];
                    $phone = $arr[3];
                    $address = $arr[4];
                }

                $name = $row['item_name'];
                $price = $row['item_price'];
                $image_name = $row['item_image'];
                $quantity = $row['item_quantity'];
                $total = $row['item_total'];

                // Group orders by customer name
                if (!isset($ordersByCustomer[$fullName])) {
                    $ordersByCustomer[$fullName] = array(
                        'orders' => array() // Initialize orders as an empty array
                    );
                }

                // Add the current order to the customer's array
                $ordersByCustomer[$fullName]['orders'][] = array(
                    'id' => $id,
                    'name' => $name,
                    'phone' => $phone,
                    'price' => $price,
                    'image_name' => $image_name,
                    'quantity' => $quantity,
                    'total' => $total
                );
            }

            // Loop through the grouped orders and display them with the total sum
            foreach ($ordersByCustomer as $customerName => $customerData) {
                $customerOrders = $customerData['orders'];
                echo "<tr>";
                echo "<td rowspan='" . (count($customerOrders) + 1) . "'>$customerName</td>";
                echo "<td colspan='6'></td>"; // Empty columns for phone, price, quantity, total, and image
                echo "<td class='action'></td>"; // Empty column for action
                echo "</tr>";
                foreach ($customerOrders as $order) {
                    echo "<tr>";
                    echo "<td>{$order['name']}</td>";
                    echo "<td>{$order['phone']}</td>";
                    echo "<td>{$order['price']}</td>";
                    echo "<td>{$order['quantity']}</td>";
                    echo "<td>{$order['total']}</td>";
                    echo "<td><img class='img' src='../img/{$order['image_name']}' alt='food image'></td>";
                   ; // Add a checkbox
                    echo "</tr>";
                }
                $customerTotal = array_sum(array_column($customerOrders, 'total'));
                echo "<tr>";
                echo "<td>Grand Total:</td>";
                echo "<td colspan='6'></td>"; // Empty columns for phone, price, quantity, total, and image
                echo "<td class='action'></td>"; // Empty column for action
                echo "<td>$customerTotal</td>";
                echo "<td><a class='adm-btn upd-btn' href='http://localhost/onlineRestorant/admin/process.php?id={$order['id']}&phone={$order['phone']}'>Approve Order</a></td>";
                echo "<td><input type='checkbox' name='orderCheckbox' value='{$order['id']}'></td>";
                echo "<td></td>"; // Empty column for checkbox
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>







