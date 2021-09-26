<?php


namespace App\Services;

use App\Http\Requests\HairdresserRequest;
use App\Http\Requests\HairdresserUpdateRequest;
use App\Models\Hairdresser;
use App\Models\HairdresserProfile;
use App\Repository\HairdresserRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class HairdresserService
{
    /** @var HairdresserRepository  */
    protected HairdresserRepository $hairdresserRepository;

    /**
     * HairdresserService constructor.
     * @param   HairdresserRepository $hairdresserRepository
     */
    public function __construct(HairdresserRepository $hairdresserRepository)
    {
        $this->hairdresserRepository = $hairdresserRepository;
    }

    /**
     * This method return all hairdressers from DB
     * @return  mixed
     */
    public function getAll(): mixed
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

    /**
     * @param   HairdresserUpdateRequest $request
     * @param   Hairdresser $hairdresser
     * @return  RedirectResponse
     */
    public function update(HairdresserUpdateRequest $request, Hairdresser $hairdresser): RedirectResponse
    {
        try {

            $update = [
                'name' => $request->get('name'),
                'surname' => $request->get('surname'),
                'phone_number' => $request->get('phone_number')
            ];

            $hairdresser->update($update);

            $profile = [];

            $profile['description'] = $request->get('description');
            if(!is_null($request->get('photo_path')))
                $profile['photo_path'] = $request->file('photo')->store('hairdressers');

            $hairdresser->profile()->update($profile);

            return back()->with('status', 'Successful update account');

        } catch (Exception $error) {
            return back()->with('status', $error->getMessage());
        }
    }

    /**
     * @param   Hairdresser $hairdresser
     * @return  JsonResponse
     */
    public function destroy(Hairdresser $hairdresser): JsonResponse
    {
        try {

            $hairdresser->profile()->delete();
            $hairdresser->delete();

            return response()->json([
                'status' => 'success'
            ]);

        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage()
            ])->setStatusCode(500);
        }
    }

    /**
     * @param   HairdresserRequest $request
     */
    protected function createProfile(HairdresserRequest $request): void
    {
        $hairdresser = Hairdresser::all()->where('phone_number', $request->get('phone_number'))->first();

        HairdresserProfile::create(['hairdresser_id' => $hairdresser->id]);
    }
}
