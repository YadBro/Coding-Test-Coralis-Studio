<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<?php
$errorName = null;
$errorImage = null;
$errorsSession = session('errors');
if ($errorsSession) {
  $errorName = isset($errorsSession['name']) ? $errorsSession['name'] : null;
  $errorImage = isset($errorsSession['image']) ? $errorsSession['image'] : null;
}
?>
<div class="container text-center text-black">
  <div class="row p-2 rounded mx-auto" style="max-width: 500px; background-color: #d2d4d2; margin-top: 5rem">
    <h1 class="mb-2">Edit Profile</h1>
    <form class="col m-auto" enctype="multipart/form-data" action="/dashboard/process_update" method="post">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control <?= $errorName ? 'is-invalid' : '' ?>" name="name" id="name" value="<?= old('name'); ?>">
        <div class="invalid-feedback">
          <?= $errorName; ?>
        </div>
      </div>
      <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" autocomplete="off" name="image" class="form-control <?= $errorImage ? 'is-invalid' : '' ?>" id="image">
        <div class="invalid-feedback">
          <?= $errorImage; ?>
        </div>
      </div>
      <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
  </div>
</div>
<?= $this->endSection(); ?>