<?php

namespace App\Exports;

use App\Guest;
use Maatwebsite\Excel\Concerns\FromCollection;

class GuestsExport implements FromCollection
{
    protected $guests;

    public function __construct($guests)
    {
        $this->guests = $guests;
    }

    public function collection()
    {
      
        return $this->guests;
    }
}
