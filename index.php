<?php 

include('items.php'); // links items.php to form
include('cart.php'); // links cart.php to form (when created)

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drunken Noodles</title>
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
                            <label for="<?php echo $item->Quantity; ?>">Quantity:</label>
                            <input type="number" name="<?php echo $item->Quantity; ?>" id="<?php echo $item->ID; ?>" value="0">
                        </p>

                <!-- This if statement checks if the Extras property has content. If it does, it will show them. -->
                    <?php if (!empty($item->Extras)): ?>
                        <p>Extras:</p>
                        <ul>
                            <?php foreach ($item->Extras as $extra): ?>
                                <li>
                                    <label for="<?php echo $item->ID; ?>-<?php echo $extra; ?>">
                                        <input type="checkbox" name="<?php echo $item->ID; ?>.<?php echo $extra; ?>"> <?php echo $extra; ?>
                                    </label>
                                </li>
                            <?php endforeach; ?> <!-- end $extra list -->
                        </ul>
                    <?php endif; ?> <!-- end if not empty -->

                </div> <!-- end menu div -->

            <?php endforeach; ?> <!-- end items foreach -->


            <!-- Submit -->
            <input type="submit" value="Checkout">
        
            <!-- Reset -->
            <p><a href="">RESET</a></p>

        </fieldset>
        </form> <!-- End Form -->

    </div> <!-- end wrapper -->
</body>
</html>