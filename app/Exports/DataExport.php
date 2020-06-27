<?php

namespace App\Exports;

use App\Data;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DataExport implements FromCollection, WithHeadings, WithMapping
{
    protected $id;

    function __construct($id) {
      $this->id = $id;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Data::where('project_id', $this->id)->get();
    }

    public function map($data): array
    {
        return [
            $data->id,
            $data->project_id,
            $data->name,
            $data->lat,
            $data->lang,
            $data->uploaded_at,
            $data->pole_type,
            $data->pole_construction,
            $data->pole_reformat,
            url($data->pole_photo),
            url($data->foundation_photo),
            ($data->is_trafo_input == 1) ? 'Iya' : 'Tidak',
            $data->transformer_power,
            $data->fasa,
            url($data->transformer_photo)
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Project ID',
            'Name',
            'Latitude',
            'Longitude',
            'Uploaded At',
            'Jenis Tiang',
            'Konstruksi Tiang',
            'Tiang',
            'Foto Tiang',
            'Foto Pondasi',
            'Input Trafo',
            'Daya Trafo',
            'Fasa',
            'Foto Trafo'
        ];
    }
}
