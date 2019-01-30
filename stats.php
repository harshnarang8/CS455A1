<?php

// open connection
$server = "";
$username = "root";
$pass = "1";
$db = "db1";
$conn = new mysqli($server, $username, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed. ".$conn->connect_error);
}

// select query for average
$sql = "SELECT AVG(q1) as res1, AVG(q2) as res2, AVG(q3) as res3, AVG(q4) as res4 FROM feedbacks;";
// select query for comments
$sqlComments = "SELECT feedback as fb1 from feedbacks;";
$result1 = $conn->query($sql);
$result2 = $conn->query($sqlComments);

$row = $result1->fetch_assoc();
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Feedback Statistics</title>
    <meta name = "viewport" content = "width = device-width, initial-scale = 1">      
    <link rel = "stylesheet" href = "https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
    <script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>           
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js">
    </script>
</head>
<body>
    <h3>Data Feedback</h3>
    <!-- data feedback -->
    <table>
        <thead>
            <tr>
                <th>Questions</th>
                <th>Average Responses</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Question 1</td>
                <td><?php echo $row[res1]?></td>
            </tr>
            <tr>
                <td>Question 2</td>
                <td><?php echo $row[res2]?></td>
            </tr>
            <tr>
                <td>Question 3</td>
                <td><?php echo $row[res3]?></td>
            </tr>
            <tr>
                <td>Question 4</td>
                <td><?php echo $row[res4]?></td>
            </tr>
        </tbody>
    </table>
    
    <!-- textual feedback -->
    <?php
    if ($result->num_rows > 0) {
        echo "<ul class='collection'>";
        while($row = $result2->fetch_assoc()) {
        if($row[fb1]!='') // if the current entry is non empty print it in the current collection else go
                echo "<li class='collection-item'>".$row[q5]."</li>";
        }
        echo "</ul>";
    }
    else {
        echo "No comments yet.";
    }
    ?>
</body>
</html>