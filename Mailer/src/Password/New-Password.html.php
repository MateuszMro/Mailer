<?php
session_start();

$password = $_POST['password'];
$password2 = $_POST['password2'];
function validatePassword($password, $password2) {
    $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
    if (!preg_match($pattern, $password)) {
        $_SESSION['e_haslo']="Hasło musi mieć co najmniej 8 znaków, zawierać co najmniej jedną małą i dużą literę, cyfrę i znak specjalny.";
        return false;
    }
    if ($password == null){
        echo "";
        return true;
    }
    if ($password !== $password2) {
        $_SESSION['e_haslo']="Podane hasła nie są identyczne.";
        return false;
    }
    return true;
}

if (validatePassword($password, $password2)) {

    header('Location: End-New-Password.html.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset password</title>
</head>
<body>
<h2>
    Poniżej możesz ustawić nowe hasło
</h2>
<form method="post">
    <ul>
    <label>Podaj nowe hasło</label>
        <label for="password"></label><input type="password" id="password" name="password">

    </ul>
    <ul>
    <label>Powtórz nowe hasło</label>
        <label for="password2"></label><input type="password" id="password2" name="password2">

    </ul>
    <ul>
    <button type="submit">Zatwierdź</button>
        <?php
        if (isset($_SESSION['e_haslo']))
        {
            echo '<div class="error" >'.$_SESSION['e_haslo'].'</div>';
            unset($_SESSION['e_haslo']);
        }

        ?>
    </ul>
</form>
</body>
</html>