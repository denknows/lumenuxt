<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

/**
 * Class MeController
 * @package App\Http\Controllers\Auth
 */
class MeController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke()
    {
        return response()->json([
            'data' => auth()->user()
        ]);
    }
}
