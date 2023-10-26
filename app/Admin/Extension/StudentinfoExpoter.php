<?php

namespace App\Admin\Extension;

use Encore\Admin\Table\Exporters\AbstractExporter;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\student\Studentinforeport;

class StudentinfoExpoter extends AbstractExporter
{
    public function export()
    {

        
  Excel::download(new Studentinforeport($this->getData()),'studentinfo.xlsx',)->prepare(request())->send();

  // Excel::download(new Studentinforeport($this->getData()),'studentinfo.pdf', \Maatwebsite\Excel\Excel::DOMPDF)->prepare(request())->send();

  
    }
}