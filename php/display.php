<?php
        include 'php/db_connect.php';

        $sql = "SELECT * FROM Hotels";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<div class='hotel'>";
                echo "<h2>" . $row['hotel_name'] . "</h2>";
                echo "<p>" . $row['address'] . ", " . $row['city'] . ", " . $row['state'] . " " . $row['zip_code'] . "</p>";
                echo "<p>Phone: " . $row['phone_number'] . "</p>";
                echo "<p>Email: " . $row['email'] . "</p>";
                echo "</div>";
            }
        } else {
            echo "No hotels found.";
        }

        mysqli_close($conn);
        ?>