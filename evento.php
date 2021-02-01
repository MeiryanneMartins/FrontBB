<?php
session_start();
include('config.php');
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    $query = $connection->prepare("SELECT * FROM users WHERE email=:email");
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->execute();
    if ($query->rowCount() > 0) {
        echo '<p class="error">E-mail Já Registrado!</p>';
    }
    if ($query->rowCount() == 0) {
        $query = $connection->prepare("INSERT INTO users(username,password,email) VALUES (:username,:password_hash,:email)");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $result = $query->execute();
        if ($result) {
            echo '<p class="success">Seu Registro foi Efetuado!</p>';
        } else {
            echo '<p class="error">Erro ao tentar Registrar!</p>';
        }
    }
}
?>

<head>
  <link rel="stylesheet" type="text/css" href="login.CSS">
</head>
<body>

    <form class="box" action="" method="post" name="signin-form">

        <h1>BEM BRASIL</h1>
        <input type="text" name="username" placeholder="NOME DO EVENTO">
        <input id="date" type="date">
        <input type="email" name="email" placeholder="EMAIL PARA LEMBRETE">
        <a href="Painel.php.html">VOLTAR</a>
    </form>

</body>