<?php

namespace App\Http\Controllers;

use App\Models\Row;

class TableController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        return view('table.table', ['rows' => Row::groupBy('date')->get()]);
    }
}
