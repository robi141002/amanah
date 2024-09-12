<?php
/** @var \CodeIgniter\View\View $this */
?>

<?=$this->extend(config('Auth')->views['layout'])?>

<?=$this->section('title')?>
<?=lang('Auth.login')?>
<?=$this->endSection()?>

<?=$this->section('main')?>

<div class="auth-wrapper">
    <div class="auth-card">
        <h4 class="title">
            <?=lang('Auth.register')?>
        </h4>
        <br>

        <?php if (session('error') !== null): ?>
        <div class="card-panel red">
            <span class="white-text">
                <?=session('error')?>
            </span>
        </div>
        <?php elseif (session('errors') !== null): ?>
        <div class="card-panel red">
            <span class="white-text">
                <?php if (is_array(session('errors'))): ?>
                <?php foreach (session('errors') as $error): ?>
                <?=$error?>
                <br>
                <?php endforeach?>
                <?php else: ?>
                <?=session('errors')?>
                <?php endif?>
            </span>
        </div>
        <?php endif?>

        <?php if (session('message') !== null): ?>
        <div class="card-panel greeb">
            <span class="white-text">
                <?=session('message')?>
            </span>
        </div>
        <?php endif?>

        <div class="row">
            <form class="col s12" action="<?=url_to('register')?>" id="form-register" method="post">
                <?=csrf_field()?>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="nama" name="nama" type="text" class="validate" value="<?=old('nama')?>" required>
                        <label for="nama">
                            Nama
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="username" name="username" type="text" class="validate" value="<?=old('username')?>"
                            required>
                        <label for="username">
                            <?=lang('Auth.username')?>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="email" name="email" type="email" class="validate" value="<?=old('email')?>" required>
                        <label for="email">
                            <?=lang('Auth.email')?>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="phone" name="phone" type="text" class="validate" value="<?=old('phone')?>" required>
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
                        <input id="password_confirm" name="password_confirm" type="password" class="validate" required>
                        <label for="password_confirm">
                            <?=lang('Auth.passwordConfirm')?>
                        </label>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn waves-effect waves-light btn-auth">
                    <?=lang('Auth.register')?>
                </button>
            </form>
        </div>

        <?php if (setting('Auth.allowMagicLinkLogins')): ?>
        <p class="text-center">
            <?=lang('Auth.forgotPassword')?> <a href="<?=url_to('magic-link')?>">
                <?=lang('Auth.useMagicLink')?>
            </a>
        </p>
        <?php endif?>

        <?php if (setting('Auth.allowRegistration')): ?>
        <p class="center"><?=lang('Auth.haveAccount')?> <a href="<?=url_to('login')?>"><?=lang('Auth.login')?></a>
        </p>
        <?php endif?>
    </div>
</div>

<?=$this->endSection()?>

<?=$this->section('script')?>
<script src="<?= base_url() ?>js/pages/register.js"></script>
<?=$this->endSection()?>
