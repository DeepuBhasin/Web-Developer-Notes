<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<h2><?= $body; ?></h2>
<?= $this->endSection(); ?>


<?= $this->section('asideMenu'); ?>
<p>This is side Menu which is only accessble in About page only </p>

<?= $this->include('widgets/sidebar'); ?>

<?= $this->endSection(); ?>