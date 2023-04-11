<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<div class="container text-center mt-3">
  <div class="row align-items-center">
    <div class="col-12">
      <h1 class="fw-bold">Hi, I'am <span class="name-highlight"><?= $profile ? $profile['name'] : 'Your Name'; ?></span> 👋</h1>
      <p class="text-white">Fullstack Developer</p>
    </div>
    <div class="col">
      <img src="<?= $profile ? base_url($profile['image']) : 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80' ?>" alt="person-image" class="image-profile">
    </div>
    <div style="margin-top: 10rem;">
      <p>This web design was inspired by <a href="https://www.figma.com/community/file/1107932756774391949" target="_blank" rel="noreferrer">İbrahim Ö</a></p>
      <p>Coding by <a href="https://www.linkedin.com/in/yadi-apriyadi/" rel="noreferrer" target="_blank">Yadi Apriyadi</a></p>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>