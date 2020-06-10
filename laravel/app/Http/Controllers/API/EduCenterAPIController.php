<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEduCenterAPIRequest;
use App\Http\Requests\API\UpdateEduCenterAPIRequest;
use App\Models\EduCenter;
use App\Repositories\EduCenterRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class EduCenterController
 * @package App\Http\Controllers\API
 */

class EduCenterAPIController extends AppBaseController
{
    /** @var  EduCenterRepository */
    private $eduCenterRepository;

    public function __construct(EduCenterRepository $eduCenterRepo)
    {
        $this->eduCenterRepository = $eduCenterRepo;
    }

    /**
     * Display a listing of the EduCenter.
     * GET|HEAD /eduCenters
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $eduCenters = $this->eduCenterRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($eduCenters->toArray(), 'Edu Centers retrieved successfully');
    }

    /**
     * Store a newly created EduCenter in storage.
     * POST /eduCenters
     *
     * @param CreateEduCenterAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEduCenterAPIRequest $request)
    {
        $input = $request->all();

        $eduCenter = $this->eduCenterRepository->create($input);

        return $this->sendResponse($eduCenter->toArray(), 'Edu Center saved successfully');
    }

    /**
     * Display the specified EduCenter.
     * GET|HEAD /eduCenters/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var EduCenter $eduCenter */
        $eduCenter = $this->eduCenterRepository->find($id);

        if (empty($eduCenter)) {
            return $this->sendError('Edu Center not found');
        }

        return $this->sendResponse($eduCenter->toArray(), 'Edu Center retrieved successfully');
    }

    /**
     * Update the specified EduCenter in storage.
     * PUT/PATCH /eduCenters/{id}
     *
     * @param int $id
     * @param UpdateEduCenterAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEduCenterAPIRequest $request)
    {
        $input = $request->all();

        /** @var EduCenter $eduCenter */
        $eduCenter = $this->eduCenterRepository->find($id);

        if (empty($eduCenter)) {
            return $this->sendError('Edu Center not found');
        }

        $eduCenter = $this->eduCenterRepository->update($input, $id);

        return $this->sendResponse($eduCenter->toArray(), 'EduCenter updated successfully');
    }

    /**
     * Remove the specified EduCenter from storage.
     * DELETE /eduCenters/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var EduCenter $eduCenter */
        $eduCenter = $this->eduCenterRepository->find($id);

        if (empty($eduCenter)) {
            return $this->sendError('Edu Center not found');
        }

        $eduCenter->delete();

        return $this->sendSuccess('Edu Center deleted successfully');
    }
}
