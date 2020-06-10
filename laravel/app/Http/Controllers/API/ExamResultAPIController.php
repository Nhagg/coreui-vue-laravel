<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateExamResultAPIRequest;
use App\Http\Requests\API\UpdateExamResultAPIRequest;
use App\Models\ExamResult;
use App\Repositories\ExamResultRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ExamResultController
 * @package App\Http\Controllers\API
 */

class ExamResultAPIController extends AppBaseController
{
    /** @var  ExamResultRepository */
    private $examResultRepository;

    public function __construct(ExamResultRepository $examResultRepo)
    {
        $this->examResultRepository = $examResultRepo;
    }

    /**
     * Display a listing of the ExamResult.
     * GET|HEAD /examResults
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $examResults = $this->examResultRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($examResults->toArray(), 'Exam Results retrieved successfully');
    }

    /**
     * Store a newly created ExamResult in storage.
     * POST /examResults
     *
     * @param CreateExamResultAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateExamResultAPIRequest $request)
    {
        $input = $request->all();

        $examResult = $this->examResultRepository->create($input);

        return $this->sendResponse($examResult->toArray(), 'Exam Result saved successfully');
    }

    /**
     * Display the specified ExamResult.
     * GET|HEAD /examResults/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ExamResult $examResult */
        $examResult = $this->examResultRepository->find($id);

        if (empty($examResult)) {
            return $this->sendError('Exam Result not found');
        }

        return $this->sendResponse($examResult->toArray(), 'Exam Result retrieved successfully');
    }

    /**
     * Update the specified ExamResult in storage.
     * PUT/PATCH /examResults/{id}
     *
     * @param int $id
     * @param UpdateExamResultAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateExamResultAPIRequest $request)
    {
        $input = $request->all();

        /** @var ExamResult $examResult */
        $examResult = $this->examResultRepository->find($id);

        if (empty($examResult)) {
            return $this->sendError('Exam Result not found');
        }

        $examResult = $this->examResultRepository->update($input, $id);

        return $this->sendResponse($examResult->toArray(), 'ExamResult updated successfully');
    }

    /**
     * Remove the specified ExamResult from storage.
     * DELETE /examResults/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ExamResult $examResult */
        $examResult = $this->examResultRepository->find($id);

        if (empty($examResult)) {
            return $this->sendError('Exam Result not found');
        }

        $examResult->delete();

        return $this->sendSuccess('Exam Result deleted successfully');
    }
}
