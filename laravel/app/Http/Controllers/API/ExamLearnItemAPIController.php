<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateExamLearnItemAPIRequest;
use App\Http\Requests\API\UpdateExamLearnItemAPIRequest;
use App\Models\ExamLearnItem;
use App\Repositories\ExamLearnItemRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ExamLearnItemController
 * @package App\Http\Controllers\API
 */

class ExamLearnItemAPIController extends AppBaseController
{
    /** @var  ExamLearnItemRepository */
    private $examLearnItemRepository;

    public function __construct(ExamLearnItemRepository $examLearnItemRepo)
    {
        $this->examLearnItemRepository = $examLearnItemRepo;
    }

    /**
     * Display a listing of the ExamLearnItem.
     * GET|HEAD /examLearnItems
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $examLearnItems = $this->examLearnItemRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($examLearnItems->toArray(), 'Exam Learn Items retrieved successfully');
    }

    /**
     * Store a newly created ExamLearnItem in storage.
     * POST /examLearnItems
     *
     * @param CreateExamLearnItemAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateExamLearnItemAPIRequest $request)
    {
        $input = $request->all();

        $examLearnItem = $this->examLearnItemRepository->create($input);

        return $this->sendResponse($examLearnItem->toArray(), 'Exam Learn Item saved successfully');
    }

    /**
     * Display the specified ExamLearnItem.
     * GET|HEAD /examLearnItems/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ExamLearnItem $examLearnItem */
        $examLearnItem = $this->examLearnItemRepository->find($id);

        if (empty($examLearnItem)) {
            return $this->sendError('Exam Learn Item not found');
        }

        return $this->sendResponse($examLearnItem->toArray(), 'Exam Learn Item retrieved successfully');
    }

    /**
     * Update the specified ExamLearnItem in storage.
     * PUT/PATCH /examLearnItems/{id}
     *
     * @param int $id
     * @param UpdateExamLearnItemAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateExamLearnItemAPIRequest $request)
    {
        $input = $request->all();

        /** @var ExamLearnItem $examLearnItem */
        $examLearnItem = $this->examLearnItemRepository->find($id);

        if (empty($examLearnItem)) {
            return $this->sendError('Exam Learn Item not found');
        }

        $examLearnItem = $this->examLearnItemRepository->update($input, $id);

        return $this->sendResponse($examLearnItem->toArray(), 'ExamLearnItem updated successfully');
    }

    /**
     * Remove the specified ExamLearnItem from storage.
     * DELETE /examLearnItems/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ExamLearnItem $examLearnItem */
        $examLearnItem = $this->examLearnItemRepository->find($id);

        if (empty($examLearnItem)) {
            return $this->sendError('Exam Learn Item not found');
        }

        $examLearnItem->delete();

        return $this->sendSuccess('Exam Learn Item deleted successfully');
    }
}
