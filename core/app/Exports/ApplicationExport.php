<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class ApplicationExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $fileToBeDownloaded;

    public function __construct($allApplications)
    {
        $this->fileToBeDownloaded = $allApplications;
        // dd($this->fileToBeDownloaded);
    }

    public function view(): View
    {
        return view('admin.export.applications', [
            'allApplications' => $this->fileToBeDownloaded
        ]);
    }

    /*public function query()
    {
        // return $this->fileToBeDownloaded->all();
        // dd($this->fileToBeDownloaded);
        return $this->fileToBeDownloaded;
    }

    public function collection()
    {
        // return User::all();
        // return $this->fileToBeDownloaded;

    	dd($this->fileToBeDownloaded);

        return [

        	$this->fileToBeDownloaded->user
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Name',
            'BirthDate',
            'Email',
            'Phone',
            'Alt Phone',
            'Address',
            'Age'

        ];
    }

    public function array(): array
    {
        return $this->fileToBeDownloaded;
    }*/
}
