<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

use App\Models\User;

class LoginController extends Controller
{






public function login(Request $request)
{

    Log::info('Request has token:', [
    '_token' => $request->_token,
    'headers' => $request->headers->all()
]);
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (!Auth::attempt($request->only('email', 'password'), true)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    $request->session()->regenerate();

    return response()->json(['message' => 'Logged in successfully']);
}










    //   public function login(Request $request)
    // {
    //     // ✅ Validate request
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     // 🔍 Find user
    //     $user = User::where('email', $request->email)->first();

    //     // ❌ Invalid credentials
    //     if (!$user || !Hash::check($request->password, $user->password)) {
    //         return response()->json(['message' => 'Invalid credentials'], 401);
    //     }

    //     // ✅ Create token
    //     $token = $user->createToken('authToken')->plainTextToken;

    //     // ✅ Return user & token
    //     return response()->json([
    //         'message' => 'Login successful',
    //         'user' => $user,
    //         'token' => $token,
    //     ]);
    // }


//     public function login(Request $request)
// {
//        Log::info('Request has token:', [
//     '_token' => $request->_token,
//     'headers' => $request->headers->all()
// ]);

//     $request->validate([
//         'email' => 'required|email',
//         'password' => 'required',
//     ]);

//     if (!Auth::attempt($request->only('email', 'password'), true)) {
//         return response()->json(['message' => 'Invalid credentials'], 401);
//     }

 
//     return response()->json([
//         'message' => 'Login successful',
//         'user' => Auth::user(),
//     ]);
// }































    public function logout(Request $request)
    {
        // Revoke current token
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out successfully']);
    }
}
