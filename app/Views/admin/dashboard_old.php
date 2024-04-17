<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>
<!-- Page Wrapper -->
<div id="wrapper">
<?= $this->include('layouts/navsidebar.php'); ?>


<div class="container-fluid" style="margin-top:20px;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Admin Dashboard</div>
                <div class="panel-body">
                    <h1>Hello, <?= session()->get('name') ?></h1>
                    <h1>role, <?= session()->get('role') ?></h1>
                    <h3><a href="<?= site_url('logout') ?>">Logout</a></h3>
                </div>
            </div>
        </div>
    </div>
</div>

</div> <!--wrapper end div -->
<?= $this->endSection() ?>