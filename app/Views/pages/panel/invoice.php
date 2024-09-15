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
<div style="position: relative;width: 21cm;height: auto;padding: 0.5cm;overflow: hidden;background: white;">
        <div id="paper" style="position: relative;width: 100%;overflow: hidden;background: white;border: 3px solid green;">
            <div class="content-wrapper" style="position: relative;padding: 1.5rem 3.5rem;background-color: white;display: flex;flex-direction: column;">
                <div class="header" style="position: relative;display: flex;justify-content: space-between;align-items: center;">
                    <h1 class="title" style="font-weight: bold;text-transform: uppercase;font-size: 3em;color: green;">BOOKING INVOICE</h1>
                    <img src="<?= base_url('img/logo/circle.png') ?>" alt="logo" style="width: 10rem;">
                </div>
                <div class="address" style="position: relative;display: flex;flex-direction: column;padding: 1rem 0;">
                    <h1 style="position: relative;text-transform: uppercase;font-weight: bold;font-size: 1.5em;padding: 0;margin: 0;color: green;">Rumah Singgah Amanah</h1>
                    <p style="position: relative;padding: 0;margin: 0;">No. Telepon +62 813 2730 0029</p>
                    <p style="position: relative;padding: 0;margin: 0;">Jl. KH. Nachrowi, Mersi, Kec. Purwokerto Timur</p>
                    <p style="position: relative;padding: 0;margin: 0;">Kabupaten Banyumas, Jawa Tengah 53111</p>
                </div>
                <div class="booking" style="position: relative;padding: 3rem 0;border-top: 3px solid black;border-bottom: 3px solid black;">
                    <p style="position: relative;padding: 0;margin: 0;"><b>Kode Booking</b></p>
                    <h1 style="position: relative;padding: 0;margin: 0;font-weight: bold;font-size: 2.5em;text-transform: uppercase;"><?= $invoice->code ?></h1>
                    <table class="highlight" style="width: 100%;">
                        <thead>
                            <tr>
                                <th style="text-align: start;">Nama</th>
                                <th style="text-align: start;">Alamat</th>
                                <th style="text-align: start;">Tanggal Booking</th>
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
                <div class="kontak" style="padding-top: 4rem;padding-bottom: 5rem;">
                    <p style="margin: 0;padding: 0;"><b>Informasi Kontak</b></p>
                    <p><i class="fa-brands fa-whatsapp"></i> 0813-2730-0029</p>
                    <p><i class="fa-brands fa-instagram"></i> @rumahsinggahamanah</p>
                </div>
            </div>
            <div class="footer-wrapper" style="background-color: green;color: white;text-align: center;">
                <p style="padding: 1rem;margin: 0;">Harap Cetak Booking Invoice ini sebelum ke lokasi dan tunjukkan pada admin Rumah Singgah Amanah</p>
            </div>
        </div>
    </div>
    <!--JavaScript at end of body for optimized loading-->
    <?= $this->include('layout/script') ?>
    <script>
    const baseUrl = '<?= base_url() ?>';
    $(document).ready(function() {
        <?php if (!$isDownload) : ?>
        window.print();
        <?php endif ?>
    });
    </script>
    <?= $this->renderSection('script') ?>
</body>

</html>