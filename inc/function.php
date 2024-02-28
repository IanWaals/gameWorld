<?php 

session_start();
function htmlHead($pagetitle, $pageHeading){
    // Get navigation items
    $navItems = getNavigation();
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title><?php echo $pagetitle ?></title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="css/style.css" type="text/css" />
        </head>
        <body>
            <div class="allContainer">
                <header class="logo">
                    GAMEWORLD - <?php echo $pageHeading ?>
                </header>
                <nav class="topNav">
                    <!-- Navigation links -->
                    <?php
                    foreach ($navItems as $navItem) {
                        ?>
                        <a href="<?php echo $navItem['pageURL'];?> "><?php echo $navItem['pageTitle']; ?></a>
                        <?php
                    }
                    ?>
                </nav>
                <div class="headerImage">
                    <img src="images/wide background.jpg" width="615px" height="180">
                    <p class="topLeft">GAMEWORLD</p>
                    <p class="middleLeft">The most complete gaming webshop!</p>
                </div>
    <?php
}

function consoleHead($pagetitle, $pageHeading){
    // Get navigation items
    $consoles = getConsoles();
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title><?php echo $pagetitle ?></title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="css/style.css" type="text/css" />
        </head>
        <body>
            <div class="allContainer">
                <header class="logo">
                    <?php echo $pageHeading ?>
                </header>
                <nav class="consoleNav">
                    <!-- Navigation links -->
                    <?php
                    foreach ($consoles as $console) {
                        ?>
                        <a href="<?php echo $console['consoleURL'];?> " class="<?php echo $console['consoleStyle'];?> "><?php echo $console['consoleName']; ?></a>
                        <?php
                    }
                    ?>
                </nav>
                <a href="index.php" class="homepageLink">return to homepage</a>
    <?php
}

function bodyHomepage(){
    $consoles = getConsoles();
    $games = getGames();
    $popularGames=array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24)
    ?>
    <h1>GAMES</h1>
    <nav class="consoleNav">
        
        <?php
        foreach ($consoles as $console) {
            ?>
            <a href="<?php echo $console['consoleURL'];?> " class="<?php echo $console['consoleStyle'];?>"><?php echo $console['consoleName']; ?></a>
            <?php
        }
        ?>
    </nav><br>
    POPULAR GAMES
    <div class="popularGames">
        <?php
        $random_keys=array_rand($popularGames,8);
        foreach ($games as $game){
            if (
                $game['gameId'] == $popularGames[$random_keys[0]] or
                $game['gameId'] == $popularGames[$random_keys[1]] or
                $game['gameId'] == $popularGames[$random_keys[2]] or
                $game['gameId'] == $popularGames[$random_keys[3]] or
                $game['gameId'] == $popularGames[$random_keys[4]] or
                $game['gameId'] == $popularGames[$random_keys[5]] or
                $game['gameId'] == $popularGames[$random_keys[6]] or
                $game['gameId'] == $popularGames[$random_keys[7]]
            ) {
                ?>
                <div class="<?php echo $game['gamePlatform'];?> ">
                    <div>
                        <?php echo $game['gamePlatform'];?>
                    </div>
                    <img src="<?php echo $game['imageURL']; ?>" width="160" class="gameImg">
                    <?php echo $game['gameName']; ?>
                    <img class="PEGI" src="<?php echo $game['pegi']; ?>" width="70">
                    <?php echo $game['price']; ?>
                </div>
                <?php
            }
        }

        ?>
    </div>
    <?php
}

function bodyConsoles($platform){
    $games = getGames();
    ?>
    <div class="platformGames">
        <?php foreach ($games as $game) {
            switch ($platform) {
                case "playstation":
                    if ($game['gamePlatform'] == "Playstation") {
                        ?>
                        <div class="<?php echo $game['gamePlatform'];?> ">
                            <div>
                                <?php echo $game['gamePlatform'];?>
                            </div>
                            <img src="<?php echo $game['imageURL']; ?>" width="160" class="gameImg">
                            <?php echo $game['gameName']; ?>
                            <img class="PEGI" src="<?php echo $game['pegi']; ?>" width="70">
                            <?php echo $game['price']; ?>
                            <button onclick="$_SESSION['']">add to cart</button>
                        </div>
                        <?php
                    }
                    break;
                case "xbox":
                    if ($game['gamePlatform'] == "Xbox") {
                        ?>
                        <div class="<?php echo $game['gamePlatform'];?> ">
                            <div>
                                <?php echo $game['gamePlatform'];?>
                            </div>
                            <img src="<?php echo $game['imageURL']; ?>" width="160" class="gameImg">
                            <?php echo $game['gameName']; ?>
                            <img class="PEGI" src="<?php echo $game['pegi']; ?>" width="70">
                            <?php echo $game['price']; ?>
                        </div>
                        <?php
                    }
                    break;
                case "pc":
                    if ($game['gamePlatform'] == "Pc") {
                        ?>
                        <div class="<?php echo $game['gamePlatform'];?> ">
                            <div>
                                <?php echo $game['gamePlatform'];?>
                            </div>
                            <img src="<?php echo $game['imageURL']; ?>" width="160" class="gameImg">
                            <?php echo $game['gameName']; ?>
                            <img class="PEGI" src="<?php echo $game['pegi']; ?>" width="70">
                            <?php echo $game['price']; ?>
                        </div>
                        <?php
                    }
                    break;
            }
        } ?>
    </div>
    <?php
}

function htmlFoot(){
    ?>
        </div>
        <footer class="footer">&copy; 2024 Ian Waals ROC-teraa</footer>
        </body>
    </html>
    <?php
}

function cartDiv(){
    $games = getGames();

    foreach ($games as $game) {
        ?>
        <section class="<?php echo $game['gameplatform']; ?>">
            <h2><?php echo $game['gameName']; ?></h2>
            <img src="<?php echo $game['imageURL']; ?>" alt="the thumbnail of <?php echo $game ['gameName']; ?>">
            <img src="<?php echo $game['pegi']; ?>" alt="the pegi logo">
            <?php echo $game['price']; ?>
        </section>
        <?php
    }
}

function addCart() {

}

function dbConnect(){
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gameworld";

    // Create a new mysqli connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check if the connection works
    if ($conn->connect_error){
        die("connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function getNavigation(){
    $conn = dbConnect();

    $sql = "SELECT * FROM navigation";

    // Query the database and get results
    $resource = $conn->query($sql) or die($conn->error);

    // Collecting all rows as separate arrays
    $navItems = $resource->fetch_all(MYSQLI_ASSOC);

    return $navItems;
}

function getConsoles(){
    $conn = dbConnect();

    $sql = "SELECT * FROM consolenavigation";

    // Query the database and get results
    $resource = $conn->query($sql) or die($conn->error);

    // Collecting all rows as separate arrays
    $navItems = $resource->fetch_all(MYSQLI_ASSOC);

    return $navItems;
}

function getGames(){
    $conn = dbConnect();

    $sql = "SELECT * FROM games";

    // Query the database and get results
    $resource = $conn->query($sql) or die($conn->error);

    // Collecting all rows as separate arrays
    $navItems = $resource->fetch_all(MYSQLI_ASSOC);

    return $navItems;
}

?>