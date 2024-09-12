<?php
/** @var \CodeIgniter\View\View $this */
?>

<!DOCTYPE html>
<html>

<head>
    <!--Import Google Icon Font-->
    <?= $this->include('layout/head') ?>
    <?= $this->renderSection('head') ?>
    <?= $this->include('layout/style') ?>
    <link rel="stylesheet" href="<?= base_url('css/air-datepicker.min.css') ?>">
    <link type="text/css" rel="stylesheet" href="<?= base_url('css/pages/invoice.css') ?>" />
    <?= $this->renderSection('style') ?>
</head>

<body>
    <div class="parent-wrapper">
        <div id="paper">
            <div class="content-wrapper">
                <div class="header">
                    <h1 class="title">BOOKING INVOICE</h1>
                    <img src="<?= base_url('img/logo/circle.png') ?>" alt="logo">
                </div>
                <div class="address">
                    <h1>Rumah Singgah Amanah</h1>
                    <p>No. Telepon +62 813 2730 0029</p>
                    <p>Jl. KH. Nachrowi, Mersi, Kec. Purwokerto Timur</p>
                    <p>Kabupaten Banyumas, Jawa Tengah 53111</p>
                </div>
                <div class="booking">
                    <p><b>Kode Booking</b></p>
                    <h1><?= $invoice->code ?></h1>
                    <table class="highlight">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Tanggal Booking</th>
                            </tr>
                            <tbody>
                                <tr>
                                    <td><?= $invoice->name ?></td>
                                    <td><?= $invoice->address ?></td>
                                    <td><?= $invoice->date_in ?> - <?= $invoice->date_out ?></td>
                                </tr>
                            </tbody>
                        </thead>
                    </table>
                </div>
                <div class="kontak">
                    <p><b>Informasi Kontak</b></p>
                    <p><i class="fa-brands fa-whatsapp"></i>  0813-2730-0029</p>
                    <p><i class="fa-brands fa-instagram"></i>  @rumahsinggahamanah</p>
                </div>
            </div>
            <div class="footer-wrapper">
                <p>Harap Cetak Booking Invoice ini sebelum ke lokasi dan tunjukkan pada admin Rumah Singgah Amanah</p>
            </div>
        </div>
    </div>
    <!--JavaScript at end of body for optimized loading-->
    <?= $this->include('layout/script') ?>
    <script>
        const baseUrl = '<?= base_url() ?>';
        $(document).ready(function () {
            window.print();
        });
    </script>
    <?= $this->renderSection('script') ?>
</body>

</html>