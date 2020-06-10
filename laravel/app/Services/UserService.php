<?php


namespace App\Services;


use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserService
{
    /** @var UserRepository */
    private $userRepo;

    public function __construct()
    {
        $this->userRepo = app(UserRepository::class);
    }

    public function register($input)
    {
        $input['status'] = User::STATUS_ACTIVE;
        $input['password'] = bcrypt($input['password']);
        $input['username'] = $input['name'];
        return $this->userRepo->create($input);
    }

    public function login($input)
    {
        $username = $input['email'];
        $user = $this->userRepo->newQuery()->where('username', $username)->first();
        if (!$user) {
            return false;
        }

        if (!Hash::check($input['password'], $user->password)) {
            return false;
        }

        $user->token = $user->createToken($username)->plainTextToken;
        return $user;
    }
}
