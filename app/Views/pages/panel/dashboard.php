<?php
/** @var \CodeIgniter\View\View $this */
$this->extend('layout/panel/main');
?>

<?= $this->section('main') ?>
<div class="panel-card overview white-text green">
    <div class="center">
        <i class="large material-icons">meeting_room</i><p><small>Jumlah Kamar</small></p>
    </div>
    <p class="counter" id="count-kamar">0</p>
</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script src="<?= base_url() ?>js/pages/dashboard/panel.js"></script>
<?= $this->endSection() ?>