<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<div class="container text-center text-black">
  <div class="row p-2 rounded mx-auto" style="max-width: 500px; background-color: #d2d4d2; margin-top: 5rem">
    <h1 class="mb-4">Login</h1>
    <form class="col m-auto">
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" autocomplete="off" class="form-control" id="exampleInputPassword1">
      </div>
      <p>Don't have an account? <a href="<?= base_url('/register'); ?>">Register</a></p>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>
  </div>
</div>
<?= $this->endSection(); ?>