<?php
/** @var \CodeIgniter\View\View $this */
$this->extend('layout/panel/main');
?>

<?= $this->section('main') ?>
<div class="panel-card max">
    <div class="page-slider-wrapper">
        <div class="page-slider">
            <div class="page-slider-header">
                <div class="page-slider-title">
                    <h4>Daftar Kamar</h4>
                    <div style="display: flex; gap: 5px;">
                        <a href="#!" class="btn-header-slider btn-slider green" data-title="Tambah Kamar"
                            data-target="form">
                            <i class="material-icons">add</i>
                        </a>
                        <!-- <a href="#!" class="btn-header-slider btn-slider red" data-title="Jadwal Singgah"
                            data-target="jadwal">
                            <i class="material-icons">calendar_month</i>
                        </a> -->
                    </div>
                </div>
            </div>
            <div class="page-slider-body">
                <table class="highlight responsive-table" id="kamar" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Nama Kamar</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
        <div class="page-slider" data-slider="form">
            <div class="page-slider-header">
                <div class="page-slider-title">
                    <div style="display: flex; gap: 5px;">
                        <a href="#!" class="btn-header-slider btn-slider dispose grey" data-title="Kembali">
                            <i class="material-icons">arrow_back</i>
                        </a>
                    </div>
                    <h4>Data Kamar</h4>
                </div>
            </div>
            <div class="page-slider-body">
                <form class="col s12" method="post" id="form-kamar">
                    <input type="hidden" name="id">
                    <div class="container">
                        <div class="row">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="name" name="name" type="text" class="validate" required>
                                    <label for="name">Nama Kamar</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea id="desc" name="desc" class="materialize-textarea"></textarea>
                                    <label for="desc">Deskripsi</label>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="page-slider-footer">
                <div></div>
                <div>
                    <button class="btn waves-effect waves-light green" type="submit" name="action">Simpan</button>
                    </form>
                </div>
                <div></div>
            </div>
        </div>
        <div class="page-slider" data-slider="jadwal">
            <div class="page-slider-header">
                <div class="page-slider-title">
                    <div style="display: flex; gap: 5px;">
                        <a href="#!" class="btn-header-slider btn-slider dispose grey" data-title="Kembali">
                            <i class="material-icons">arrow_back</i>
                        </a>
                    </div>
                    <h4>Jadwal Kamar</h4>
                </div>
            </div>
            <div class="page-slider-body">
                <div class="row">
                    <div class="input-field col s12">
                        <select id="list-kamar">
                            <option value="" disabled selected>Pilih Kamar</option>
                        </select>
                        <label>Materialize Select</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <div id="schedule"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script src="<?= base_url() ?>js/pages/dashboard/kamar.js"></script>
<?= $this->endSection() ?>