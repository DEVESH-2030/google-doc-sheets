<?php

namespace App\Services\External;

use Revolution\Google\Sheets\Facades\Sheets;

class GoogleService
{
    protected $sheets;

    /**
     * Costructor for injection binding
     *
     * @param Sheets $sheets
     */
    public function __construct(Sheets $sheets)
    {
        $this->sheets = $sheets;
    }

    /**
     * Display a listing of the resource.
     */
    public function retrieveFromGoogleSheet()
    {
        $getRecords = Sheets::spreadsheet(env('GOOGLE_SHEET_ID'))->sheet('users_record')->get();

        $header = $getRecords->pull(0);
        $collections = Sheets::collection($header, $getRecords);
        $googleSheetData = array_values($collections->toArray());

        return (!empty($googleSheetData)) ? $googleSheetData : collect();
    }
}
