<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserLoginRequest;
use App\Http\Requests\Api\UserProfileRequest;
use App\Http\Requests\Api\UserRegisterRequest;
use App\Http\Resources\Api\UserLoginResource;
use App\Http\Utils\Response;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function __construct(
        readonly private UserService $service,
    ) {}

    /**
     * Controller method to register/create users for the application
     *
     * @param UserRegisterRequest $request
     * @return JsonResponse
     */
    public function register(UserRegisterRequest $request): JsonResponse
    {
        $inputs = $request->validated();

        $user = $this->service->register($inputs);

        return Response::success($user);
    }

    public function me(): UserLoginResource
    {
        return UserLoginResource::make(Auth::user());
    }

    /**
     * Logs in the user into the system and returns a JWT token to use as Bearer Token to interact with guarded api
     * endpoints
     *
     * @param UserLoginRequest $request
     * @return JsonResponse
     */
    public function login(UserLoginRequest $request): JsonResponse
    {
        $credentials = $request->validated();

        if (! $token = Auth::guard('api')->attempt($credentials)) {
            return Response::unauthorized(["message" => "Unauthorized"]);
        }

        return Response::success($this->respondWithToken($token));
    }

    /**
     * Logout method
     *
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        Auth::guard('api')->logout();

        return Response::success([
            "message" => "Logged out successfully",
        ]);
    }

    /**
     * Refreshes the JWT token
     *
     * @return JsonResponse
     */
    public function refresh(): JsonResponse
    {
        return Response::success($this->respondWithToken(Auth::guard('api')->refresh()));
    }

    /**
     * Updates the profile of the user
     *
     * @param UserProfileRequest $request
     * @return UserLoginResource
     */
    public function updateProfile(UserProfileRequest $request, User $user): UserLoginResource
    {
        Gate::authorize('updateProfile', [User::class, $user]);

        $input = $request->validated();

        $user = $this->service->updateProfile($input, $user);

        return new UserLoginResource($user);
    }

    /**
     * Returns the token and its expiration date
     *
     * @param string $token
     * @return array
     */
    protected function respondWithToken(string $token): array
    {
        return [
            "bearer_token" => $token,
            "token_type" => "bearer",
            "expires_in" => Auth::guard('api')->factory()->getTTL() * 60,
        ];
    }
}
