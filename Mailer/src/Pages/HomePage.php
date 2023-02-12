<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
</head>
<body>
<div class="container">

    <header>
        <h1>Home Page</h1>
    </header>

    <main>

            <div class="write_email">

                <form method="post" action="../Sender/Send.php">

                <label>Wpisz poprawny adres e-mail:
                    <input type="email" name="email" <?= isset($_SESSION['given_email']) ? 'value="' . $_SESSION['given_email'] . '"' : '' ?>>
                </label>
                <input type="submit" value="Wyślij">

                <?php
                if (isset($_SESSION['given_email'])) {
                    echo '<p class="error">To nie jest poprawny adres!</p>';
                    unset($_SESSION['given_email']);
                }
                ?>

                </form>

            </div>

            <div style="clear:both"></div>

    </main>

</div>
</body>
</html>
