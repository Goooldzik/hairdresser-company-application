<?php


namespace App\Repository;


use App\Models\Hairdresser;
use phpDocumentor\Reflection\Types\Mixed_;

class HairdresserRepository
{
    /** @var Hairdresser  */
    protected Hairdresser $hairdresser;

    /**
     * HairdresserRepository constructor.
     * @param Hairdresser $hairdresser
     */
    public function __construct(Hairdresser $hairdresser)
    {
        $this->hairdresser = $hairdresser;
    }

    /**
     * This method return all hairdressers from DB
     * @return mixed
     */
    public function getAll()
    {
        return $this->hairdresser->all();
    }


}
