<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
    <link rel="stylesheet" href="styleheader.css">
</head>
<body>
    <header>
        <div class="container" id="logo">
            <img src="../assets/images/rocket.png" alt="AppSeed" height="70px" width="100px">
            <span id="logo-name"><p>AppSeed</p></span>
        </div>
        <div class="container" id="menu">
            <ul>
                <li><a href="./adminDashbord.php">Starters</a></li>  
                <li><a href="#">UI Kits</a></li>  
                <li><a href="#">Discounts</a></li>  
                <li><a href="#">Services</a>
                    <ul class="sous-menu">
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Custom Development</a></li>
                    </ul>
                </li>  
                <li><a href="#">Ressources</a>
                    <ul>
                        <li><a href="#">Terms</a></li>
                        <li><a href="#">Documentation</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>  
                </li>  
                <li><a id="btn" href="#">GENERATOR</a></li>  
                <li><a href="./connexion.php">Login</a></li>  
                
            </ul>
        </div>
    </header>
</body>
</html>