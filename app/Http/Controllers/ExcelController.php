<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExcelFileRequest;
use App\Http\Services\ExcelService;
use Illuminate\Http\Request;

class ExcelController extends Controller
{
    public function __construct
    (
        public ExcelService $excelService
    )
    {

    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        return view('excel.excel');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeExcelFile(ExcelFileRequest $request): \Illuminate\Http\RedirectResponse
    {
        $storedFilePath = $this->excelService->storeExcelFile($request);
        $message = '';
        if($storedFilePath) {
            $excelFileCollections = $this->excelService->readStoredExcelFile($storedFilePath);
            $status = $this->excelService->parseExcelFileCollection($excelFileCollections);
            $message = $status ? 'Ваши данные успешно обрабатываются!' : 'Что-то пошло не так во время обработки данных';
        }

        return redirect()->route('excel.index')->with('status', $message);
    }
}
