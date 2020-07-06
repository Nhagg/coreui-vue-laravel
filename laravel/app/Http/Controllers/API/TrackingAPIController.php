<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\CreateTrackingAPIRequest;
use App\Http\Requests\API\UpdateTrackingAPIRequest;
use App\Models\Tracking;
use App\Repositories\TrackingRepository;
use App\Services\TrackingService;
use Illuminate\Http\Request;
use Response;

/**
 * Class TrackingController
 * @package App\Http\Controllers\API
 */
class TrackingAPIController extends AppBaseController
{
    /** @var  TrackingRepository */
    private $trackingRepository;

    /** @var  TrackingService */
    private $trackingService;

    public function __construct(TrackingRepository $trackingRepo)
    {
        $this->trackingRepository = $trackingRepo;
        $this->trackingService = app(TrackingService::class);
    }

    /**
     * Display a listing of the Tracking.
     * GET|HEAD /trackings
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $trackings = $this->trackingRepository->all($request->all());

        return $this->sendResponse($trackings->toArray(), 'Trackings retrieved successfully');
    }

    /**
     * Store a newly created Tracking in storage.
     * POST /trackings
     *
     * @param CreateTrackingAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTrackingAPIRequest $request)
    {
        $input = $request->all();
        $tracking = $this->trackingService->store($input);
        if (!$tracking) {
            $this->sendError('Tracking saved error.');
        }
        return $this->sendResponse($tracking->toArray(), 'Tracking saved successfully');
    }

    /**
     * Display the specified Tracking.
     * GET|HEAD /trackings/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Tracking $tracking */
        $tracking = $this->trackingRepository->find($id);

        if (empty($tracking)) {
            return $this->sendError('Tracking not found');
        }

        return $this->sendResponse($tracking->toArray(), 'Tracking retrieved successfully');
    }

    /**
     * Update the specified Tracking in storage.
     * PUT/PATCH /trackings/{id}
     *
     * @param int $id
     * @param UpdateTrackingAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTrackingAPIRequest $request)
    {
        $input = $request->all();

        /** @var Tracking $tracking */
        $tracking = $this->trackingRepository->find($id);

        if (empty($tracking)) {
            return $this->sendError('Tracking not found');
        }

        $tracking = $this->trackingRepository->update($input, $id);

        return $this->sendResponse($tracking->toArray(), 'Tracking updated successfully');
    }

    /**
     * Remove the specified Tracking from storage.
     * DELETE /trackings/{id}
     *
     * @param int $id
     *
     * @return Response
     * @throws \Exception
     *
     */
    public function destroy($id)
    {
        /** @var Tracking $tracking */
        $tracking = $this->trackingRepository->find($id);

        if (empty($tracking)) {
            return $this->sendError('Tracking not found');
        }

        $tracking->delete();

        return $this->sendSuccess('Tracking deleted successfully');
    }
}
