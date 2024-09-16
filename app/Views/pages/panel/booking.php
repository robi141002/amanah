<?php
/** @var \CodeIgniter\View\View $this */
$this->extend('layout/panel/main');
?>

<?=$this->section('main')?>
<div class="panel-card max">
    <div class="page-slider-wrapper">
        <div class="page-slider">
            <div class="page-slider-header">
                <div class="page-slider-title">
                    <h4>Data Booking</h4>
                </div>
            </div>
            <div class="page-slider-body">
                <table class="highlight responsive-table" id="kamar" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Kode Booking</th>
                            <th>Kamar</th>
                            <th>Nama</th>
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

<div id="modal-info" class="modal">
    <div class="modal-content">
        <h4>Info Booking</h4>
        <form class="col s12" action="<?=url_to('register')?>" method="post" id="form-info">
            <div class="container">
                <input type="hidden" name="room_id">
                <div class="room-selector">
                </div>
                <hr>
                <div class="center"><small>Data Pasien</small></div>
                <hr>
                <div class="row">
                    <div class="input-field col s6">
                        <input placeholder="Masukkan Nama Pasien" id="name" name="name" type="text" class="validate"
                            disabled>
                        <label for="name">Nama Pasien</label>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="Masukkan Nomor HP Pasien" id="phone" name="phone" type="tel"
                            class="validate" disabled>
                        <label for="phone">Nomor HP Pasien</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <select name="jenis_kelamin" disabled>
                            <option value="" disabled selected>Pilih Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="Masukkan Tanggal Lahir Pasien" id="birthdate" name="birthdate" type="text"
                            class="validate datepicker" disabled>
                        <label for="birthdate">Tanggal Lahir Pasien</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <select name="kriteria" disabled>
                            <option value="" disabled selected>Pilih Kriteria Pasien</option>
                            <option value="Anak-anak">Anak-anak</option>
                            <option value="Dewasa">Dewasa</option>
                        </select>
                        <label for="kriteria">Kriteria Pasien</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="address" name="address" class="materialize-textarea" disabled></textarea>
                        <label for="address">Alamat Pasien</label>
                    </div>
                </div>
                <hr>
                <div class="center"><small>Data Pendamping</small></div>
                <hr>
                <div class="row">
                    <div class="input-field col s6">
                        <input placeholder="Masukkan Nama Pendamping" id="pendamping_name" name="pendamping_name"
                            type="text" class="validate" disabled>
                        <label for="pendamping_name">Nama Pendamping</label>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="Masukkan Nomor HP Pendamping" id="pendamping_phone" name="pendamping_phone"
                            type="tel" class="validate" disabled>
                        <label for="pendamping_phone">Nomor HP Pendamping</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="pendamping_address" name="pendamping_address"
                            class="materialize-textarea" disabled></textarea>
                        <label for="pendamping_address">Alamat Pendamping (Opsional)</label>
                    </div>
                </div>
            </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Tutup</a>
        </form>
    </div>
</div>
<?=$this->endSection()?>
<?=$this->section('script')?>
<script src="<?=base_url()?>js/pages/dashboard/booking.js"></script>
<?=$this->endSection()?>