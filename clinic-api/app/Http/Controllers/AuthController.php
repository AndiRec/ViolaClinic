<?php
// app/Http/Controllers/AuthController.php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $req)
    {
        $data = $req->validate([
            'name' => ['required','string','max:120'],
            'email' => ['required','email','unique:users,email'],
            'phone' => ['nullable','string','max:30'],
            'preferred_language' => ['nullable','in:mk,sq,en'],
            'password' => ['required', Password::min(8)],
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'preferred_language' => $data['preferred_language'] ?? 'en',
            'password' => Hash::make($data['password']),
        ]);
        $user->assignRole('Client');

        $token = $user->createToken('mobile')->plainTextToken;
        return response()->json(['token' => $token, 'user' => $user], 201);
    }

    public function login(Request $req)
    {
        $data = $req->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $data['email'])->first();
        if (!$user || !Hash::check($data['password'], $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 422);
        }

        $token = $user->createToken('mobile')->plainTextToken;
        return response()->json(['token' => $token, 'user' => $user]);
    }

    public function logout(Request $req)
    {
        $req->user()->currentAccessToken()?->delete();
        return response()->json(['message' => 'Logged out']);
    }
}
