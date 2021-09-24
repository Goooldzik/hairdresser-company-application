<?php


namespace App\Services;


use App\Repository\HairdresserRepository;

class HairdresserService
{
    /** @var HairdresserRepository  */
    protected HairdresserRepository $hairdresserRepository;

    /**
     * HairdresserService constructor.
     * @param HairdresserRepository $hairdresserRepository
     */
    public function __construct(HairdresserRepository $hairdresserRepository)
    {
        $this->hairdresserRepository = $hairdresserRepository;
    }

    /**
     * This method return all hairdressers from DB
     * @return mixed
     */
    public function getAll()
    {
        return $this->hairdresserRepository->getAll();
    }
}
