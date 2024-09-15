<?php
/** @var \CodeIgniter\View\View $this */
$this->extend('layout/panel/main');
?>

<?=$this->section('main')?>
<div class="panel-card max">
    <div class="page-slider-wrapper">
        <div class="page-slider" style="overflow: auto">
            <div style="display: flex; gap: 1rem">
                <div class="panel-card overview white-text green" style="flex: 1;">
                    <div class="center">
                        <i class="large material-icons">meeting_room</i>
                        <p><small>Jumlah Kamar Tersedia</small></p>
                    </div>
                    <p class="counter"><span id="count-avail">0</span>/<span id="count-kamar">0</span></p>
                </div>
                <div class="panel-card overview white-text green" style="flex: 1;">
                    <div class="center">
                        <i class="large material-icons">person</i>
                        <p><small>Jumlah Pasien</small></p>
                    </div>
                    <p class="counter" id="count-pasien">0</p>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <canvas id="chart-tahunan"></canvas>
                </div>
                <div class="col s12">
                    <canvas id="chart-bulanan"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<?=$this->endSection()?>
<?=$this->section('script')?>
<script src="<?=base_url()?>js/pages/dashboard/panel.js"></script>
<?=$this->endSection()?>