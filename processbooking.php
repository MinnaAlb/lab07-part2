<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Rohirrim tour booking confirmation">
    <meta name="keywords" content="MiddleEarth, Tours, Rohan, booking">
    <meta name="author" content="Minna Albadri">
    <title>Booking Confirmation</title>
</head>
<body>
    <h1>Rohirrim Tour Booking Confirmation</h1>
    <?php
        // Show a value only if the form actually sent it, and escape it so
        // user input cannot inject HTML into the page
        if (isset($_POST["firstname"]) && isset($_POST["lastname"])) {
            $firstname = htmlspecialchars($_POST["firstname"]);
            $lastname  = htmlspecialchars($_POST["lastname"]);
            echo "<p>Welcome $firstname $lastname!<br>";
        }

        // Each booking checkbox only appears in $_POST when it was ticked,
        // so collect the ticked ones and join them into one sentence
        $bookings = array();
        if (isset($_POST["accom"])) {
            $bookings[] = "Accommodation";
        }
        if (isset($_POST["4day"])) {
            $bookings[] = "4 Day Tour";
        }
        if (isset($_POST["10day"])) {
            $bookings[] = "10 Day Tour";
        }
        if (count($bookings) > 0) {
            echo "You are now booked on the ", implode(" and ", $bookings), "<br>";
        } else {
            echo "You have not selected any bookings.<br>";
        }

        // The radio buttons send a one-letter code, so map it to the species name
        $speciesNames = array("M" => "Human", "D" => "Dwarf", "E" => "Elf", "H" => "Hobbit");
        if (isset($_POST["species"]) && isset($speciesNames[$_POST["species"]])) {
            echo "Species: ", $speciesNames[$_POST["species"]], "<br>";
        }

        if (isset($_POST["age"])) {
            echo "Age: ", htmlspecialchars($_POST["age"]), "<br>";
        }
        if (isset($_POST["food"])) {
            echo "Meal Preference: ", htmlspecialchars($_POST["food"]), "<br>";
        }
        if (isset($_POST["bookday"])) {
            echo "Date: ", htmlspecialchars($_POST["bookday"]), "<br>";
        }
        if (isset($_POST["partysize"])) {
            echo "Number of travellers: ", htmlspecialchars($_POST["partysize"]), "</p>";
        }
    ?>
</body>
</html>