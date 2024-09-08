<?php
/** @var \CodeIgniter\View\View $this */
?>

<?= $this->extend(config('Auth')->views['layout']) ?>

<?= $this->section('title') ?>
<?= lang('Auth.login') ?>
<?= $this->endSection() ?>

<?= $this->section('main') ?>

<div class="auth-wrapper">
    <div class="auth-card">
        <h4 class="title">
            <?= lang('Auth.login') ?>
        </h4>

        <?php if (session('error') !== null): ?>
            <div class="alert alert-danger" role="alert">
                <?= session('error') ?>
            </div>
        <?php elseif (session('errors') !== null): ?>
            <div class="alert alert-danger" role="alert">
                <?php if (is_array(session('errors'))): ?>
                    <?php foreach (session('errors') as $error): ?>
                        <?= $error ?>
                        <br>
                    <?php endforeach ?>
                <?php else: ?>
                    <?= session('errors') ?>
                <?php endif ?>
            </div>
        <?php endif ?>

        <?php if (session('message') !== null): ?>
            <div class="alert alert-success" role="alert">
                <?= session('message') ?>
            </div>
        <?php endif ?>

        <div class="row">
            <form class="col s12" action="<?= url_to('login') ?>" method="post">
                <?= csrf_field() ?>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="email" name="email" type="email" class="validate" value="<?= old('email') ?>"
                            required>
                        <label for="email">
                            <?= lang('Auth.email') ?>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" name="password" type="password" class="validate" required>
                        <label for="password">
                            <?= lang('Auth.password') ?>
                        </label>
                    </div>
                </div>
                <!-- Remember me -->
                <?php if (setting('Auth.sessionConfig')['allowRemembering']): ?>
                    <p>
                        <label>
                            <input type="checkbox" name="remember" <?php if (old('remember')): ?> checked<?php endif ?> />
                            <span>
                                <?= lang('Auth.rememberMe') ?>
                            </span>
                        </label>
                    </p>
                <?php endif; ?>

                <button type="submit" class="btn waves-effect waves-light btn-auth">
                    <?= lang('Auth.login') ?>
                </button>
            </form>
        </div>

        <?php if (setting('Auth.allowMagicLinkLogins')): ?>
            <p class="text-center">
                <?= lang('Auth.forgotPassword') ?> <a href="<?= url_to('magic-link') ?>">
                    <?= lang('Auth.useMagicLink') ?>
                </a>
            </p>
        <?php endif ?>

        <?php if (setting('Auth.allowRegistration')): ?>
            <p class="text-center">
                <?= lang('Auth.needAccount') ?> <a href="<?= url_to('register') ?>">
                    <?= lang('Auth.register') ?>
                </a>
            </p>
        <?php endif ?>
    </div>
</div>

<?= $this->endSection() ?>