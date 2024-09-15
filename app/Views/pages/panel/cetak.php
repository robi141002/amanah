<?php
/** @var \CodeIgniter\View\View $this */
$this->extend('layout/panel/main');
?>
<?=$this->section('style')?>
<link rel="stylesheet" href="<?=base_url('css/pages/form.css')?>">
<?=$this->endSection()?>
<?=$this->section('main')?>
<div class="panel-card max">
    <div class="page-slider-wrapper">
        <div class="page-slider">
            <div class="page-slider-header">
                <div class="page-slider-title">
                    <h4>Cetak Invoice Booking</h4>
                </div>
            </div>
            <div class="page-slider-body">
                <table class="highlight responsive-table" id="kamar" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Kode Booking</th>
                            <th>Kamar</th>
                            <th>Tanggal Booking</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div id="modal-invoice" class="modal">
    <div class="modal-content">
        <h4>Invoice</h4>
        <iframe src="#!" id="invoice" frameborder="0" style="width: 100%; height: 40rem"></iframe>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Tutup</a>
    </div>
</div>
<?=$this->endSection()?>
<?=$this->section('script')?>
<script src="<?=base_url()?>js/pages/dashboard/cetak.js"></script>
<?=$this->endSection()?>