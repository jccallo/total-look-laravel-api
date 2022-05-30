<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\access\LoginRequest;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AccessController extends Controller
{
    public function Login(LoginRequest $request)
    {
        $empleado = Empleado::where('email', $request->email)->first();
        if (!$empleado || !Hash::check($request->password, $empleado->password)) {
            throw ValidationException::withMessages([
                'credentials ' => ['Las credenciales son incorrectas.'],
            ]);
        }
        $token = $empleado->createToken($request->email)->plainTextToken;
        return response()->json([
            'res' => true,
            'token' => $token,
        ], 200);
    }

    public function Logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'res' => true,
            'msg' => 'Token eliminado correctamente',
        ], 200);
    }
}
