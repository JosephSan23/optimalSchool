<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? 'Panel Admin' ?></title>

    <link rel="stylesheet" href="<?= base_url('assets/css/admin/adminDash.css') ?>">
    <link href='https://cdn.boxicons.com/3.0.5/fonts/basic/boxicons.min.css' rel='stylesheet'>1

    <?= $this->renderSection('styles') ?>
</head>

<body>

    <?= $this->include('admin/sidebar') ?>

    <?= $this->include('admin/header') ?>

    <div class="main">
        <div class="content">
            <?= $this->renderSection('content') ?>
        </div>
    </div>

</body>

</html>