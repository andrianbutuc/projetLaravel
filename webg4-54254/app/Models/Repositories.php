<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repositories extends Model
{
    use HasFactory;
    public static function getAll(){
        $repositories = \DB::table("repositories")->leftJoin("contributors","repositories.contributor_login","=","contributors.login")
                                                  ->select("repositories.id","repositories.name","contributors.name as cname")
                                                  ->get();
        foreach($repositories as $rep){
            $nbcomits = \DB::table("commits")->select("repositories.name",)->where("repository_id",$rep->id)->count("repository_id");
            $rep->nbcomit = $nbcomits;
        }
        return $repositories ;
    }
}
