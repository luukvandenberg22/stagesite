<?php
session_start();
if (isset($_GET['submit'])) {
    include('config.php');


    $uname = mysqli_real_escape_string($con, $_GET['username']);
    $password = mysqli_real_escape_string($con, $_GET['password']);

    if ($uname != "" && $password != "") {

        $sql_query = "select count(*) as cntUser from account where username='" . $uname . "' and password='" . $password . "'";
        $result = mysqli_query($con, $sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if ($count > 0) {
            $_SESSION['username'] = $uname;
            $_SESSION['ingelogd'] = "ja";
            header('Location: index.php');
        } else {
            echo "Invalid username and password";
        }

    }

}
?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <script src="JS/js.js"></script>
    <meta charset="UTF-8">
    <meta name="description" content="Stagair local spot">
    <meta name="keywords" content="Technolab, Stagairs, Workshops">
    <meta name="author" content="Ravi Breugom, Alexander Wallaard, Natascha van Baal">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technolab Stagairspot</title>
</head>
<header>
    <button id="button-nieuw" href="registratie/reg_form.php"><a href="registratie/reg_form.php" id="font3">Ben je
            nieuw? klik hier</a></button>
    <img id="logo" alt="Logo Technolab" src="img/WhatsApp%20Image%202018-09-20%20at%2010.44.00.jpeg">
</header>
<body>


<form id="form-login" method="GET" action="">
    <div id="font1">username</div>
    <input class="kleur-input" type="text" name="username"/><br>
    <div id="font2">password</div>
    <input class="kleur-input" type="password" name="password"/><br>
    <input type="submit" class="submit" name="submit" value="login"/><br>


</form>

</body>


<footer id="copyright">&copy; Technolab Leiden</footer>
</body>
</html> 