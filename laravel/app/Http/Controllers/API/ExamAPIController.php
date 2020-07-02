<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateExamAPIRequest;
use App\Http\Requests\API\UpdateExamAPIRequest;
use App\Models\Exam;
use App\Repositories\ExamRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ExamController
 * @package App\Http\Controllers\API
 */

class ExamAPIController extends AppBaseController
{
    /** @var  ExamRepository */
    private $examRepository;

    public function __construct(ExamRepository $examRepo)
    {
        $this->examRepository = $examRepo;
    }

    /**
     * Display a listing of the Exam.
     * GET|HEAD /exams
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $exams = $this->examRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($exams->toArray(), 'Exams retrieved successfully');
    }

    /**
     * Store a newly created Exam in storage.
     * POST /exams
     *
     * @param CreateExamAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateExamAPIRequest $request)
    {
        $input = $request->all();

        $exam = $this->examRepository->create($input);

        return $this->sendResponse($exam->toArray(), 'Exam saved successfully');
    }

    /**
     * Display the specified Exam.
     * GET|HEAD /exams/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Exam $exam */
        $exam = $this->examRepository->find($id);

        if (empty($exam)) {
            return $this->sendError('Exam not found');
        }

        return $this->sendResponse($exam->toArray(), 'Exam retrieved successfully');
    }

    /**
     * Update the specified Exam in storage.
     * PUT/PATCH /exams/{id}
     *
     * @param int $id
     * @param UpdateExamAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateExamAPIRequest $request)
    {
        $input = $request->all();

        /** @var Exam $exam */
        $exam = $this->examRepository->find($id);

        if (empty($exam)) {
            return $this->sendError('Exam not found');
        }

        $exam = $this->examRepository->update($input, $id);

        return $this->sendResponse($exam->toArray(), 'Exam updated successfully');
    }

    /**
     * Remove the specified Exam from storage.
     * DELETE /exams/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Exam $exam */
        $exam = $this->examRepository->find($id);

        if (empty($exam)) {
            return $this->sendError('Exam not found');
        }

        $exam->delete();

        return $this->sendSuccess('Exam deleted successfully');
    }
}
