<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateClassAPIRequest;
use App\Http\Requests\API\UpdateClassAPIRequest;
use App\Models\Clazz;
use App\Repositories\ClassRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ClassController
 * @package App\Http\Controllers\API
 */

class ClassAPIController extends AppBaseController
{
    /** @var  ClassRepository */
    private $classRepository;

    public function __construct(ClassRepository $classRepo)
    {
        $this->classRepository = $classRepo;
    }

    /**
     * Display a listing of the Class.
     * GET|HEAD /classes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $classes = $this->classRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($classes->toArray(), 'Classes retrieved successfully');
    }

    /**
     * Store a newly created Class in storage.
     * POST /classes
     *
     * @param CreateClassAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateClassAPIRequest $request)
    {
        $input = $request->all();

        $class = $this->classRepository->create($input);

        return $this->sendResponse($class->toArray(), 'Class saved successfully');
    }

    /**
     * Display the specified Class.
     * GET|HEAD /classes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Clazz $class */
        $class = $this->classRepository->find($id);

        if (empty($class)) {
            return $this->sendError('Class not found');
        }

        return $this->sendResponse($class->toArray(), 'Class retrieved successfully');
    }

    /**
     * Update the specified Class in storage.
     * PUT/PATCH /classes/{id}
     *
     * @param int $id
     * @param UpdateClassAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClassAPIRequest $request)
    {
        $input = $request->all();

        /** @var Clazz $class */
        $class = $this->classRepository->find($id);

        if (empty($class)) {
            return $this->sendError('Class not found');
        }

        $class = $this->classRepository->update($input, $id);

        return $this->sendResponse($class->toArray(), 'Class updated successfully');
    }

    /**
     * Remove the specified Class from storage.
     * DELETE /classes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Clazz $class */
        $class = $this->classRepository->find($id);

        if (empty($class)) {
            return $this->sendError('Class not found');
        }

        $class->delete();

        return $this->sendSuccess('Class deleted successfully');
    }
}
