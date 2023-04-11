<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Profile;
use CodeIgniter\Validation\Exceptions\ValidationException;

class Dashboard extends BaseController
{
  protected $profiles, $users;
  public function __construct()
  {
    $this->users = model('UserModel');
    $this->profiles = new Profile();
  }

  public function index()
  {
    session();
    $profile = $this->profiles->where('user_id', user_id())->first();
    return view('pages/dashboard/user/edit', [
      'title' => 'dashboard | Edit Profile', 'navbar' => true, 'profile' => $profile,
    ]);
  }

  public function update()
  {
    $requestFile = $this->request->getFile('image');
    $rules = [
      'name' => 'required',
      'image' => 'is_image[image]|uploaded[image]|max_size[image,1024]',
    ];

    if (!$this->validate($rules)) {
      session()->setFlashdata('errors', $this->validator->getErrors());
      return redirect()->to('/dashboard')->withInput();
    }

    $oldImageName = $this->request->getVar('oldImageName');
    if ($oldImageName) {
      unlink($oldImageName);
    }

    $profileId = $this->profiles->where('user_id', auth()->user()->id)->first();

    if ($profileId === null) {
      session()->setFlashdata('notification', ['text-danger', 'User profile not found!']);
      return redirect()->to('/dashboard');
    }

    $fileName = time() . rand(11, 99) . $requestFile->getFilename() . '.' . $requestFile->getExtension();

    $requestFile->move('assets/images', $fileName);

    $this->profiles->save([
      'id' => $profileId,
      'name' => $this->request->getVar('name'),
      'image' => 'assets/images/' . $fileName,
    ]);

    session()->setFlashdata('notification', ['text-success', 'Update successfully.']);
    return redirect()->to('/dashboard');
  }

  public function change_password()
  {
    return view('pages/dashboard/change_password', ['title' => 'Change Password', 'navbar' => false]);
  }

  public function process_change_password()
  {
    $rules = [
      'newPassword' => 'required|min_length[8]',
    ];


    if (!$this->validate($rules)) {
      session()->setFlashdata('errors', $this->validator->getErrors());
      return redirect()->to('/dashboard/change-password');
    }

    $user = $this->users->findById(user_id());

    $user->fill([
      'password' => $this->request->getVar('newPassword'),
    ]);


    $this->users->save($user);
    session()->setFlashdata('notification', ['text-success', 'Password has been updated.']);
    return redirect()->to('/dashboard');
  }
}
