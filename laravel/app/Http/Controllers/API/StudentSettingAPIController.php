<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateStudentSetiongAPIRequest;
use App\Http\Requests\API\UpdateStudentSetiongAPIRequest;
use App\Models\StudentSetting;
use App\Repositories\StudentSetiongRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class StudentSetiongController
 * @package App\Http\Controllers\API
 */

class StudentSettingAPIController extends AppBaseController
{
    /** @var  StudentSetiongRepository */
    private $studentSetiongRepository;

    public function __construct(StudentSetiongRepository $studentSetiongRepo)
    {
        $this->studentSetiongRepository = $studentSetiongRepo;
    }

    /**
     * Display a listing of the StudentSetiong.
     * GET|HEAD /studentSetiongs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $studentSetiongs = $this->studentSetiongRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($studentSetiongs->toArray(), 'Student Setiongs retrieved successfully');
    }

    /**
     * Store a newly created StudentSetiong in storage.
     * POST /studentSetiongs
     *
     * @param CreateStudentSetiongAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateStudentSetiongAPIRequest $request)
    {
        $input = $request->all();

        $studentSetiong = $this->studentSetiongRepository->create($input);

        return $this->sendResponse($studentSetiong->toArray(), 'Student Setiong saved successfully');
    }

    /**
     * Display the specified StudentSetiong.
     * GET|HEAD /studentSetiongs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var StudentSetting $studentSetiong */
        $studentSetiong = $this->studentSetiongRepository->find($id);

        if (empty($studentSetiong)) {
            return $this->sendError('Student Setiong not found');
        }

        return $this->sendResponse($studentSetiong->toArray(), 'Student Setiong retrieved successfully');
    }

    /**
     * Update the specified StudentSetiong in storage.
     * PUT/PATCH /studentSetiongs/{id}
     *
     * @param int $id
     * @param UpdateStudentSetiongAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStudentSetiongAPIRequest $request)
    {
        $input = $request->all();

        /** @var StudentSetting $studentSetiong */
        $studentSetiong = $this->studentSetiongRepository->find($id);

        if (empty($studentSetiong)) {
            return $this->sendError('Student Setiong not found');
        }

        $studentSetiong = $this->studentSetiongRepository->update($input, $id);

        return $this->sendResponse($studentSetiong->toArray(), 'StudentSetiong updated successfully');
    }

    /**
     * Remove the specified StudentSetiong from storage.
     * DELETE /studentSetiongs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var StudentSetting $studentSetiong */
        $studentSetiong = $this->studentSetiongRepository->find($id);

        if (empty($studentSetiong)) {
            return $this->sendError('Student Setiong not found');
        }

        $studentSetiong->delete();

        return $this->sendSuccess('Student Setiong deleted successfully');
    }
}
