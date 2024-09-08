<?php
/** @var \CodeIgniter\View\View $this */
?>

<!DOCTYPE html>
<html>

<head>
    <!--Import Google Icon Font-->
    <?= $this->include('layout/head') ?>
    <?= $this->renderSection('head') ?>
    <?= $this->include('layout/style') ?>
    <link type="text/css" rel="stylesheet" href="<?= base_url('css/pages/auth.css') ?>" />
    <?= $this->renderSection('style') ?>
</head>

<body>
    <div class="parent-wrapper">
        <?= $this->renderSection('main') ?>
    </div>
    <!--JavaScript at end of body for optimized loading-->
    <?= $this->include('layout/script') ?>
    <script>
        const baseUrl = '<?= base_url() ?>';
    </script>
    <?= $this->renderSection('script') ?>
</body>

</html>