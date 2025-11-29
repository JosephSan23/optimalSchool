<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? 'Panel Admin' ?></title>

    <link rel="stylesheet" href="<?= base_url('assets/css/dashBoard.css?v=' . time()) ?>">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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