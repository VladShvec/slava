<?php

namespace App\Http\Services;

use App\Events\JobProcessed;
use App\Http\Requests\ExcelFileRequest;
use App\Jobs\ParseExcelFileJob;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use OpenSpout\Common\Exception\IOException;
use OpenSpout\Common\Exception\UnsupportedTypeException;
use OpenSpout\Reader\Exception\ReaderNotOpenedException;
use Rap2hpoutre\FastExcel\FastExcel;

class ExcelService
{
    public function __construct(
    )
    {
    }

    /**
     * @param ExcelFileRequest $request
     * @return string
     */
    public function storeExcelFile(ExcelFileRequest $request): string
    {
        $fileName = $request->file('excelFile')->getClientOriginalName();
        $request
           ->file('excelFile')
           ->storeAs(
               '/public/excel',
                   $fileName,
           );

         return $request->file('excelFile')->path();
    }

    /**
     * @param string $storedFilePath
     * @return Collection
     * @throws IOException
     * @throws ReaderNotOpenedException
     * @throws UnsupportedTypeException
     */
    public function readStoredExcelFile(string $storedFilePath): Collection
    {
        $collection = (new FastExcel)->import($storedFilePath);

        return $collection->chunk(1000);
    }

    /**
     * @param Collection $excelFileCollections
     * @return bool
     */
    public function parseExcelFileCollection(Collection $excelFileCollections): bool
    {
        try {
            $excelFileCollections->map(function ($collection, $key) {
                dispatch(new ParseExcelFileJob($collection, ++$key));
            });
            event(new JobProcessed('Ваши данные были успешно обработаны!'));

            return true;
        } catch (\Throwable $ex) {
            Log::error('Something on parse time went wrong' . $ex->getMessage());
            return false;
        }
    }
}
