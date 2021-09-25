<?php


namespace App\Repository;


use App\Models\ClientLibrary;

class LibraryRepository
{
    /** @var ClientLibrary  */
    protected ClientLibrary $library;

    /**
     * LibraryRepository constructor.
     * @param ClientLibrary $library
     */
    public function __construct(ClientLibrary $library)
    {
        $this->library = $library;
    }

    /**
     * @param int $clientLibraryNumber
     * @return mixed
     */
    public function getByClientLibraryNumber(int $clientLibraryNumber)
    {
        return $this->library
            ->where('client_library_number', $clientLibraryNumber)
            ->orderBy('id', 'desc')
            ->paginate(35);
    }
}
