<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLearnItemAPIRequest;
use App\Http\Requests\API\UpdateLearnItemAPIRequest;
use App\Models\LearnItem;
use App\Repositories\LearnItemRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class LearnItemController
 * @package App\Http\Controllers\API
 */

class LearnItemAPIController extends AppBaseController
{
    /** @var  LearnItemRepository */
    private $learnItemRepository;

    public function __construct(LearnItemRepository $learnItemRepo)
    {
        $this->learnItemRepository = $learnItemRepo;
    }

    /**
     * Display a listing of the LearnItem.
     * GET|HEAD /learnItems
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $learnItems = $this->learnItemRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($learnItems->toArray(), 'Learn Items retrieved successfully');
    }

    /**
     * Store a newly created LearnItem in storage.
     * POST /learnItems
     *
     * @param CreateLearnItemAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLearnItemAPIRequest $request)
    {
        $input = $request->all();

        $learnItem = $this->learnItemRepository->create($input);

        return $this->sendResponse($learnItem->toArray(), 'Learn Item saved successfully');
    }

    /**
     * Display the specified LearnItem.
     * GET|HEAD /learnItems/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var LearnItem $learnItem */
        $learnItem = $this->learnItemRepository->find($id);

        if (empty($learnItem)) {
            return $this->sendError('Learn Item not found');
        }

        return $this->sendResponse($learnItem->toArray(), 'Learn Item retrieved successfully');
    }

    /**
     * Update the specified LearnItem in storage.
     * PUT/PATCH /learnItems/{id}
     *
     * @param int $id
     * @param UpdateLearnItemAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLearnItemAPIRequest $request)
    {
        $input = $request->all();

        /** @var LearnItem $learnItem */
        $learnItem = $this->learnItemRepository->find($id);

        if (empty($learnItem)) {
            return $this->sendError('Learn Item not found');
        }

        $learnItem = $this->learnItemRepository->update($input, $id);

        return $this->sendResponse($learnItem->toArray(), 'LearnItem updated successfully');
    }

    /**
     * Remove the specified LearnItem from storage.
     * DELETE /learnItems/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var LearnItem $learnItem */
        $learnItem = $this->learnItemRepository->find($id);

        if (empty($learnItem)) {
            return $this->sendError('Learn Item not found');
        }

        $learnItem->delete();

        return $this->sendSuccess('Learn Item deleted successfully');
    }
}
