<?php
/** @var \CodeIgniter\View\View $this */
$this->extend('layout/landing/main');
?>
<?= $this->section('style') ?>
<link rel="stylesheet" href="<?= base_url('css/pages/form.css') ?>">
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section id="form">
    <form method="POST" id="form-booking" enctype="multipart/form-data">
        <div class="form-wrapper">
            <div class="part form-tanggal">
                <h3 class="center"><b>Pilih Tanggal Terlebih Dahulu</b></h3>
                <div class="container">
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
                            <button type="button" class="btn waves-effect waves-light red darken-2" id="btn-check">Cek
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
                            <button type="button" class="btn waves-effect waves-light green darken-2 btn-back"
                                data-target="form-tanggal"><i class="material-icons left">arrow_back</i>
                                Kembali</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="part form-ready hide">
                <h3 class="center"><b>FORM PENDAFTARAN PASIEN</b></h3>
                <p class="center date-ready"><em>Silahkan lengkapi form di bawah ini</em></p>
                <div class="container">
                    <input type="hidden" name="room_id">
                    <div class="room-selector">
                    </div>
                    <div class="row">
                        <div class="input-field col m6 s12">
                            <input id="name" name="name" type="text" class="validate" required>
                            <label for="name">Nama Lengkap</label>
                        </div>
                        <div class="input-field col m6 s12">
                            <input id="phone" name="phone" type="tel" class="validate" required>
                            <label for="phone">Nomor Telepon</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="address" name="address" class="materialize-textarea" required></textarea>
                            <label for="address">Alamat</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="file-field input-field col s12">
                            <div class="btn">
                                <span>File</span>
                                <input type="file" accept="image/png, image/gif, image/jpeg" name="kk" required>
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Foto Kartu Keluarga Pasien">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="file-field input-field col s12">
                            <div class="btn">
                                <span>File</span>
                                <input type="file" accept="image/png, image/gif, image/jpeg" name="ktp" required>
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Foto KTP Pasien">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="file-field input-field col s12">
                            <div class="btn">
                                <span>File</span>
                                <input type="file" accept="image/png, image/gif, image/jpeg" name="rujukan" required>
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text"
                                    placeholder="Foto Surat Rujukan RS/Dokter">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="file-field input-field col s12">
                            <div class="btn">
                                <span>File</span>
                                <input type="file" accept="image/png, image/gif, image/jpeg" name="bpjs" required>
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Foto BPJS kelas 3">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="file-field input-field col s12">
                            <div class="btn">
                                <span>File</span>
                                <input type="file" accept="image/png, image/gif, image/jpeg" name="pasfoto" required>
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Foto Terbaru Pasien">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="file-field input-field col s12">
                            <div class="btn">
                                <span>File</span>
                                <input type="file" accept="image/png, image/gif, image/jpeg" name="sktm">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Foto SKTM (bila ada)">
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
            <div class="part done green-text hide">
                <div class="center"><i class="large material-icons">task_alt</i></div>
                <h3 class="center"><b>Terima Kasih</b></h3>
                <p class="center black-text">Data booking anda sudah tersimpan, anda dapat menunjukkan identitas pada resepsionis untuk mengkonfirmasi</p>
            </div>
        </div>
    </form>
</section>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script src="<?= base_url('js/air-datepicker.min.js') ?>"></script>
<script src="<?= base_url('js/pages/form.js') ?>"></script>
<?= $this->endSection() ?>