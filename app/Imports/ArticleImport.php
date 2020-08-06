<?php


namespace App\Imports;

use App\Models\Article;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ArticleImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        $row = $rows->shift();
        $data=collect($rows)->chunk(500);
        $created = $updated = date('Y-m-d H:i:s');
        foreach ($data as $dv){
            $insert_data=[];
            foreach ($dv as $v){
                $insert_data[]=[
                    'title'=>$v[1],
                    'url'=>$v[2],
                    'media_name'=>$v[3],
                    'publish_time'=>$v[4],
                    'description'=>$v[5],
                    'area'=>$v[6],
                    'created_at'=>$created,
                    'updated_at'=>$created,
                ];
                Article::insert($insert_data);
            }
        }
        return true;
    }
}
