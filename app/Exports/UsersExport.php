<?php

namespace App\Exports;

use App\Models\User;
use App\Models\UserContactDetail;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return UserContactDetail::select("name", "email", "number",'message','created_at')->orderBy('created_at','desc')->get();
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["Name", "Email","Number","Message","Date"];
    }
}
