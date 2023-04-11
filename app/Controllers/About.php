<?php

namespace App\Controllers;

class About extends BaseController
{
  public function index($name)
  {
    echo "<h1>Hello $name</h1>";
  }
}
