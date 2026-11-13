<?php
require_once __DIR__ . '/userList.inc.php';

$errors = [];
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    // 1. Validar datos recibidos
    if ($username === '') {
        $errors[] = 'El usuario es obligatorio.';
    }
    if ($password === '') {
        $errors[] = 'La contraseña es obligatoria.';
    }

    if (count($errors) === 0) {
        // 2. Buscar usuario
        $user = userExists($username, $users);

        if ($user === false) {
            $errors[] = 'El usuario no existe.';
        } elseif (!$user->login($password)) {
            // 3. Comprobar contraseña
            $errors[] = 'Contraseña incorrecta.';
        } else {
            $message = "Login correcto. Bienvenido, $user";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Agenda de contactos</h1>

    <?php foreach ($errors as $error): ?>
        <p style="color:red"><?= htmlspecialchars($error) ?></p>
    <?php endforeach; ?>

    <?php if ($message !== ''): ?>
        <p style="color:green"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

    <form method="post">
        <label>Usuario: <input type="text" name="username"></label><br>
        <label>Contraseña: <input type="password" name="password"></label><br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>
