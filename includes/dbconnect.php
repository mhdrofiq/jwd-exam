<!-- written by Muhammad Rofiqurrahman Ibnu Disya Ghazali, August 2023 -->

<?php
    $conn = mysqli_connect("localhost", "root", "", "jwd");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    //echo "Connected successfully";
?>