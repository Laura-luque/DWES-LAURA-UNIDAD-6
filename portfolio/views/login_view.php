<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Porfolio</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <header>
        <h1>Bienvenido!</h1>
    </header>

    <nav>
        <ul>
            <li><a href="/">Inicio</a></li>
            <!-- <li><a href="/login">Iniciar sesión</a></li> -->
            <li><a href="/registrar">Registrarse</a></li>
        </ul>
    </nav>
    <!-- Formulario de login -->
    <section id="login">
        <h2>Iniciar Sesión</h2>
        <form action="/login" method="post">
                <label for="usuario">Usuario:</label>
                <input type="text" id="nombre" name="nombre" required>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
                <input type="submit" name="submit" value="Iniciar Sesión">
        </form>
    </section>

    <footer>
    <p>Porfolio</p>
    </footer>
</body>

</html>