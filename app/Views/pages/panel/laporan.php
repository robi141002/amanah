<?php
/** @var \CodeIgniter\View\View $this */
$this->extend('layout/panel/main');
?>

<?= $this->section('style') ?>
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.6/css/dataTables.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.1.2/css/buttons.dataTables.css">
<?= $this->endSection() ?>
<?= $this->section('main') ?>
<div class="panel-card max">
    <div class="page-slider-wrapper">
        <div class="page-slider">
            <div class="page-slider-header">
                <div class="page-slider-title">
                    <h4>Data Booking</h4>
                </div>
            </div>
            <div class="page-slider-body">
                <ul class="collapsible">
                    <li>
                        <div class="collapsible-header"><i class="material-icons">filter</i>Filter</div>
                        <div class="collapsible-body">
                            <div class="row">
                                <div class="col s6">
                                    <input type="text" id="date-in" name="date_in">
                                </div>
                                <div class="col s6">
                                    <input type="text" id="date-out" name="date_out">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 center white-text">
                                    <button type="button" class="btn waves-effect waves-light green darken-2"
                                        id="btn-filter">Filter</button>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                </ul>
                <table class="highlight responsive-table" id="kamar" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Kode Booking</th>
                            <th>Kamar</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Tanggal Booking</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script src="https://cdn.datatables.net/2.1.6/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.2/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.print.min.js"></script>
<script src="<?= base_url('js/air-datepicker.min.js') ?>"></script>
<script src="<?= base_url() ?>js/pages/dashboard/laporan.js"></script>
<?= $this->endSection() ?>