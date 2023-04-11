<?php

namespace App\Controllers;

class Home extends BaseController
{
  public function index()
  {
    $user = auth()->user();
    return view('pages/home', ['title' => 'Home', 'navbar' => true, 'user' => $user]);
  }
}
