


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ideas</title>
    <link
    rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
  />
    <style>
                * {
          margin: 0;
          padding: 0;
          box-sizing: border-box;
        }  
        body{
            background-color: darkgray;
        }
        .H {
          width: 100%;
          height: 100%;
        }
        .H img {
          width: 600px;
          margin: 60px 30px 30px 30px;
          float: left;
          height: 400px ;
          object-fit: contain;
          /* clear: both; */
        }
        .h h1 {
          vertical-align: middle;
          text-align: justify;
          font-size: 10vh;
          padding-top: 7vh;
        }
        .h p {
          font-size: 3vh;
          line-height: 4vh;
          text-align: justify;
          margin-right: 2vw;
        }
        .header a{
            font-size: 8vh;
            color: black;
            font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
            text-shadow: 0 0 0.1em teal;
            display: inline-block;
            padding-left: 40vw;
            }

        .contain{
            display: block;
            /* border: solid black 5px;  */
            height: auto;
            clear: both;
            }
    </style>
</head>
<body>
<div class="header">
      <a href="https://the-pandey-ji.github.io/MeraIdea/"><i class="fa fa-lightbulb-o" aria-hidden="true"></i>MeraIdea </a>
    </div>
    <br><br>
</div> 
</body>
</html>

<?php
//This script will handle login
session_start();

// check if the user is already logged in
if(isset($_SESSION['username']))
{
    // header("location: welcome.html");
    // exit;
}
require_once "config.php";
$sql = "SELECT filename,title,idea FROM addideas";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    
    echo '<div class="contain">';
    echo '<div class="H">';
    echo "<img src='image/".$row['filename']."' >";
    echo '<div class="h">';
    echo "<h1>".$row["title"]."</h1>";
    echo "<p>". $row["idea"]."</p>";

    echo "</div>";
    echo "</div>";
    echo "</div>";
 
  }

} else {
  echo "0 results";
}

?>