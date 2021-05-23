<?php

namespace App\Imports;
use App\Exam;
use App\Mark;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithMappedCells;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MarksImport implements ToModel, WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {     
     $exam=Exam::orderBy('created_at','DESC')->first();
        return new Mark([
            'exam_id'=>$exam->id,
            'pupil_id'=>$row['studentid'],
            'fullname'=>$row['names'],
            'maths'=>$row['maths'],
            'english'=>$row['english'],
            'kiswa'=>$row['kiswa'],
            'ScieAgriHsce'=>$row['scieagrihsce'],
            'ArtMusicPhe'=>$row['artmusicphe'],
            'ssre'=>$row['ssre'],
            'Total'=>$row['total'],
        ]);
      
    }

    public function headingRow(): int
       {
           return 4;
       }

    }
