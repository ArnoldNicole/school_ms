<?php

namespace App\Imports;

use App\Exam;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithMappedCells;

class ExamsImport implements ToModel, WithMappedCells, WithBatchInserts
{
    use Importable;
    public function mapping(): array
      {
          return [
              'class'  => 'A2',
              'term' => 'B2',
              'year' => 'C2',
              'Exam' => 'D2',
          ];
      }
      
   
    public function model(array $row)
    {
        
        return new Exam([
            'class'     => $row['class'],
            'term'    => $row['term'],
            'year' => $row['year'],
            'Exam'=>$row['Exam']
        ]);
        

    }
   

    public function batchSize(): int
    {
        return 1;
    }

    

}
