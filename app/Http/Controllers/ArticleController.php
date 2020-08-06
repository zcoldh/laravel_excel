<?php

namespace App\Http\Controllers;

use App\Imports\ArticleImport;
use App\Services\ExcelService;
use App\Services\UploadService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ArticleController extends Controller
{
    protected $excelService;

    public function __construct(ExcelService $excelService)
    {
        $this->excelService = $excelService;
    }

    public function index()
    {
        return view('article');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('article');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $file = $request->file('excel_file');
        $file_path = UploadService::uploadFile($file);
        if($file_path === false){
            return response()->json(['code' => 0, 'message'=> '文件上传失败']);
        }
        $full_file_path = storage_path().'/app/'.$file_path;


        $res = Excel::import(new ArticleImport(), $full_file_path);

        if($res === false){
            return response()->json(['code' => 0, 'message'=> '文件处理失败']);
        }
        return response()->json(['code' => 1, 'message' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
}
