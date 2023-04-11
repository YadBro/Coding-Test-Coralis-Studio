<?php

namespace App\Controllers;

use CodeIgniter\Shield\Entities\User;
use CodeIgniter\Validation\Exceptions\ValidationException;

class Auth extends BaseController
{
  protected $users, $profile;

  public function __construct()
  {
    $this->users = model('UserModel');
  }
  public function index()
  {
    return view('pages/auth/login', ['title' => 'Login', 'navbar' => false]);
  }

  public function register()
  {

    return view('pages/auth/register', ['title' => 'Register', 'navbar' => false]);
  }

  public function process_register()
  {
    $rules = [
      'name' => 'required|min_length[5]|max_length[50]',
      'email' => 'required|valid_email|max_length[100]|is_unique[users.email]',
      'password' => 'required|min_length[8]',
    ];

    if (!$this->validate($rules)) {
      dd($this->validator->getErrors());
    }

    $newDataUser = [
      'email' => $this->request->getVar('email'),
      'username' => $this->request->getVar('password'),
      'password' => $this->request->getVar('password'),
    ];

    $newDataUserProfile = [
      'name' => $this->request->getVar('name'),
    ];

    // d($newDataUser, $newDataUserProfile);

    $user = new User($newDataUser);
    // $this->profile->save($newDataUserProfile);
    d($user);
    $this->users->save($user);
    // $this->profile->save([
    //   'name' => $this->request->getVar('name'),
    // ]);
    echo 'ok';
  }
}
