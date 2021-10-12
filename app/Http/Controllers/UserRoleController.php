<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRoleRepository;

class UserRoleController extends Controller
{
    protected $userRoleRepo;

    public function __construct()
    {
        $this->userRoleRepo = new UserRoleRepository();
    }

    public function index()
    {
        $this->userRoleRepo->find();
    }
}
