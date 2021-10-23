<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RepositoriesDetail;

class RepositoriesDetailController extends Controller
{
    //
        public function index($id){
            $details =RepositoriesDetail::getDetail($id);
            return $details ;
        }


}
