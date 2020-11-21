<?php
session_start();
require_once "config.php";

$id = $title = $idea = "";
$title = $idea = "";
$id = $_SESSION['id'];
// echo $id;
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // Check if idea is empty
    if (empty(trim($_POST["idea"]))) {
        $idea_err = "Idea cannot be blank";
        
    }  
    else{
     $idea = trim($_POST['idea']);
    }
    
    // Check for title
    if (empty(trim($_POST['title']))) {
        $title_err = "title cannot be blank";
    }  else {
        $title = trim($_POST['title']);
    }





    $msg = ""; 

    
        $filename = $_FILES["uploadfile"]["name"]; 
        $tempname = $_FILES["uploadfile"]["tmp_name"];	 
            $folder = "image/".$filename; 
      
 
    
    // $result = mysqli_query($db, "SELECT * FROM image"); 



    // If there were no errors, go ahead and insert into the database
    if (empty($idea_err) && empty($title_err) ) {
        $sql = "INSERT INTO addideas (id,title,idea,filename) VALUES (?, ?,?,?)";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssss", $id,$param_title,$param_idea,$filename);

            // Set these parameters
            $param_idea = $idea;
            $param_title =$title;

            // Try to execute the query
            if (mysqli_stmt_execute($stmt)) {           
              move_uploaded_file($tempname, $folder);
        
    
                header("location: welcome.html");
            } else {
                echo "Something went wrong... cannot add Idea!";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
}
  
?>






<!DOCTYPE html>
<html>
<link rel="stylesheet" href="signup.css">
<link rel="stylesheet" href="login.css">

<body>


<div id="id02" class="modal" style="display:block">
      <form class="modal-content" action="" method="POST" style="width: 50%;" enctype="multipart/form-data">      
        <div class="container">



          <h1 style="  text-align: center;">Add Idea</h1>
          <p style="  text-align: center;">Please fill in this form to add an Idea.</p>
          <hr>
          <label for="title"><b>Title</b></label>
          <input type="text" placeholder="Title" name="title" required>
    
        <b>Idea</b>
        <br>
          <textarea rows="10" cols="50" type="text" placeholder="Enter text here ..." name="idea" required>
        </textarea>
    <input type="file" name="uploadfile" value=""/>
          <p>This can be a world changing Idea.</p>
    
          <div class="clearfix">
            <button type="button" onclick="window.location.href='welcome.html'" class="cancelbtn">Cancel</button>
            <button type="submit" class="signupbtn">Submit</button>
          </div>
        </div>
      </form>
    </div>


</body>

</html>