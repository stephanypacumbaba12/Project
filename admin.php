<?php
session_start();

// Include your database connection or settings
include("setting.php");

// Predefined admin credentials
$aid = "";
$Password = ""; // Replace with your chosen password

// Check if the admin is already logged in
if (isset($_SESSION['aid'])) {
    header("location:adminhome.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $aid = mysqli_real_escape_string($set, $_POST['aid']);
    $pass = md5($_POST['pass']);

    $select = " SELECT * FROM admin WHERE aid = '$aid' && password = '$pass' ";
    
    $result = mysqli_query($set, $select);

    $row = mysqli_fetch_array($result);

    if ($row['password'] == $pass) {
        // Admin credentials are correct
        $_SESSION['aid'] = $aid;
        header("location:adminhome.php");
        exit();
    } else {
        // Incorrect admin credentials
        $msg = "Incorrect Details";
    }
}
?>
<!DOCTYPE >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Library Management System</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
</head>

<body> <img src="images/a.jpg" class="Logo">
<div id="banner">
<span class="head">Library Management System</span><br />
<marquee class="clg" direction="right" behavior="alternate" scrollamount="1">Choose Account Type</marquee>
</div>

<br />
<br />
<br />
<br />
<br />
<br />
<br />

<div align="center">
<div id="wrapper">
<br />
<br />
<span class="SubHead">Admin Sign In</span>
<br />
<br />

<form method="post" action="">
<table border="0" cellpadding="4" cellspacing="4" class="table">
<tr><td colspan="2" align="center" class="msg"><?php echo $msg;?></td></tr>
<tr><td class="labels">Admin ID : </td><td><input type="text" name="aid" class="fields" size="25" placeholder="Enter Admin ID" required="required" /></td></tr>
<tr><td class="labels">Password : </td><td><input type="password" name="pass" class="fields" size="25" placeholder="Enter Password" required="required" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" class="Cl" value="Log in" /></td></tr>
</table>
</form>
<br />
<br />
<a href="index.php" class="link">Main Page</a>
<br />
<br />

</div>
</div>
</body>
</html>