<?php
/** @var \CodeIgniter\View\View $this */
?>

<!DOCTYPE html>
<html>

<head>
    <!--Import Google Icon Font-->
    <?= $this->include('layout/head') ?>
    <?= $this->renderSection('head') ?>
    <link href="<?= base_url() ?>css/datatables.min.css" rel="stylesheet">
    <?= $this->include('layout/style') ?>
    <link type="text/css" rel="stylesheet" href="<?= base_url('css/pages/panel.css') ?>" />
    <?= $this->renderSection('style') ?>
</head>

<body>
    <div class="parent-wrapper">
        <div class="panel-nav-wrapper">
            <div class="panel-nav-container">
                <?= $this->include('layout/panel/nav') ?>
            </div>
        </div>
        <div class="panel-content-wrapper">
            <?= $this->renderSection('main') ?>
        </div>
        <div class="fixed-action-btn">
            <a class="btn-floating btn-large panel-nav-toggler green">
                <i class="large material-icons">menu</i>
            </a>
        </div>
    </div>
    <!--JavaScript at end of body for optimized loading-->
    <?= $this->include('layout/script') ?>
    <script src="<?= base_url() ?>js/datatables.min.js"></script>
    <script>
        const dt = new DataTable('.init-datatables', {
            responsive: true
        });
        const listMenu = <?= json_encode($menu) ?>;
        const menuContainer = $('.menu-container');
        const page = '<?= $page ?>';
        const baseUrl = '<?= base_url() ?>';
    </script>
    <script src="<?= base_url() ?>js/pages/dashboard/main.js"></script>
    <?= $this->renderSection('script') ?>
</body>

</html>