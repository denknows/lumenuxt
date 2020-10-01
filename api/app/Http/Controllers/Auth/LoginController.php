<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class LoginController
 * @package App\Http\Controllers\Auth
 */
class LoginController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function __invoke(Request $request)
    {
        $data = $this->validate($request, [
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (!$token = Auth::attempt($data)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return response()->json([
            'data' => [
                'token' => $token,
                'expires_in' => Auth::factory()->getTTL() * 60000,
            ]
        ], 200);
    }
}
