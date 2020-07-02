<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUserClassAPIRequest;
use App\Http\Requests\API\UpdateUserClassAPIRequest;
use App\Models\UserClass;
use App\Repositories\UserClassRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class UserClassController
 * @package App\Http\Controllers\API
 */

class UserClassAPIController extends AppBaseController
{
    /** @var  UserClassRepository */
    private $userClassRepository;

    public function __construct(UserClassRepository $userClassRepo)
    {
        $this->userClassRepository = $userClassRepo;
    }

    /**
     * Display a listing of the UserClass.
     * GET|HEAD /userClasses
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $userClasses = $this->userClassRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($userClasses->toArray(), 'User Classes retrieved successfully');
    }

    /**
     * Store a newly created UserClass in storage.
     * POST /userClasses
     *
     * @param CreateUserClassAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUserClassAPIRequest $request)
    {
        $input = $request->all();

        $userClass = $this->userClassRepository->create($input);

        return $this->sendResponse($userClass->toArray(), 'User Class saved successfully');
    }

    /**
     * Display the specified UserClass.
     * GET|HEAD /userClasses/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var UserClass $userClass */
        $userClass = $this->userClassRepository->find($id);

        if (empty($userClass)) {
            return $this->sendError('User Class not found');
        }

        return $this->sendResponse($userClass->toArray(), 'User Class retrieved successfully');
    }

    /**
     * Update the specified UserClass in storage.
     * PUT/PATCH /userClasses/{id}
     *
     * @param int $id
     * @param UpdateUserClassAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserClassAPIRequest $request)
    {
        $input = $request->all();

        /** @var UserClass $userClass */
        $userClass = $this->userClassRepository->find($id);

        if (empty($userClass)) {
            return $this->sendError('User Class not found');
        }

        $userClass = $this->userClassRepository->update($input, $id);

        return $this->sendResponse($userClass->toArray(), 'UserClass updated successfully');
    }

    /**
     * Remove the specified UserClass from storage.
     * DELETE /userClasses/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var UserClass $userClass */
        $userClass = $this->userClassRepository->find($id);

        if (empty($userClass)) {
            return $this->sendError('User Class not found');
        }

        $userClass->delete();

        return $this->sendSuccess('User Class deleted successfully');
    }
}
