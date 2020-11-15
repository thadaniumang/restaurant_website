<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/media.css">
    <link rel="stylesheet" href="../styles/validations.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forks and Sticks</title>
</head>
<body>
    <header>
        <div id="logo">
            <h1>Forks and Sticks</h1>
            <button class="hamburger">
                <svg style="width: 25px; height: 25px" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        <nav id="links" class="hidden">
            <a href="../index.html">
                <svg title="Home" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                <p>Home</p>
            </a>
            <a href="../pages/menu.html">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 3a1 1 0 011-1h.01a1 1 0 010 2H7a1 1 0 01-1-1zm2 3a1 1 0 00-2 0v1a2 2 0 00-2 2v1a2 2 0 00-2 2v.683a3.7 3.7 0 011.055.485 1.704 1.704 0 001.89 0 3.704 3.704 0 014.11 0 1.704 1.704 0 001.89 0 3.704 3.704 0 014.11 0 1.704 1.704 0 001.89 0A3.7 3.7 0 0118 12.683V12a2 2 0 00-2-2V9a2 2 0 00-2-2V6a1 1 0 10-2 0v1h-1V6a1 1 0 10-2 0v1H8V6zm10 8.868a3.704 3.704 0 01-4.055-.036 1.704 1.704 0 00-1.89 0 3.704 3.704 0 01-4.11 0 1.704 1.704 0 00-1.89 0A3.704 3.704 0 012 14.868V17a1 1 0 001 1h14a1 1 0 001-1v-2.132zM9 3a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1zm3 0a1 1 0 011-1h.01a1 1 0 110 2H13a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>        <p>Menu</p>
            </a>
            <a href="../pages/contact.html" style="color: #bcbcbc">
                <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <p>Order</p>
            </a>
        </nav>
    </header>
    <main>
    <?php

    $nameErr = $emailErr = $itemErr = $phoneErr = $mopErr = $addressErr = "";
    $name = $email = $item = $phone = $mop = $address = "";
    $flag = true;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
            $flag = false;
        } else {
            $name = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                $nameErr = "Only letters and white space allowed";
                $flag = false;
            }
        }
        
        if (empty($_POST["mail"])) {
            $emailErr = "Email is required";
            $flag = false;
        } else {
            $email = test_input($_POST["mail"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
                $flag = false;
            }
        }
        
        if (empty($_POST["item"])) {
            $itemErr = "Invalid Order";
            $flag = false;
        } else {
            $item = test_input($_POST["item"]);
            if (!preg_match("/[A-z\s,]+/",$item)) {
                $itemErr = "Invalid Order";
                $flag = false;
            }
        }
    
        if (empty($_POST["phone"])) {
            $phoneErr = "Phone Number is Required";
            $flag = false;
        } else {
            $phone = test_input($_POST["phone"]);
            if (!preg_match("/^\d{10}$/",$phone)) {
            $phoneErr = "Invalid Phone Number";
            $flag = false;
            }
        }
    
        if (empty($_POST["mode"])) {
            $mopErr = "Mode Of Payment is required";
            $flag = false;
        } else {
            $mop = test_input($_POST["mode"]);
        }

        if (empty($_POST["address"])) {
            $addressErr = "Address is required";
            $flag = false;
        } else {
            $address = test_input($_POST["address"]);
        }
    }
    
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if($flag) {
        echo '<p class="order-placed">';
        echo "Thank You $name for ordering $item.<br> You will be notified on $email and $phone.<br> Your order will be placed at $address and payment can be done via $mop.<br>";
        echo "<br>";
        echo '<div style="text-align: center;"><img src="../images/order-status/placed.gif" width="275" height="220"></img></div></p>';
    } else {
        echo '<p class="order-failed">';
        if($nameErr) {
            echo $nameErr;
            echo "<br>";
        }
        if($emailErr) {
            echo $emailErr;
            echo "<br>";
        }
        if($phoneErr) {
            echo $phoneErr;
            echo "<br>";
        }
        if($addressErr) {
            echo $addressErr;
            echo "<br>";
        }
        if($mopErr) {
            echo $mopErr;
            echo "<br>";
        }
        if($itemErr) {
            echo $itemErr;
            echo "<br>";
        }
        echo "<br>";
        echo '<div style="text-align: center;"><img src="../images/order-status/failed.gif" width="275" height="220"></img></div>';
        echo '<a href="../pages/contact.html">Go back to order page</a></p>';
    }
    ?>
    </main>
    <footer>
        <address>
            Building No. 17,<br>
            K. J. Somaiya College Of Engineering,<br>
            Vidyavihar, Mumbai 400-077,<br>
            Random Address
        </address>
        <div class="testimonials">
            <p><i>"Extremely great service. The food tastes just awesome.<br> Best in the locality"</i></p>
            <br>
            <p><i>"Some feedback from customers who visited<br> the restaurant"</i></p>
        </div>
    </footer>
    <script src="../scripts/validation.js"></script>
    <script src="../scripts/app.js"></script>
</body>
</html>
