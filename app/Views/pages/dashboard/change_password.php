<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<?php
$errorPassword = null;
$errorsSession = session('errors');
$sessionNotification = session('notification');
$notifClass = isset($sessionNotification) ? $sessionNotification[0] : null;
$notifMessage = isset($sessionNotification) ? $sessionNotification[1] : null;
if ($errorsSession) {
  $errorPassword = isset($errorsSession['newPassword']) ? $errorsSession['newPassword'] : null;
}
?>

<div class="container text-center text-black">
  <div class="row p-2 rounded mx-auto" style="max-width: 500px; background-color: #d2d4d2; margin-top: 5rem">
    <h1 class="mb-2">Change Password</h1>
    <p class="<?= $notifClass; ?>"><?= $notifMessage; ?></p>
    <form class="col m-auto" action="/dashboard/proses-change-password" method="post">
      <div class="mb-3">
        <label for="newPassword" class="form-label">New Password</label>
        <input type="password" class="form-control <?= $errorPassword ? 'is-invalid' : '' ?>" name="newPassword" id="newPassword">
        <div class="invalid-feedback">
          <?= $errorPassword; ?>
        </div>
      </div>
      <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
  </div>
</div>
<?= $this->endSection(); ?>