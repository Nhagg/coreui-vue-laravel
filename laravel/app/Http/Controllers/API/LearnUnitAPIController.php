<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLearnUnitAPIRequest;
use App\Http\Requests\API\UpdateLearnUnitAPIRequest;
use App\Models\LearnUnit;
use App\Repositories\LearnUnitRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class LearnUnitController
 * @package App\Http\Controllers\API
 */

class LearnUnitAPIController extends AppBaseController
{
    /** @var  LearnUnitRepository */
    private $learnUnitRepository;

    public function __construct(LearnUnitRepository $learnUnitRepo)
    {
        $this->learnUnitRepository = $learnUnitRepo;
    }

    /**
     * Display a listing of the LearnUnit.
     * GET|HEAD /learnUnits
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $learnUnits = $this->learnUnitRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($learnUnits->toArray(), 'Learn Units retrieved successfully');
    }

    /**
     * Store a newly created LearnUnit in storage.
     * POST /learnUnits
     *
     * @param CreateLearnUnitAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLearnUnitAPIRequest $request)
    {
        $input = $request->all();

        $learnUnit = $this->learnUnitRepository->create($input);

        return $this->sendResponse($learnUnit->toArray(), 'Learn Unit saved successfully');
    }

    /**
     * Display the specified LearnUnit.
     * GET|HEAD /learnUnits/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var LearnUnit $learnUnit */
        $learnUnit = $this->learnUnitRepository->find($id);

        if (empty($learnUnit)) {
            return $this->sendError('Learn Unit not found');
        }

        return $this->sendResponse($learnUnit->toArray(), 'Learn Unit retrieved successfully');
    }

    /**
     * Update the specified LearnUnit in storage.
     * PUT/PATCH /learnUnits/{id}
     *
     * @param int $id
     * @param UpdateLearnUnitAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLearnUnitAPIRequest $request)
    {
        $input = $request->all();

        /** @var LearnUnit $learnUnit */
        $learnUnit = $this->learnUnitRepository->find($id);

        if (empty($learnUnit)) {
            return $this->sendError('Learn Unit not found');
        }

        $learnUnit = $this->learnUnitRepository->update($input, $id);

        return $this->sendResponse($learnUnit->toArray(), 'LearnUnit updated successfully');
    }

    /**
     * Remove the specified LearnUnit from storage.
     * DELETE /learnUnits/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var LearnUnit $learnUnit */
        $learnUnit = $this->learnUnitRepository->find($id);

        if (empty($learnUnit)) {
            return $this->sendError('Learn Unit not found');
        }

        $learnUnit->delete();

        return $this->sendSuccess('Learn Unit deleted successfully');
    }
}
