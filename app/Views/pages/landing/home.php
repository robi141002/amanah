<?php
/** @var \CodeIgniter\View\View $this */
$this->extend('layout/landing/main');
?>

<?= $this->section('content') ?>
<section id="hero">
    <div class="hero-content">
        <img src="<?= base_url('img/foto/hero.jpg') ?>" alt="hero">
        <div class="hero-desc">
            <p>Rumah Singgah Amanah melayani para pasien dhuafa dari luar kota yang sedang Berobat di RS Margono PWT baik kemoterapi, sinar, dll yang membutuhkan tempat singgah GRATIS
            </p>
            <a href="<?= url_to('Home::form') ?>" class="waves-effect waves-light btn btn-large green darken-1">Daftar RSA</a>
        </div>
    </div>
</section>
<section id="fasilitas">
    <div class="fasilitas-wrapper">
        <div class="fasilitas-item">
            <i class="fa-solid fa-truck-medical"></i>
            <span>Ambulance</span>
        </div>
        <div class="fasilitas-item">
            <i class="fa-solid fa-mask-ventilator"></i>
            <span>Oksigen</span>
        </div>
        <div class="fasilitas-item">
            <i class="fa-solid fa-bed"></i>
            <span>Tempat Tidur</span>
        </div>
        <div class="fasilitas-item">
            <i class="fa-solid fa-wheelchair"></i>
            <span>Kursi Roda</span>
        </div>
        <div class="fasilitas-item">
            <i class="fa-solid fa-kitchen-set"></i>
            <span>Dapur Umum</span>
        </div>
        <div class="fasilitas-item">
            <i class="fa-solid fa-bath"></i>
            <span>Kamar Mandi</span>
        </div>
        <div class="fasilitas-item">
            <i class="fa-solid fa-fan"></i>
            <span>Kipas Angin</span>
        </div>
        <div class="fasilitas-item">
            <i class="fa-solid fa-carrot"></i>
            <span>Bahan Pangan</span>
        </div>
        <div class="fasilitas-item">
            <i class="fa-solid fa-hand-holding-heart"></i>
            <span>Bina Rohani</span>
        </div>
    </div>
</section>
<section id="galeri">
    <div class="galeri-wrapper">
        <a href="<?= base_url('img/foto/14.PNG') ?>" data-lightbox="galeri">
            <img src="<?= base_url('img/foto/14.PNG') ?>" alt="">
        </a>
        <a href="<?= base_url('img/foto/12.jpg') ?>" data-lightbox="galeri">
            <img src="<?= base_url('img/foto/12.jpg') ?>" alt="">
        </a>
        <a href="<?= base_url('img/foto/15.jpg') ?>" data-lightbox="galeri">
            <img src="<?= base_url('img/foto/15.jpg') ?>" alt="">
        </a>
        <a href="<?= base_url('img/foto/11.jpg') ?>" data-lightbox="galeri">
            <img src="<?= base_url('img/foto/11.jpg') ?>" alt="">
        </a>
    </div>
</section>
<section id="ketentuan">
    <div class="ketentuan-wrapper">
        <div class="ketentuan-icon">
            <i class="fa-solid fa-hospital-user"></i>
        </div>
        <div class="ketentuan-list">
            <h4>KRITERIA PASIEN:</h4>
            <ul>
                <li>Pasien Rumah Sakit</li>
                <li>Berasal dari keluarga kurang mampu</li>
                <li>Tidak mengidap penyakit menular</li>
                <li>Peserta BPJS kelas 3</li>
            </ul>
        </div>
        <div class="ketentuan-list">
            <h4>PERSYARATAN PASIEN:</h4>
            <ul>
                <li>Foto copy KK & KTP</li>
                <li>Foto copy BPJS/KIS</li>
                <li>Foto copy surat rujukan RS/Surat Diagnosa</li>
                <li>Foto copy SKTM (Surat Keterangan Tidak Mampu) bila ada</li>
            </ul>
        </div>
    </div>
</section>
<section id="alamat">
    <div class="alamat-wrapper">
        <img src="<?= base_url('img/foto/street.jpg') ?>" alt="">
        <div class="alamat-maps">
            <div class="alamat-maps-item maps-wrapper">
                <div style="width: 100%">
                    <iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Rumah%20Singgah%20Amanah,%20Jl.%20KH.%20Nachrowi,%20Mersi,%20Kec.%20Purwokerto%20Tim.,%20Kabupaten%20Banyumas,%20Jawa%20Tengah%2053111+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
                        <a href="https://www.maps.ie/population/">Calculate population in area</a>
                    </iframe>
                </div>
            </div>
            <div class="alamat-maps-item maps-desc">
                <p>Rumah Singgah Amanah Purwokerto melayani para pasien dhuafa dari luar kota yang sedang Berobat di RS Margono Purwokerto baik kemoterapi, sinar, dll yang membutuhkan tempat singgah GRATIS. Beralamat di Jl. KH. Nachrowi, Mersi, Kec. Purwokerto Timur, Kabupaten Banyumas, Jawa Tengah (200 m dari Rumah Sakit Margono).</p>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>