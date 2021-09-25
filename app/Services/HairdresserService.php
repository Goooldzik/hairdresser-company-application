<?php


namespace App\Services;


use App\Http\Requests\HairdresserRequest;
use App\Models\Hairdresser;
use App\Models\HairdresserProfile;
use App\Repository\HairdresserRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use phpDocumentor\Reflection\DocBlock\Tags\Method;

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

    /**
     * @param   HairdresserRequest $request
     * @param   Hairdresser $hairdresser
     * @return  JsonResponse
     */
    public function store(HairdresserRequest $request, Hairdresser $hairdresser): JsonResponse
    {

        try {

            $hairdresser->insert($request->validated());
            $this->createProfile($request);

            return response()->json([
                'status' => 'success'
            ]);

        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage()
            ]);
        }
    }

    public function createProfile(HairdresserRequest $request)
    {
        $hairdresser = Hairdresser::all()->where('phone_number', $request->get('phone_number'))->first();

        HairdresserProfile::create(['hairdresser_id' => $hairdresser->id]);
    }
}
