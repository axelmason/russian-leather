<?php

namespace App\Services;

use App\Models\UserVerify;
use App\Repositories\UserVerifyRepository;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserVerifyService extends BaseService
{
    public $repository;

    public function __construct(UserVerifyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function sendVerifyEmail($user)
    {
        $token = Str::random(64);

        UserVerify::create([
            'user_id' => $user->id,
            'token' => $token
        ]);

        $sent = Mail::send('email.verificationEmail', compact('token'), function ($message) use ($user) {
            $message->to($user->email);
            $message->subject('Подтверждение email адреса на сайте Russian Leather.');
        });
    }

    public function verifyUser($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();
        $message = "Sorry your email cannot be identified.";

        if (!is_null($verifyUser)) {
            $user = $verifyUser->user;
            if (!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->email_verified_at = date('c');
                $verifyUser->user->save();

                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }

        return $message;
    }
}
