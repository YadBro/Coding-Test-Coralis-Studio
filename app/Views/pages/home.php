<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<div class="container text-center mt-3">
  <div class="row align-items-center">
    <div class="col-12">
      <h1 class="fw-bold">Hi, I'am <span class="name-highlight"><?= $user ? $user->name : 'Your Name'; ?></span> 👋</h1>
      <p class="text-white">Fullstack Developer</p>
    </div>
    <div class="col">
      <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" alt="person-image" class="image-profile">
    </div>
  </div>
</div>
<?= $this->endSection(); ?>