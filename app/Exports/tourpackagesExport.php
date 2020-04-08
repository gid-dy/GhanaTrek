<?php

namespace App\Exports;

use App\Tourpackages;
use App\Tourpackagecategory;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class tourpackagesExport implements WithHeadings,FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $tourpackagesData = Tourpackages::select('id','Category_id','PackageName','PackageCode','PackagePrice')->where('Status',1)->orderBy('id','DESC')->get();
        foreach($tourpackagesData as $key => $tourpackages){
            $categoryName = Tourpackagecategory::select('CategoryName')->where('id', $tourpackages->Category_id)->first();
            $tourpackagesData[$key]->Category_id = $categoryName->CategoryName;
        }
        return $tourpackagesData;
        //return Tourpackages::all();
    }

    public function headings():array{
        return['Id','Category Name','Package Name','Package Code','Price'];
    }

}
