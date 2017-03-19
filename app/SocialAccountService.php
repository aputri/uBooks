<?php
/**
 * Created by PhpStorm.
 * User: Cooper Howling
 * Date: 3/16/2017
 * Time: 4:28 PM
 */
namespace App;

use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = SocialAccount::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook',
                'email' => $providerUser->getEmail(),
                'name' => $providerUser->getName(),
            ]);

            $user = SocialAccount::whereEmail($providerUser->getEmail())->first();

            if (!$user) {

                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                ]);
            }

            $account->user()->associate($user);

            $account->save();

            return $user;

        }

    }
}