<?php

namespace App\Services\Internal;

use App\Repositories\GoogleSheetRepository;
use App\Services\External\GoogleService;

class GoogleSheetService
{

    protected $googleSheetRepository;
    protected $googleService;

    public function __construct(
        GoogleSheetRepository $googleSheetRepository,
        GoogleService $googleService,
    ) {
        $this->googleSheetRepository = $googleSheetRepository;
        $this->googleService = $googleService;
    }


    /**
     * Get all records of the google doc sheet
     *
     * @return void
     */
    public function retrieveRecords()
    {
        return $this->googleSheetRepository->getAll()->paginate(config('google.per_page_limit'));
    }

    /**
     * Get all records of the google doc sheet
     *
     * @return mixed
     */
    public function retrieveFromGoogle()
    {
        $collections = $this->googleService->retrieveFromGoogleSheet();

        return (!empty($collections)) ? $collections : [];
    }

    /**
     * This method is user to store the all google sheet records in our database
     *
     * @return mixed
     */
    public function storeIntoTable()
    {
        $userRecords = [];

        $googleSheets = $this->googleService->retrieveFromGoogleSheet();

        foreach ($googleSheets as $key => $googleSheet) {

            if (!empty($googleSheet['first_name']) && !empty($googleSheet['last_name']) && !empty($googleSheet['email'])) {

                $user = $this->googleSheetRepository->findByEmail($googleSheet['email']);
                if (!$user->exists()) {
                    $userRecords[] = $this->googleSheetRepository->create($googleSheet);
                }
            } else {
                $userRecords;
            }
        }

        return $userRecords;
    }

    public function deleteRecord($user)
    {
        return $this->googleSheetRepository->delete($user->id);
    }
}
