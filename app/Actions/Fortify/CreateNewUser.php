<?php

namespace App\Actions\Fortify;

use App\Jobs\virtualaccountjob;
use App\Models\transaction;
use App\Models\User;
use App\Models\wallet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'username' => ['required', 'string', 'min:6', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $wallet= wallet::create([
            'username' => $input['username'],
            'pre_balance'=>0,
            'balance' => 0,
        ]);

        $user = User::create([
            'username' => $input['username'],
            'name' => $input['name'],
            'address' => "my state",
            'dob' => "1995-03-13",
            'gender' => "Male",
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
        $transaction=transaction::create([
            'username'=>$input['username'],
            'activities'=>'Account Created Successfully',
        ]);
        VirtualAccountJob::dispatch($user);

       return $user;

    }

}
