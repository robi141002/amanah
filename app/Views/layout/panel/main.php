<?php
/** @var \CodeIgniter\View\View $this */
?>

<!DOCTYPE html>
<html>

<head>
    <!--Import Google Icon Font-->
    <?=$this->include('layout/head')?>
    <?=$this->renderSection('head')?>
    <?php if ($withDatatables): ?>
    <link href="<?=base_url()?>css/datatables.min.css" rel="stylesheet">
    <?php endif?>
    <?=$this->include('layout/style')?>
    <link rel="stylesheet" href="<?=base_url('css/air-datepicker.min.css')?>">
    <link type="text/css" rel="stylesheet" href="<?=base_url('css/pages/panel.css')?>" />
    <?=$this->renderSection('style')?>
</head>

<body>
    <div class="parent-wrapper">
        <div class="panel-nav-wrapper">
            <div class="panel-nav-container">
                <?=$this->include('layout/panel/nav')?>
            </div>
        </div>
        <div class="panel-content-wrapper">
            <?=$this->renderSection('main')?>
        </div>
        <div class="fixed-action-btn">
            <a class="btn-floating btn-large panel-nav-toggler green">
                <i class="large material-icons">menu</i>
            </a>
        </div>
    </div>
    <!--JavaScript at end of body for optimized loading-->
    <?=$this->include('layout/script')?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js"
        integrity="sha512-CQBWl4fJHWbryGE+Pc7UAxWMUMNMWzWxF4SQo9CgkJIN1kx6djDQZjh3Y8SZ1d+6I+1zze6Z7kHXO7q3UyZAWw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?=base_url()?>js/html2canvas.min.js"></script>
    <script src="<?=base_url()?>js/html2pdf.bundle.min.js"></script>
    <script src="<?=base_url()?>js/jspdf.umd.min.js"></script>
    <?php if ($withDatatables): ?>
    <script src="<?=base_url()?>js/datatables.min.js"></script>
    <?php endif?>
    <script>
    <?php if ($withDatatables): ?>
    const dt = new DataTable('.init-datatables', {
        responsive: true
    });
    <?php endif?>
    const listMenu = <?=json_encode($menu)?>;
    const menuContainer = $('.menu-container');
    const page = '<?=$page?>';
    const baseUrl = '<?=base_url()?>';
    const withDatatables = <?= $withDatatables ? 'true' : 'false'?>;
    </script>
    <script src="<?=base_url()?>js/pages/dashboard/main.js"></script>
    <?=$this->renderSection('script')?>
</body>

</html>