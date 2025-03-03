<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Encryption\Encrypter;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): Response
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'date_of_birth' => ['nullable', 'date'],
            'place_of_birth' => ['nullable', 'string', 'max:255'],
            'gender' => ['nullable', 'string', 'max:255'],
            'phone_number' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'postal_code' => ['nullable', 'string', 'max:255'],
            'province' => ['nullable', 'string', 'max:255'],
            'country' => ['nullable', 'string', 'max:255'],
            'avatar' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'citizenship' => ['nullable', 'string', 'max:255'],
            'pp_number' => ['nullable', 'string', 'max:255'],
            'pp_exp_date' => ['nullable', 'date'],
            'pp_origin' => ['nullable', 'string', 'max:255'],
            'govId' => ['nullable', 'string', 'max:255'],
            'govId_type' => ['nullable', 'string', 'max:255'],
            'govId_exp_date' => ['nullable', 'date'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $userData = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'province' => $request->province,
            'country' => $request->country,
            'avatar' => $request->avatar,
            'email' => $request->email,
            'citizenship' => $request->citizenship,
            'pp_number' => encrypt($request->pp_number),
            'pp_exp_date' => $request->pp_exp_date,
            'pp_origin' => $request->pp_origin,
            'govId' => encrypt($request->govId),
            'govId_type' => $request->govId_type,
            'govId_exp_date' => $request->govId_exp_date,
            'password' => Hash::make($request->input('password')),
        ];

        $user = User::create($userData);

        if (!$user) {
            return response()->json(['message' => 'Failed to create user'], 500);
        }

        event(new Registered($user));

        Auth::login($user);

        return response()->noContent();
    }
}
