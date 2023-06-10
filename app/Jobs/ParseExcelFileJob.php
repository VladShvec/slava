<?php

namespace App\Jobs;

use App\Models\Row;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class ParseExcelFileJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public Collection $rowsCollection,
        public int $key
    )
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->rowsCollection->map(function ($row) {
            Row::create([
                'id' => $row['id'],
                'name' => $row['name'],
                'date' => Carbon::createFromFormat('d-m-Y',$row['date']->format('d-m-Y'))
            ]);
        });

        Cache::store('redis')->forever($this->key, count($this->rowsCollection));
    }
}
