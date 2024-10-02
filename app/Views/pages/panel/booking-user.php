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
                    <h4>Data Booking</h4>
                </div>
            </div>
            <div class="center" style="display: flex; gap: 5px;">
                <a href="#!" class="btn-header-slider uncollapse btn-slider green" data-target="form"
                    style="font-size: 1.5rem; height: 3remx;">
                    <i class="material-icons" style="font-size: 1.5rem;">add</i> Booking
                </a>
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
        <div class="page-slider<?=$booking ? " active" : ""?>" data-slider="form">
            <div class="page-slider-header">
                <div class="page-slider-title">
                    <div style="display: flex; gap: 5px;">
                        <a href="#!" class="btn-header-slider btn-slider dispose grey" data-title="Kembali">
                            <i class="material-icons">arrow_back</i>
                        </a>
                    </div>
                    <h4>Booking</h4>
                </div>
            </div>
            <div class="page-slider-body">
                <form method="POST" id="form-booking" enctype="multipart/form-data">
                    <div class="form-wrapper">
                        <div class="part form-tanggal">
                            <h3 class="center"><b>Pilih Tanggal Terlebih Dahulu</b></h3>
                            <div class="container">
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input type="text" id="date-in" name="date_in">
                                        <label for="date-in">Tanggal Masuk</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input type="text" id="date-out" name="date_out">
                                        <label for="date-out">Tanggal Keluar</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 center white-text">
                                        <button type="button" class="btn waves-effect waves-light red darken-2"
                                            id="btn-check">Cek
                                            Tanggal</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="part loader center hide">
                            <div class="preloader-wrapper big active">
                                <div class="spinner-layer spinner-blue">
                                    <div class="circle-clipper left">
                                        <div class="circle"></div>
                                    </div>
                                    <div class="gap-patch">
                                        <div class="circle"></div>
                                    </div>
                                    <div class="circle-clipper right">
                                        <div class="circle"></div>
                                    </div>
                                </div>

                                <div class="spinner-layer spinner-red">
                                    <div class="circle-clipper left">
                                        <div class="circle"></div>
                                    </div>
                                    <div class="gap-patch">
                                        <div class="circle"></div>
                                    </div>
                                    <div class="circle-clipper right">
                                        <div class="circle"></div>
                                    </div>
                                </div>

                                <div class="spinner-layer spinner-yellow">
                                    <div class="circle-clipper left">
                                        <div class="circle"></div>
                                    </div>
                                    <div class="gap-patch">
                                        <div class="circle"></div>
                                    </div>
                                    <div class="circle-clipper right">
                                        <div class="circle"></div>
                                    </div>
                                </div>

                                <div class="spinner-layer spinner-green">
                                    <div class="circle-clipper left">
                                        <div class="circle"></div>
                                    </div>
                                    <div class="gap-patch">
                                        <div class="circle"></div>
                                    </div>
                                    <div class="circle-clipper right">
                                        <div class="circle"></div>
                                    </div>
                                </div>
                            </div>
                            <p></p>
                        </div>
                        <div class="part unavailable hide">
                            <h5>Sayang sekali, di tanggal yang anda pilih tidak terdapat kamar yang tersedia :(</h5>
                            <div class="container">
                                <div class="row">
                                    <div class="col s12 center">
                                        <button type="button"
                                            class="btn waves-effect waves-light green darken-2 btn-back"
                                            data-target="form-tanggal"><i class="material-icons left">arrow_back</i>
                                            Kembali</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="part form-ready hide">
                            <h3 class="center"><b>FORM BOOKING</b></h3>
                            <p class="center date-ready"><em>Silahkan lengkapi persyaratan di bawah ini</em></p>
                            <div class="container">
                                <input type="hidden" name="room_id">
                                <div class="room-selector">
                                </div>
                                <hr>
                                <div class="center"><small>Data Pasien</small></div>
                                <hr>
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input placeholder="Masukkan Nama Pasien" id="name" name="name" type="text"
                                            class="validate" required>
                                        <label for="name">Nama Pasien</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input placeholder="Masukkan Nomor HP Pasien" id="phone" name="phone" type="tel"
                                            class="validate" required>
                                        <label for="phone">Nomor HP Pasien</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s6">
                                        <select name="jenis_kelamin">
                                            <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input placeholder="Masukkan Tanggal Lahir Pasien" id="birthdate"
                                            name="birthdate" type="text" class="validate datepicker" required>
                                        <label for="birthdate">Tanggal Lahir Pasien</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s6">
                                        <select name="kriteria">
                                            <option value="" disabled selected>Pilih Kriteria Pasien</option>
                                            <option value="Anak-anak">Anak-anak</option>
                                            <option value="Dewasa">Dewasa</option>
                                        </select>
                                        <label for="kriteria">Kriteria Pasien</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea id="address" name="address" class="materialize-textarea"
                                            required></textarea>
                                        <label for="address">Alamat Pasien</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="file-field input-field col s6">
                                        <div class="btn">
                                            <span>File</span>
                                            <input type="file" accept="image/png, image/gif, image/jpeg" name="kk"
                                                required>
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text"
                                                placeholder="Foto Kartu Keluarga Pasien">
                                        </div>
                                    </div>
                                    <div class="file-field input-field col s6">
                                        <div class="btn">
                                            <span>File</span>
                                            <input type="file" accept="image/png, image/gif, image/jpeg" name="ktp"
                                                required>
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text" placeholder="Foto KTP Pasien">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="file-field input-field col s6">
                                        <div class="btn">
                                            <span>File</span>
                                            <input type="file" accept="image/png, image/gif, image/jpeg" name="rujukan"
                                                required>
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text"
                                                placeholder="Foto Surat Rujukan RS/Dokter">
                                        </div>
                                    </div>
                                    <div class="file-field input-field col s6">
                                        <div class="btn">
                                            <span>File</span>
                                            <input type="file" accept="image/png, image/gif, image/jpeg" name="bpjs"
                                                required>
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text"
                                                placeholder="Foto BPJS kelas 3">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="file-field input-field col s6">
                                        <div class="btn">
                                            <span>File</span>
                                            <input type="file" accept="image/png, image/gif, image/jpeg" name="pasfoto"
                                                required>
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text"
                                                placeholder="Foto Terbaru Pasien">
                                        </div>
                                    </div>
                                    <div class="file-field input-field col s6">
                                        <div class="btn">
                                            <span>File</span>
                                            <input type="file" accept="image/png, image/gif, image/jpeg" name="sktm">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text"
                                                placeholder="Foto SKTM (bila ada)">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="center"><small>Data Pendamping</small></div>
                                <hr>
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input placeholder="Masukkan Nama Pendamping" id="pendamping_name"
                                            name="pendamping_name" type="text" class="validate" required>
                                        <label for="pendamping_name">Nama Pendamping</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input placeholder="Masukkan Nomor HP Pendamping" id="pendamping_phone"
                                            name="pendamping_phone" type="tel" class="validate" required>
                                        <label for="pendamping_phone">Nomor HP Pendamping</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea id="pendamping_address" name="pendamping_address"
                                            class="materialize-textarea"></textarea>
                                        <label for="pendamping_address">Alamat Pendamping (Opsional)</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="file-field input-field col s6">
                                        <div class="btn">
                                            <span>File</span>
                                            <input type="file" accept="image/png, image/gif, image/jpeg"
                                                name="pendamping_ktp" required>
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text"
                                                placeholder="Foto KTP Pendamping">
                                        </div>
                                    </div>
                                    <div class="file-field input-field col s6">
                                        <div class="btn">
                                            <span>File</span>
                                            <input type="file" accept="image/png, image/gif, image/jpeg"
                                                name="pendamping_pasfoto" required>
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text"
                                                placeholder="Foto Terbaru Pendamping">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 center">
                                        <button type="submit"
                                            class="btn waves-effect waves-light green darken-2">Kirim</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="part done green-text hide">
                            <div class="center"><i class="large material-icons">task_alt</i></div>
                            <h3 class="center"><b>Terima Kasih</b></h3>
                            <p class="center black-text">Data booking anda sudah tersimpan, anda dapat menunjukkan
                                identitas pada resepsionis untuk mengkonfirmasi</p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="page-slider-footer">
            </div>
        </div>
    </div>
</div>

<div id="modal-revisi" class="modal">
    <div class="modal-content">
        <h4>Info Booking</h4>
        <form class="col s12" action="<?=url_to('register')?>" method="post" id="form-revisi">
        <p class="center">Keterangan :</p>   
        <b><p class="center" id="keterangan-revisi" name="keterangan-revisi"></p></b>
            <div class="container">
                <input type="hidden" name="id">
                <hr>
                <div class="center"><small>Data Pasien</small></div>
                <hr>
                <div class="row">
                    <div class="input-field col s6">
                        <input placeholder="Masukkan Nama Pasien" id="name" name="name" type="text" class="validate">
                        <label for="name">Nama Pasien</label>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="Masukkan Nomor HP Pasien" id="phone" name="phone" type="tel"
                            class="validate">
                        <label for="phone">Nomor HP Pasien</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <select name="jenis_kelamin">
                            <option value="" selected>Pilih Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="Masukkan Tanggal Lahir Pasien" id="birthdate" name="birthdate" type="text"
                            class="validate datepicker">
                        <label for="birthdate">Tanggal Lahir Pasien</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <select name="kriteria">
                            <option value="" selected>Pilih Kriteria Pasien</option>
                            <option value="Anak-anak">Anak-anak</option>
                            <option value="Dewasa">Dewasa</option>
                        </select>
                        <label for="kriteria">Kriteria Pasien</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="address" name="address" class="materialize-textarea"></textarea>
                        <label for="address">Alamat Pasien</label>
                    </div>
                </div>
                <div class="row">
                    <div class="file-field input-field col s6">
                        <div class="btn">
                            <span>File</span>
                            <input type="file" accept="image/png, image/gif, image/jpeg" name="kk">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Foto Kartu Keluarga Pasien">
                        </div>
                    </div>
                    <div class="file-field input-field col s6">
                        <div class="btn">
                            <span>File</span>
                            <input type="file" accept="image/png, image/gif, image/jpeg" name="ktp">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Foto KTP Pasien">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="file-field input-field col s6">
                        <div class="btn">
                            <span>File</span>
                            <input type="file" accept="image/png, image/gif, image/jpeg" name="rujukan">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Foto Surat Rujukan RS/Dokter">
                        </div>
                    </div>
                    <div class="file-field input-field col s6">
                        <div class="btn">
                            <span>File</span>
                            <input type="file" accept="image/png, image/gif, image/jpeg" name="bpjs">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Foto BPJS kelas 3">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="file-field input-field col s6">
                        <div class="btn">
                            <span>File</span>
                            <input type="file" accept="image/png, image/gif, image/jpeg" name="pasfoto">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Foto Terbaru Pasien">
                        </div>
                    </div>
                    <div class="file-field input-field col s6">
                        <div class="btn">
                            <span>File</span>
                            <input type="file" accept="image/png, image/gif, image/jpeg" name="sktm">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Foto SKTM (bila ada)">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="center"><small>Data Pendamping</small></div>
                <hr>
                <div class="row">
                    <div class="input-field col s6">
                        <input placeholder="Masukkan Nama Pendamping" id="pendamping_name" name="pendamping_name"
                            type="text" class="validate">
                        <label for="pendamping_name">Nama Pendamping</label>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="Masukkan Nomor HP Pendamping" id="pendamping_phone" name="pendamping_phone"
                            type="tel" class="validate">
                        <label for="pendamping_phone">Nomor HP Pendamping</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="pendamping_address" name="pendamping_address"
                            class="materialize-textarea"></textarea>
                        <label for="pendamping_address">Alamat Pendamping (Opsional)</label>
                    </div>
                </div>
                <div class="row">
                    <div class="file-field input-field col s6">
                        <div class="btn">
                            <span>File</span>
                            <input type="file" accept="image/png, image/gif, image/jpeg" name="pendamping_ktp">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Foto KTP Pendamping">
                        </div>
                    </div>
                    <div class="file-field input-field col s6">
                        <div class="btn">
                            <span>File</span>
                            <input type="file" accept="image/png, image/gif, image/jpeg" name="pendamping_pasfoto">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Foto Terbaru Pendamping">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 center">
                        <button type="submit" class="btn waves-effect waves-light green darken-2">Kirim</button>
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
<script src="<?=base_url('js/air-datepicker.min.js')?>"></script>
<script src="<?=base_url()?>js/pages/dashboard/booking-user.js"></script>
<?=$this->endSection()?>