<?php


namespace App\Services;


use App\Repository\LibraryRepository;

class LibraryService
{
    /** @var LibraryRepository  */
    protected LibraryRepository $libraryRepository;

    /**
     * LibraryService constructor.
     * @param LibraryRepository $libraryRepository
     */
    public function __construct(LibraryRepository $libraryRepository)
    {
        $this->libraryRepository = $libraryRepository;
    }

    /**
     * @param int $clientLibraryNumber
     * @return mixed
     */
    public function getByClientLibraryNumber(int $clientLibraryNumber)
    {
        return $this->libraryRepository->getByClientLibraryNumber($clientLibraryNumber);
    }
}
