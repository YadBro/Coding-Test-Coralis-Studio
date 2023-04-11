<?php

namespace App\Controllers;

use App\Models\Profile;

class Home extends BaseController
{
  public function index()
  {
    $profiles = new Profile();
    $profile = null;

    if (auth()->loggedIn()) {
      $profile = $profiles->where('user_id', user_id())->first();
    }

    return view('pages/home', ['title' => 'Home', 'navbar' => true, 'profile' => $profile]);
  }
}
