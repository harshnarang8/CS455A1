<?php

        $q1 = $_POST["q1"][1];
        $q2 = $_POST["q2"][1];
        $q3 = $_POST["q3"][1];
        $q4 = $_POST["q4"][1];
        $feedback = $_POST["feedback"];
        echo "This response has been processed: ".$q1. " ".$q2." ".$q3." ".$q4." ".$feedback; // this is to be sent to the database

        // open connection
        $server = "";
        $username = "root";
        $pass = "1";
        $db = "db1";
        $conn = new mysqli($server, $username, $pass, $db);
        $sqlCommand = "INSERT INTO feedbacks VALUES ('".$q1."','".q2."','".q3."','".q4."','".$feedback."')";

        if ($conn->query($sqlCommand) == TRUE)
                echo "Thank you for your feedback.";
        else
                echo "Error encountered. Please refer the following code to the manager: ".$conn->error;
?>