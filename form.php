<?php
include 'connection_file.php';

if(isset($_POST['btn_submit']))
{
    $name=$_POST['username'];
    $email= $_POST['email'];
    $dob=$_POST['dob'];
    $file=($_FILES['file'] ['name']);
    move_uploaded_file($_FILES['file'] ['tmp_name'], $file);

    $sql = "INSERT INTO students VALUES ('$name', '$email', '$dob', '$file')";
    $cn = mysqli_query($cn,$sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        h1{
            text-align: center;
        }
        form{
            text-align: center;
            margin-top: 3rem;
            border: solid 2px;
            margin-left:24rem;
            margin-right:24rem;
            padding:2rem;
            border-radius:12px;
            background-color:white;
            
        }
        .alert-success{
            background-color:green;
            padding:1rem;
            color:white;
        }

        .button{
            margin-top:5rem;
            margin-left:5rem;
            color:White;
            background-color:black;
            padding:5px;
            border-radius:5px;
        }

        .para{
            text-align:center;
            font-size:25px;

        }
    </style>
</head>
<body style="background-color:whitesmoke;">
    <h1>Form</h1>
    
    <div class="form">
        <form action="" method="post" enctype="multipart/form-data">
            <label>Name:</label>
            <input type="text" name="username" id="user" value="" placeholder="Enter your name:">
            <br><br>
            <label>Email</label>
            <input type="text" name="email" id="emails" value="" placeholder="Enter your mail Id:">
        
            <br> <br>
            <label>Dob</label>
            <input type="date" name="dob" id="mobiles" value="">

            <br> <br>
            <label>Upload Resume</label>
            <input type="file" name="file" id="message" value="">

            <br> <br>
            <input type="submit" class="btn btn-primary" name="btn_submit" onclick="return checknull();" value="Submit">

            <input type="reset">
        </form>
    </div>

    <a href="display.php"><button class="button">Display</button></a>

    <div>
        <p class="para">     Form data save in database
        </p>
    </div>
        
</body>
</html>