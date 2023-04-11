<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Validation\Exceptions\ValidationException;

class Dashboard extends BaseController
{
  protected $users;
  public function __construct()
  {
    $this->users = model('UserModel');
  }

  public function index()
  {
    session();
    $user = auth()->user();
    return view('pages/dashboard/user/edit', [
      'title' => 'dashboard | Edit Profile', 'navbar' => true, 'user' => $user,
    ]);
  }

  public function update()
  {
    $requestFile = $this->request->getFile('image');
    $rules = [
      'name' => 'required',
      'image' => 'is_image[image]|uploaded[image]|max_size[image,1024]',
    ];

    $user = $this->users->findById(auth()->user()->id);


    if (!$this->validate($rules)) {
      session()->setFlashdata('errors', $this->validator->getErrors());
      return redirect()->to('/dashboard')->withInput();
    }
    $fileName = time() . rand(11, 99) . $requestFile->getFilename() . '.' . $requestFile->getExtension();
    $requestFile->move('assets/images', $fileName);

    $user->fill([
      'name' => $this->request->getVar('name'),
      'image' => '/assets/images' . $fileName,
    ]);

    $this->users->save($user);
    dd($this->request->getVar(), $requestFile);
  }
}
