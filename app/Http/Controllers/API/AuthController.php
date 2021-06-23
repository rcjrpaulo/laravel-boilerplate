<?php


namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Http\Requests\API\Auth\LoginRequest;
use App\Http\Requests\API\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response()->json(['user' => $user]);
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            $user = User::where('email', $request->email)->first();
            $token = $user->createToken('token-name');

            return response()->json(['token' => $token->plainTextToken], 200);
        }

        throw ValidationException::withMessages([
                                                    'error' => 'The credentials sent are incorrect.'
                                                ]);
    }

    public function logout()
    {
        // desativa apenas do token passado
        request()->user()->currentAccessToken()->delete();

        return response()->json(null, 204);
    }

    public function logoutAllDevices()
    {
        // desativa todos os tokens do usuário (desloga de web, mobile, etc)
        auth()->user()->tokens()->delete();

        return response()->json(null, 204);
    }

    public function user()
    {
        return response()->json(['user' => auth()->user()]);
    }
}

