<?php 

include('items.php'); // links items.php to form
include('cart.php'); // links cart.php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drunken Noodles</title>
    <link rel=stylesheet type=text/css href=css/styles.css>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Julee&family=Marcellus+SC&display=swap" rel="stylesheet">
</head>
<body>
    <div class="background">
    <div class="wrapper">
        <div class=header>
            <h1>Drunken Noodles</h1>
            <p class="subtitle">Food Truck</p>

        </div>

        <div class="menu">
        <!-- Begin form -->
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <fieldset>

            <!-- foreach loop that lists menu items -->
            <?php foreach ($items as $item): ?>

                <div class="items">

                    <h2><?php echo $item->Name; ?></h2>
                        <p><?php echo $item->Description; ?></p>
                        <p>Price: $<?php echo $item->Price; ?></p>

                        <p>
                            <label for="<?php echo $item->ID; ?>">Quantity:</label>
                            <select name="quantity_<?php echo $item->Name; ?>" id="quantity_<?php echo $item->Name; ?>">
                                <option value=0>0</option>
                                <option value=1>1</option>
                                <option value=2>2</option>
                                <option value=3>3</option>
                                <option value=4>4</option>
                            </select>
                        </p>
                                            
                </div> <!-- end items div -->

            <?php endforeach; ?> <!-- end $items foreach -->

            <?php if (isset($error)): ?> <!-- error code -->
                <p class="error"><?php echo $error; ?></p>
            <?php endif; ?>

            <!-- Submit -->
            <input class="btn checkout" type="submit" name="checkout" value="Checkout" id="checkout">
        
            <!-- Reset -->
            <!-- <p><a href="">RESET</a></p> -->

        </fieldset>
        </form> <!-- end form -->
        </div> <!-- end menu div -->

        <!------------------------ CART -------------------------->

        <div class="cart">
            <h2>Your Cart</h2>

            <?php if(!isset($quantity) || array_sum($quantity) === 0) { ?>
            <!--    If the quantity array has not been submitted/doesn't exist yet (!isset($quantity)) 
                    or ||
                    if nothing has been added or sum of quantity array is zero  array_sum($quantity) ===0
            -->
            <p>Your cart is empty</p>
            <?php } else { ?> 

            <p>Please review your order details.</p>

            <table id="order_details">
                <tr>
                    <th class="left" scope="col">Qty.</th>
                    <th class="left" scope="col">Item</th>
                    <th class="left" scope="col">Cost</th>
                </tr>
                <?php   foreach($quantity AS $name => $amount): //loop for order details
                            if($amount > 0):?>
                <tr>
                    <td class="left"><?php   echo $amount; ?></td>
                    <td class="left"><?php   echo str_replace('_',' ', $name);?></td> <!-- replaces _ with spaces -->
                    <td class="right">$<?php  echo $cost = $amount * $item->Price;
                                $subtotal += $cost;
                    ?></td>
                </tr>
                <?php 
                            endif;  //end if amount is greater than 0
                        endforeach; //end order details foreach loop
                ?> 
                <tr>
                    <td class="left totals" colspan="2">Subtotal</td>
                    <td class="right totals">
                        <?php 
                        echo $subtotal; 
                        ?>
                    <td>
                </tr>
                <tr>
                    <td class="left" colspan="2">Tax</td>
                    <td class="right">
                        <?php 
                        $tax = $subtotal*0.1;
                        echo number_format($tax, 2); 
                        ?>
                    <td>
                </tr>
                <tr>
                    <td class="left" colspan="2">Total</td>
                    <td class="right">
                        <?php 
                        $total = $subtotal*1.1;
                        echo number_format($total, 2); 
                        ?>
                    <td>
                </tr>
            </table>

            <!-- confirm order button -->
            <input class="btn confirm" type="submit" name="confirm" value="Confirm Order" onclick="window.location.href='thx.php'">

                <?php } ?> <!-- end if(!isset) -->

        </div> <!-- end cart -->


    </div> <!-- end wrapper -->
    </div> <!-- end background image -->

    <!-- <pre>
        <?php
        //if(isset($_POST['checkout'])) {
            //print_r($_POST);
        //}
        ?>
    </pre> -->

</body>
</html>