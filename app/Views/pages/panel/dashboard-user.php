<?php
/** @var \CodeIgniter\View\View $this */
$this->extend('layout/panel/main');
?>

<?=$this->section('main')?>
<div class="panel-card max">
    <div class="page-slider-wrapper">
        <div class="page-slider">
            <div class="panel-card overview white-text green">
                <div class="center">
                    <i class="large material-icons">meeting_room</i>
                    <p><small>Jumlah Kamar Tersedia</small></p>
                </div>
                <p class="counter"><span id="count-avail">0</span>/<span id="count-kamar">0</span></p>
            </div>
            <div class="panel-card overview white-text green">
                <div class="center">
                    <i class="large material-icons">book</i>
                    <p><small>Jumlah Booking</small></p>
                </div>
                <p class="counter" id="count-booking">0</p>
            </div>
            <div class="panel-card overview white-text purple darken-3">
                <span>Sudah siap untuk melakukan pemesanan ruangan ?</span>
                <a href="<?=base_url('panel/booking')?>?booking=true" class="btn waves-effect waves-light white-text purple darken-4">Booking Sekarang</a>
            </div>
        </div>
    </div>
</div>
<?=$this->endSection()?>
<?=$this->section('script')?>
<script src="<?=base_url()?>js/pages/dashboard/panel-user.js"></script>
<?=$this->endSection()?>