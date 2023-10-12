<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\Internal\GoogleSheetService;

class GoogleSheetsController extends Controller
{
    protected $view;
    protected $user;
    protected $googleSheetService;

    public function __construct(User $user, GoogleSheetService $googleSheetService)
    {
        $this->user = $user;
        $this->view = '.googleSheet.';
        $this->googleSheetService = $googleSheetService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->googleSheetService->retrieveRecords();

        return view($this->view . 'index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->googleSheetService->storeIntoTable();
        return back()->with(['success' => 'Your google sheet records saved successfully.']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $this->googleSheetService->deleteRecord($user);

        return back()->with(['success' => 'Deleted record successfully.']);
    }
}
