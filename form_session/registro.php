<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <h3>Registro Usuarios</h3>
    <form action="agregar_usuario.php" method="POST">
        <input type="text" name="nombre_usuario" placeholder="Ingresa Usuario">
        <input type="text" name="contrasena" placeholder="Ingresa contraseña">
        <input type="text" name="contrasena2" placeholder="Ingresa nuevamente la contraseña">
        <button type="submit">Guardar</button>
    </form>

    <h3>Login</h3>
    <form action="login.php" method="POST">
        <input type="text" name="nombre_usuario" placeholder="Ingresa Usuario">
        <input type="text" name="contrasena" placeholder="Ingresa contraseña">
        <button type="submit">Guardar</button>
    </form>
</body>
</html>