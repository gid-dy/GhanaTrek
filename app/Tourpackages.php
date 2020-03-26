<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tourpackages extends Model
{
    public function tourtypes(){
        return $this->hasMany('App\Tourtype','Package_id');
    }

    public function accommodations(){
        return $this->hasMany('App\Accommodation','Package_id');
    }

    public function tourincludes(){
        return $this->hasMany('App\Tourinclude','Package_id');
    }

    public function tourtransports(){
        return $this->hasMany('App\Tourtransportation','Package_id');
    }

    public function tourlocations(){
        return $this->hasMany('App\Tourlocations','Package_id');
    }
    public function packageimages(){
        return $this->hasMany('App\Packageimages','Package_id');
    }
}
