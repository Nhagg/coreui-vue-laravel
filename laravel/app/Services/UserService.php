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

    public function auth($input)
    {
        $authId = $input['auth_id'] ?? null;
        if (empty($authId)) {
            return null;
        }
        $name = $input['profile']['Bd'] ?? $input['nW'] ?? '';
        $email = $input['profile']['Au'] ?? '';
        $params = [
            'auth_id' => $authId,
            'name' => $name,
            'email' => $email,
            'status' => User::STATUS_ACTIVE,
            'auth_type' => User::AUTH_TYPE_GOOGLE,
            'username' => User::AUTH_TYPE_GOOGLE . '-' . $authId,
            'password' => Hash::make(User::AUTH_TYPE_GOOGLE . '-' . $authId)
        ];
        $user = $this->userRepo->updateOrCreate(['auth_type' => User::AUTH_TYPE_GOOGLE, 'email' => $email], $params);
        $user->token = $user->createToken($authId)->plainTextToken;
        return $user;
    }
}
