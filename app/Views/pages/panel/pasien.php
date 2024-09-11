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
                    <h4>Data Pasien</h4>
                    <div style="display: flex; gap: 5px;">
                        <a href="#!" class="btn-header-slider btn-slider green" data-title="Tambah Kamar"
                            data-target="form">
                            <i class="material-icons">add</i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="page-slider-body">
                <table class="highlight responsive-table" id="pasien" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>ID Pasien</th>
                            <th>Nama</th>
                            <th>No. Telpon</th>
                            <th>Alamat</th>
                            <th>Email</th>
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
                    <h4>Data Pasien</h4>
                </div>
            </div>
            <div class="page-slider-body">
                <form class="col s12" action="<?=url_to('register')?>" method="post" id="form-pasien">
                    <?=csrf_field()?>
                    <div class="container">
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="nama" name="nama" type="text" class="validate" value="<?=old('nama')?>"
                                    required>
                                <label for="nama">
                                    Nama
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="username" name="username" type="text" class="validate"
                                    value="<?=old('username')?>" required>
                                <label for="username">
                                    <?=lang('Auth.username')?>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="email" name="email" type="email" class="validate" value="<?=old('email')?>"
                                    required>
                                <label for="email">
                                    <?=lang('Auth.email')?>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="phone" name="phone" type="text" class="validate" value="<?=old('phone')?>"
                                    required>
                                <label for="phone">
                                    Nomor Whatsapp
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password" name="password" type="password" class="validate" required>
                                <label for="password">
                                    <?=lang('Auth.password')?>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password_confirm" name="password_confirm" type="password" class="validate"
                                    required>
                                <label for="password_confirm">
                                    <?=lang('Auth.passwordConfirm')?>
                                </label>
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
    </div>
</div>
<!-- Modal Structure -->
<div id="modal1" class="modal">
    <div class="modal-content">
        <h4>Edit Data</h4>
        <form class="col s12" action="<?=url_to('register')?>" method="post" id="form-edit">
            <?=csrf_field()?>
            <input type="hidden" name="id" id="edit-id">
            <div class="container">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="edit-nama" name="nama" type="text" class="validate" value="<?=old('nama')?>" required>
                        <label for="edit-nama">
                            Nama
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="address" name="address" class="materialize-textarea"></textarea>
                        <label for="address">
                            Alamat
                        </label>
                    </div>
                </div>
            </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Batal</a>
        <button type="submit" class="waves-effect waves-green btn-flat">Simpan</button>
        </form>
    </div>
</div>
<div id="modal2" class="modal">
    <div class="modal-content">
        <h4>Ubah Password</h4>
        <form class="col s12" action="<?=url_to('register')?>" method="post" id="form-password">
            <?=csrf_field()?>
            <input type="hidden" name="id" id="password-id">
            <div class="container">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="edit-password" name="password" type="password" class="validate" required>
                        <label for="edit-password">
                            <?=lang('Auth.password')?>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="edit-password_confirm" name="password_confirm" type="password" class="validate" required>
                        <label for="edit-password_confirm">
                            <?=lang('Auth.passwordConfirm')?>
                        </label>
                    </div>
                </div>
            </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Batal</a>
        <button type="submit" class="waves-effect waves-green btn-flat">Simpan</button>
        </form>
    </div>
</div>
<?=$this->endSection()?>
<?=$this->section('script')?>
<script src="<?=base_url()?>js/pages/dashboard/pasien.js"></script>
<?=$this->endSection()?>