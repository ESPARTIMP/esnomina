<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <!-- Iconos opcionales para Google/Facebook -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <!-- CSS del login -->
  <link rel="stylesheet" href="/Esnomina/assets/css/login.css">
</head>
<body>

  <div class="background">
  </div>

  <form>
    <h3>Login Here</h3>

    <label for="username">Usuario</label>
    <input type="text" id="username" placeholder="Email o Teléfono" autocomplete="username" required>

    <label for="password">Contraseña</label>
    <input type="password" id="password" placeholder="Password" autocomplete="current-password" required>

    <button type="submit">Iniciar Sesion</button>

  </form>
</body>
</html>
