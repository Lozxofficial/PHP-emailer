<!DOCTYPE HTML>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$fname = $lname = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["fname"])) {
        $nameErr = "Name is required";
    } else {
        $lname = test_input($_POST["fname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["lname"])) {
        $nameErr = "Name is required";
    } else {
        $fname = test_input($_POST["lname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["website"])) {
        $website = "";
    } else {
        $website = test_input($_POST["website"]);
        // check if URL address syntax is valid
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
            $websiteErr = "Invalid URL";
        }
    }

    if (empty($_POST["comment"])) {
        $comment = "";
    } else {
        $comment = test_input($_POST["comment"]);
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = test_input($_POST["gender"]);
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<div class="container-fluid p-5 bg-primary text-white text-center">
    <h1>test form or som shit</h1>
    <a href="do-not-prest.html">do not press</a>
</div>

<div class="container mt-3">
    <h2>idk</h2>
    <form action="/index.php" method="post">
        <div class="mb-3 mt-3">
            <label for="fname">name</label>
            <input type="text" class="form-control" id="fname" name="fname" value="">
        </div>
        <div class="mb-3">
            <label for="lname">last name</label>
            <input type="text" class="form-control" id="lname" name="lname" value="">
        </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="">
        </div>
        <div class="mb-3">
            <label for="comment">comment</label>
            <input type="text" class="form-control" id="comment" name="comment" value="">
        </div>
        <input type="submit" class="btn btn-primary" id="doit" value="JUST DO IT">
    </form>
</div>

<?php
echo "<h2>Your Input:</h2>";
echo "name: ";
echo $fname;
echo " ";
echo $lname;
echo "<br>";
echo "email: ";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
// get the immediate IP address
echo 'Client IP making the request: ' . $_SERVER['REMOTE_ADDR'];

?>

<?php
$to = "test@test.php.e.lozx.co.uk";
$subject = "HTML email";

$message = "
<html>
<head>
<title>{$email} has emaild you</title>
</head>
<body>
<p>comment from {$email}: {$comment}</p>
<p> {$_SERVER['REMOTE_ADDR']} </p>
<table>
<tr>
<th>{$lname}</th>
<th>{$fname}</th>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= "From: {$email}" . "\r\n";
$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($to,$subject,$message,$headers);
include "";
?>
