<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tourpackages extends Model
{
    public function tourtypes(){
        return $this->hasMany('App\Tourtype','PackageId','PackageId');
    }

    public function accommodations(){
        return $this->hasMany('App\Accommodation','PackageId','PackageId');
    }

    public function tourincludes(){
        return $this->hasMany('App\Tourinclude','PackageId','PackageId');
    }

    public function tourtransports(){
        return $this->hasMany('App\Tourtransportation','PackageId','PackageId');
    }

    public function tourlocations(){
        return $this->hasMany('App\Tourlocations','PackageId','PackageId');
    }
}
