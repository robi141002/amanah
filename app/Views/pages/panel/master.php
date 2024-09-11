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
                    <h4>Master Data</h4>
                    <div style="display: flex; gap: 5px;">
                        <a href="#!" class="btn-header-slider blue" data-title="Ubah Password">
                            <i class="material-icons">vpn_key</i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="page-slider-body">
                <form class="col s12" action="<?=base_url('api/pasien/' . $pasien->id)?>" method="POST">
                    <?=csrf_field()?>
                    <div class="container">
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="username" name="username" type="text" class="validate"
                                    value="<?=$user->username?>" disabled>
                                <label for="username">
                                    <?=lang('Auth.username')?>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="email" name="email" type="email" class="validate" value="<?=$user->email?>"
                                    disabled>
                                <label for="email">
                                    <?=lang('Auth.email')?>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="phone" name="phone" type="text" class="validate" value="<?=$pasien->phone?>"
                                    disabled>
                                <label for="phone">
                                    Nomor Whatsapp
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="nama" name="nama" type="text" class="validate" value="<?=$user->nama?>"
                                    required>
                                <label for="nama">
                                    Nama
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="address" name="address" class="materialize-textarea"><?= $pasien->address ?></textarea>
                                <label for="address">
                                    Alamat
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="center">
                        <button class="btn waves-effect waves-light green" type="submit" name="action">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
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
                        <input id="edit-password_confirm" name="password_confirm" type="password" class="validate"
                            required>
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
<?=$this->endSection()?>