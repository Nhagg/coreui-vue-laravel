<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLearnTransactionAPIRequest;
use App\Http\Requests\API\UpdateLearnTransactionAPIRequest;
use App\Models\LearnTransaction;
use App\Repositories\LearnTransactionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class LearnTransactionController
 * @package App\Http\Controllers\API
 */

class LearnTransactionAPIController extends AppBaseController
{
    /** @var  LearnTransactionRepository */
    private $learnTransactionRepository;

    public function __construct(LearnTransactionRepository $learnTransactionRepo)
    {
        $this->learnTransactionRepository = $learnTransactionRepo;
    }

    /**
     * Display a listing of the LearnTransaction.
     * GET|HEAD /learnTransactions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $learnTransactions = $this->learnTransactionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($learnTransactions->toArray(), 'Learn Transactions retrieved successfully');
    }

    /**
     * Store a newly created LearnTransaction in storage.
     * POST /learnTransactions
     *
     * @param CreateLearnTransactionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLearnTransactionAPIRequest $request)
    {
        $input = $request->all();

        $learnTransaction = $this->learnTransactionRepository->create($input);

        return $this->sendResponse($learnTransaction->toArray(), 'Learn Transaction saved successfully');
    }

    /**
     * Display the specified LearnTransaction.
     * GET|HEAD /learnTransactions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var LearnTransaction $learnTransaction */
        $learnTransaction = $this->learnTransactionRepository->find($id);

        if (empty($learnTransaction)) {
            return $this->sendError('Learn Transaction not found');
        }

        return $this->sendResponse($learnTransaction->toArray(), 'Learn Transaction retrieved successfully');
    }

    /**
     * Update the specified LearnTransaction in storage.
     * PUT/PATCH /learnTransactions/{id}
     *
     * @param int $id
     * @param UpdateLearnTransactionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLearnTransactionAPIRequest $request)
    {
        $input = $request->all();

        /** @var LearnTransaction $learnTransaction */
        $learnTransaction = $this->learnTransactionRepository->find($id);

        if (empty($learnTransaction)) {
            return $this->sendError('Learn Transaction not found');
        }

        $learnTransaction = $this->learnTransactionRepository->update($input, $id);

        return $this->sendResponse($learnTransaction->toArray(), 'LearnTransaction updated successfully');
    }

    /**
     * Remove the specified LearnTransaction from storage.
     * DELETE /learnTransactions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var LearnTransaction $learnTransaction */
        $learnTransaction = $this->learnTransactionRepository->find($id);

        if (empty($learnTransaction)) {
            return $this->sendError('Learn Transaction not found');
        }

        $learnTransaction->delete();

        return $this->sendSuccess('Learn Transaction deleted successfully');
    }
}
