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
</head>
<body>
    
    <h1>Drunken Noodles Food Truck</h1>
    <div class="wrapper">
        
        <!-- Begin form -->
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <fieldset>

            <!-- foreach loop that lists menu items -->
            <?php foreach ($items as $item): ?>
                <div class="menu">

                    <h3><?php echo $item->Name; ?></h3>

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
                    
                        <p>Extras:</p>
                        <ul>                        
                            <?php foreach ($item->Extras as $extra): ?>

                                <li>

                                    <label for="<?php echo $item->ID; ?> <?php echo $extra; ?>">
                                        <input type="checkbox" name="extra_<?php echo $item->ID; ?>_<?php echo $extra; ?>"> <?php echo $extra; ?>
                                    </label>

                                </li>

                            <?php endforeach; ?> <!-- end $extra list -->
                        </ul>
                        
                </div> <!-- end menu div -->

            <?php endforeach; ?> <!-- end $items foreach -->


            <!-- Submit -->
            <input class="btn checkout" type="submit" name="checkout" value="Checkout" id="checkout">
        
            <!-- Reset -->
            <p><a href="">RESET</a></p>

        </fieldset>
        </form> <!-- end form -->


        <!------------------------
                    CART 
        -------------------------->
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
                    <th scope="col">Item</th>
                    <th scope="col">Details</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Cost</th>
                </tr>
                <?php foreach($quantity AS $name => $amount): //loop for order details
                    if($amount > 0):?>
                <tr>
                    <td><?php echo str_replace('_',' ', $name);?></td> <!-- replaces _ with spaces -->
                    <td><?php 
                        //echo addExtra();
                    ?></td>
                    <td><?php   echo $amount; ?></td>
                    <td>$<?php  echo $cost = $amount * $item->Price;
                                $total += $cost;
                    ?></td>
                </tr>
                <?php 
                    endif;      //end if amount is greater than 0
                endforeach; //end order details foreach loop
                ?> 
                <tr>
                    <td colspan="4">Total</td>
                    <td><?php echo $total; ?><td>
                </tr>
            </table>

            <!-- confirm order button -->
            <input class="btn confirm" type="submit" name="confirm" value="Confirm Order">

                <?php } ?> <!-- end if(!isset) -->

        </div> <!-- end cart -->


    </div> <!-- end wrapper -->


    <pre>
        <?php
        if(isset($_POST['checkout'])) {
            print_r($_POST);
        }
        ?>
    </pre>

</body>
</html>