<?php
if (!isset($orders)) {
    echo "No orders to display.";
    return;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order List</title>
</head>

<body>
    <h1>You can see below the list of the Orders</h1>
    <?php if (isset($orders) && !empty($orders)): ?>
        <?php foreach ($orders as $order): ?>
            <h4>Order ID: <?= $order->id ?> | Total: <?= $order->total ?></h4>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No orders available.</p>
    <?php endif; ?>
</body>

</html>