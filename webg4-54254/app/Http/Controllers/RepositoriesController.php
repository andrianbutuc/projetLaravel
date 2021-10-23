<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repositories;
class RepositoriesController extends Controller
{
    //
    public function index(){
        $repositories = Repositories::getAll();
        return view('repositories',compact("repositories"));
    }
}
