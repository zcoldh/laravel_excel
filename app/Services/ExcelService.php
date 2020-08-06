<?php

namespace App\Services;

use App\Models\Article;
use Excel;

class ExcelService
{
    public function import_excel($file_path)
    {
        try{
            Excel::load($file_path, function($reader) {
                $data = $reader->all();
                $data=collect($data)->chunk(500);
                dump($data);
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
                        ];
                        dd($insert_data);
                        Article::insert($insert_data);
                    }
                }
            });
            return true;

        }catch (\Exception $e){
            return false;
        }
    }
}
