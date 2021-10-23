<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepositoriesDetail extends Model
{
    use HasFactory;
    public static function getDetail($id){
        $detail  = \DB::table("repositories")->leftJoin("contributors","repositories.contributor_login","=","contributors.login")
                                                  ->select("repositories.id","repositories.name","contributors.name as cname")
                                                  ->where("repositories.id",$id)
                                                  ->get();
        foreach($detail as $d){
            $comit = \DB::table("commits")->select("commits.date","commits.message",)
                        ->where("repository_id",$d->id)->get();
            $d->comits = $comit;
        }
        return json_encode($detail) ;                                          
    }
}
