<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>webshop</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
        rel="stylesheet">

</head>

<body>
    <!-- navigation bar-->
    <header>
        <nav class="menu">
            <ul class="menu">
                <li>
                    <a href="index.php">webshop</a>
                </li>
                <li>
                    <a href="html/shop.php">Shop</a>
                </li>
                <li>
                    <a href="html/about.php">About</a>
                </li>
                <li>
                    <a href="html/signuppage.php">SignUp</a>
                </li>
                <li>
                    <a href="#contact">Contact</a>
                </li>
            </ul>
        </nav>
    </header>

    <!-- landing page -->

    <a name="index.php"></a>
    <div class="section-hero">
        <div class="container">
            <h3 class="type">Durable bags for the extreme adventurers</h3>
        </div>


     <!-- signup page -->

     <a name="signup"></a>
        <div class="section-signup">
    

        <form action="formHandler.php" method="GET">

        <h1>Sign Up</h1>

        <legend><span class="number">1</span>Your Customer Info</legend>
        <label for="name">FirstName:</label>
        <input type="text" id="name" name="user_firstname" autofocus>

        <label for="name">LastName:</label>
        <input type="text" name="user_lastname">

        <label for="name">Title:</label>
        <input type="text" name="user_title">

        <label for="mail">Email:</label>
        <input type="email" id="mail" name="user_email">

        <label for="password">Password:</label>
        <input type="password" id="password" name="user_password">

        <button type="submit">Sign Up</button>

    </form>



    <!-- footer -->
    <footer>
        <span>
            Ferran Jay &copy; 2019
        </span>
    </footer>

    <script src="main.js"></script>
</body>

</html>