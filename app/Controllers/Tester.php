<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Tester extends BaseController
{
    public function index()
    {
       return view("Tester");
    }
}
