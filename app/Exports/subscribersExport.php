<?php

namespace App\Exports;

use App\NewsletterSubscriber;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class subscribersExport implements WithHeadings,FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $subscriberData =  NewsletterSubscriber::select('id','UserEmail','created_at')->where('Status', 1)->orderby('id','DESC')->get();
        return $subscriberData;
    }
    public function headings():array{
        return['id','UserEmail','created_at'];
    }
}
