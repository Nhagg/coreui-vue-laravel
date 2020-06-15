<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\LoginUserAPIRequest;
use App\Http\Requests\API\RegisterUserAPIRequest;
use App\Repositories\BlueprintRepository;
use App\Repositories\UserRepository;
use App\Services\UserService;

class AuthController extends AppBaseController
{
    /** @var UserRepository */
    private $userRepo;
    /** @var UserService */
    private $userService;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepo = $userRepository;
        $this->userService = app(UserService::class);
    }

    public function register(RegisterUserAPIRequest $request)
    {
        $input = $request->all();
        $user = $this->userService->register($input);
        return $this->sendResponse($user, 'Register success!');
    }

    public function login(LoginUserAPIRequest $request)
    {
        $user = $this->userService->login($request->all());
        if (!$user){
            return $this->sendError("Username or password something wrong!", 401);
        }
        return $this->sendResponse($user, 'Login success!');
    }


    public function logout()
    {
        auth()->logout();

        return $this->sendResponse(null, 'Successfully logged out') ;
    }


    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
