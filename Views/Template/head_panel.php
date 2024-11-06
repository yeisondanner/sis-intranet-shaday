<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['page_tag'] ?></title>
    <link rel="stylesheet" href="<?= media() . $data['page_libraries']['css'] ?>">
</head>

<body>
    <!-- Loader -->
    <div class="loader">
        <img src="<?= media() ?>/images/Logo.png" alt="Logo Shaday">
    </div>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <img src="images/Logo.png" alt="Logo" class="logo">
            <h2>Intranet Shaday</h2>
        </div>
        <ul class="sidebar-menu">
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Perfil</a></li>
            <li><a href="#">Notas</a></li>
            <li><a href="#">Documentos</a></li>
            <li><a href="#">Ajustes</a></li>
            <li><a href="index.html">Cerrar Sesión</a></li>
        </ul>
    </div>