<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateConversationPersonAPIRequest;
use App\Http\Requests\API\UpdateConversationPersonAPIRequest;
use App\Models\ConversationPerson;
use App\Repositories\ConversationPersonRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ConversationPersonController
 * @package App\Http\Controllers\API
 */

class ConversationPersonAPIController extends AppBaseController
{
    /** @var  ConversationPersonRepository */
    private $conversationPersonRepository;

    public function __construct(ConversationPersonRepository $conversationPersonRepo)
    {
        $this->conversationPersonRepository = $conversationPersonRepo;
    }

    /**
     * Display a listing of the ConversationPerson.
     * GET|HEAD /conversationPeople
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $conversationPeople = $this->conversationPersonRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($conversationPeople->toArray(), 'Conversation People retrieved successfully');
    }

    /**
     * Store a newly created ConversationPerson in storage.
     * POST /conversationPeople
     *
     * @param CreateConversationPersonAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateConversationPersonAPIRequest $request)
    {
        $input = $request->all();

        $conversationPerson = $this->conversationPersonRepository->create($input);

        return $this->sendResponse($conversationPerson->toArray(), 'Conversation Person saved successfully');
    }

    /**
     * Display the specified ConversationPerson.
     * GET|HEAD /conversationPeople/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ConversationPerson $conversationPerson */
        $conversationPerson = $this->conversationPersonRepository->find($id);

        if (empty($conversationPerson)) {
            return $this->sendError('Conversation Person not found');
        }

        return $this->sendResponse($conversationPerson->toArray(), 'Conversation Person retrieved successfully');
    }

    /**
     * Update the specified ConversationPerson in storage.
     * PUT/PATCH /conversationPeople/{id}
     *
     * @param int $id
     * @param UpdateConversationPersonAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConversationPersonAPIRequest $request)
    {
        $input = $request->all();

        /** @var ConversationPerson $conversationPerson */
        $conversationPerson = $this->conversationPersonRepository->find($id);

        if (empty($conversationPerson)) {
            return $this->sendError('Conversation Person not found');
        }

        $conversationPerson = $this->conversationPersonRepository->update($input, $id);

        return $this->sendResponse($conversationPerson->toArray(), 'ConversationPerson updated successfully');
    }

    /**
     * Remove the specified ConversationPerson from storage.
     * DELETE /conversationPeople/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ConversationPerson $conversationPerson */
        $conversationPerson = $this->conversationPersonRepository->find($id);

        if (empty($conversationPerson)) {
            return $this->sendError('Conversation Person not found');
        }

        $conversationPerson->delete();

        return $this->sendSuccess('Conversation Person deleted successfully');
    }
}
