<!DOCTYPE html>
<?php 
session_start();
include ("../functions/functions.php") 

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Statements</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Lora:700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">


</head>

<body>
    <!-- NAVIGATIE BAR -->
    <header>
        <nav class="containerone">

            <form class="formone" method="get" action="results.php" enctype="multipart/form-data">
                <input type="text" name="user_query" placeholder="search a product" />
            </form>

            <ul class="menu">
                <li>
                    <a href="../index.php">HOME</a>
                </li>
                <li>
                    <a href="../html/shop.php">SHOP</a>
                </li>
                <li>
                    <a href="../customer/customer_registration.php">REGISTER</a>
                </li>
                <li>
                    <a href="../customer/login.php">LOGIN</a>
                </li>
            </ul>

            <div class="shopping_cart">
                <?php cart(); ?><span>TOTAL ITEMS.&nbsp; &nbsp;
                <?php total_items(); ?><br>TOTAL PRICE.&nbsp;&nbsp;
                <?php total_price();?></b><br><a href="cart.php">GO TO CART</a></span>
            </div>

        </nav>
    </header>

    <!-- HERO BANNER  -->

    <div class="containershop">
        <div class="title">
            <h1>Statements</h1>
        </div>
    </div>

    <!-- MAIN PAGINA -->
    
    <div class="containershopmain">
        <div class="products_box_cart">

            <form action="" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <th>Remove</th>
                        <th>Product(S)</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                    </tr>

                    <?php 
		$total = 0;
		
		global $db_connection ; 
		
		$ip = getIp(); 
		
		$sel_price = "SELECT * FROM cart WHERE ip_add='$ip'";
		
		$run_price = mysqli_query($db_connection , $sel_price); 
		
		while($p_price=mysqli_fetch_array($run_price)){
			
			$pro_id = $p_price['p_id']; 
			
			$pro_price = "SELECT * FROM products WHERE product_id='$pro_id'";
			
			$run_pro_price = mysqli_query($db_connection ,$pro_price); 
			
			while ($pp_price = mysqli_fetch_array($run_pro_price)){
			
			$product_price = array($pp_price['product_price']);
			
			$product_title = $pp_price['product_title'];
			
			$product_image = $pp_price['product_image']; 
			
			$single_price = $pp_price['product_price'];
			
			$values = array_sum($product_price); 
			
			$total += $values; 
					
		    ?>

            <tr align="center">
                <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>" /></td>
                    <!-- $pro_id word opeghaald van hierboven , laat de checkbox zien -->
                <td>
                
                <?php echo $product_title; ?><br>
                            
                <img src="../admin_area/product_images/<?php echo $product_image;?>" width="200" height="200" />
                    <!-- laat de image zien -->
                </td>
                        
                <td><input type="text" size="4" name="qty" value="<?php echo $_SESSION['qty'];?>" /></td>
                <!-- laat de hoeveelheid zien -->


            <?php 

                if(empty($_SESSION['qty'])){        // als er niks ingevuld word in qty field dan is 0 
                        $_SESSION['qty'] = 0;
                    }

						if(isset($_POST['update_cart'])){  
						
							$qty = $_POST['qty'];           // creeren een lokale variabele zodat we dit kunnen linken met de input field hierboven, slaan we op in deze lokale variabele 
							
							$update_qty = "update cart set qty='$qty'";  // update met de info die van de variabele $qty komt
							
							$run_qty = mysqli_query($db_connection, $update_qty); 
							
							$_SESSION['qty']=$qty;          // als we de waarde in de textfield willen behouden moeten we gebruik maken van $_SESSION (superglobal)
                                                            // als je SESSION wilt gebruiken moet je zorgen dat je dit start bovenaan deze pagina
                            $total = $total * $qty;         // session brengt een waarde van qty die kunnen we terug laten zien in de value input field hierboven in de tabel
                                                            // we zorgen dat de variabele $total nu het totaal is van $total x $qty 

						}		
			?>


                    <td>
                            <?php echo "€" . $single_price; ?>
                        </td>
                    </tr>


                    <?php } } ?>

                    <tr>
                        <td colspan="4" align="right"><b>Sub Total:</b></td>
                        <td>
                            <?php echo "€" . $total;?>
                        </td>
                    </tr>

                    <tr align="center">
                        <td colspan="2"><input type="submit" name="update_cart" value="Update Cart" /></td>
                        <td><input type="submit" name="continue" value="Continue Shopping" /><a href="shop.php"></a></td>
                        <td><button><a href="checkout.php" style="text-decoration:none; color:black;">Checkout</a></button></td>
                    </tr>

                </table>

            </form>
            <?php updatecart(); ?>

            </div>


    </div>


    <div class="link-container">
        <h3>CATEGORIES</h3>

        <?php getCats(); ?>

        <h3>BRANDS</h3>

        <?php getBrands(); ?>

    </div>



    <!-- footer -->
    <footer>
        <div class="footertext">
            <ul class="menufooter">
                <li>
                    <a>&copy; STATEMENTS 2019</a>
                </li>
                <li>
                    <a href="html/shop.php">TERMS & CONDITIONS</a>
                </li>
                <li>
                    <a href="customer/customer_registration.php">SHIPPING</a>
                </li>
                <li>
                    <a href="html/cart.php">RETURNS</a>
                </li>
                <li>
                    <a href="customer/customer_registration.php">PRIVACY POLICY</a>
                </li>
                <li>
                    <a href="html/shop.php">CONTACT US</a>
                </li>
            </ul>
        </div>
    </footer>

    <script src="js/main.js"></script>
</body>

</html>