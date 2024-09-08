<div class="panel-nav-section panel-nav-header">
    <img src="<?= base_url('img/logo/white.png') ?>" alt="">
</div>
<div class="panel-nav-section panel-nav-list">
    <div class="nav-item">
        <a href="#!" class="nav-item-link" data-page="dashboard">
            <i class="fa-solid fa-house"></i>
            Dashboard</a>
    </div>
</div>
<div class="panel-nav-section panel-nav-footer">
    <p><?= auth()->user()->nama ?></p>
    <a href="#!" role="button" class="panel-nav-btn btn-logout">Keluar</a>
</div>
