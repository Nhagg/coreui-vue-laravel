<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLessionAPIRequest;
use App\Http\Requests\API\UpdateLessionAPIRequest;
use App\Models\Lession;
use App\Repositories\LessionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class LessionController
 * @package App\Http\Controllers\API
 */

class LessionAPIController extends AppBaseController
{
    /** @var  LessionRepository */
    private $lessionRepository;

    public function __construct(LessionRepository $lessionRepo)
    {
        $this->lessionRepository = $lessionRepo;
    }

    /**
     * Display a listing of the Lession.
     * GET|HEAD /lessions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $lessions = $this->lessionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($lessions->toArray(), 'Lessions retrieved successfully');
    }

    /**
     * Store a newly created Lession in storage.
     * POST /lessions
     *
     * @param CreateLessionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLessionAPIRequest $request)
    {
        $input = $request->all();

        $lession = $this->lessionRepository->create($input);

        return $this->sendResponse($lession->toArray(), 'Lession saved successfully');
    }

    /**
     * Display the specified Lession.
     * GET|HEAD /lessions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Lession $lession */
        $lession = $this->lessionRepository->find($id);

        if (empty($lession)) {
            return $this->sendError('Lession not found');
        }

        return $this->sendResponse($lession->toArray(), 'Lession retrieved successfully');
    }

    /**
     * Update the specified Lession in storage.
     * PUT/PATCH /lessions/{id}
     *
     * @param int $id
     * @param UpdateLessionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLessionAPIRequest $request)
    {
        $input = $request->all();

        /** @var Lession $lession */
        $lession = $this->lessionRepository->find($id);

        if (empty($lession)) {
            return $this->sendError('Lession not found');
        }

        $lession = $this->lessionRepository->update($input, $id);

        return $this->sendResponse($lession->toArray(), 'Lession updated successfully');
    }

    /**
     * Remove the specified Lession from storage.
     * DELETE /lessions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Lession $lession */
        $lession = $this->lessionRepository->find($id);

        if (empty($lession)) {
            return $this->sendError('Lession not found');
        }

        $lession->delete();

        return $this->sendSuccess('Lession deleted successfully');
    }
}
