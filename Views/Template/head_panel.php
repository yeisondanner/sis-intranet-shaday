<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['page_tag'] ?></title>
    <link rel="stylesheet" href="<?= media() . $data['page_libraries']['css'] ?>">
    <link rel="stylesheet" href="<?= media() ?>/css/alerts.css">
    <link rel="shortcut icon" href="<?= media() ?>/images/Logo.png" type="image/x-icon">

</head>

<body>
    <!-- Loader -->
    <div class="loader">
        <img src="<?= media() ?>/images/Logo.png" alt="Logo Shaday">
    </div>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <img src="<?= media() ?>/images/Logo.png" alt="Logo" class="logo">
            <h2>Intranet Shaday</h2>
        </div>
        <ul class="sidebar-menu">
            <li><a href="<?= base_url() ?>dashboard" class="<?= activeMenu($data, 2) ?>">Inicio</a></li>
            <?php if ($_SESSION['user_type'] == "estudiante"): ?>
                <li><a href="<?= base_url() ?>notas" class="<?= activeMenu($data, 3) ?>">Notas</a></li>
            <?php endif; ?>
            <?php if ($_SESSION['user_type'] == "docente"): ?>
                <li><a href="<?= base_url() ?>notas/set" class="<?= activeMenu($data, 4) ?>">Ingreso Notas</a></li>
            <?php endif; ?>
            <?php if ($_SESSION['user_type'] == "docente"): ?>
                <li><a href="<?= base_url() ?>estudiante/set" class="<?= activeMenu($data, 5) ?>">Registro Estudiantes</a>
                </li>
            <?php endif; ?>
            <li><a href="" id="logOut">Cerrar Sesión</a></li>
        </ul>
    </div>