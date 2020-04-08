<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class usersExport implements WithHeadings,FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $usersData = User::select('SurName','OtherNames','UserEmail','Country','Address','City','State','Mobile','OtherContact')->where('Status', 1)->orderby('id','DESC')->get();
        return $usersData;
    }

    public function headings():array{
        return['SurName','OtherNames','UserEmail','Country','Address','City','State','Mobile','OtherContact'];
    }
}
