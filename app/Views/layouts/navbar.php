<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="/"><img src="<?= base_url('/assets/images/coding-logo.png'); ?>" alt="" srcset=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <?php if (auth()->loggedIn()) { ?>
      <a class="navbar-brand text-black ks-button fw-bold" href="/dashboard">Edit Profile</a>
      <a class="navbar-brand text-black ks-button fw-bold" href="/logout">Logout</a>
    <?php } else { ?>
      <a class="navbar-brand text-black ks-button fw-bold" href="/login">Login</a>
    <?php } ?>

  </div>
</nav>