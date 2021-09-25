<?php

namespace App\Http\Controllers;

use App\Services\LibraryService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    /** @var LibraryService  */
    protected LibraryService $libraryService;

    /**
     * LibraryController constructor.
     * @param LibraryService $libraryService
     */
    public function __construct(LibraryService $libraryService)
    {
        $this->libraryService = $libraryService;
    }

    /**
     * @param int $clientLibraryNumber
     * @return View
     */
    public function show(int $clientLibraryNumber): View
    {
        return view('libraries.show', [
            'library' => $this->libraryService->getByClientLibraryNumber($clientLibraryNumber)
        ]);
    }
}
