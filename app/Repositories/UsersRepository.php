<?php

namespace InterComm\Repositories;

use InterComm\User;

class UsersRepository
{
    // ------------------------------------------------------------------------
    public function __construct()
    {
    }

    // ------------------------------------------------------------------------
    public function findByGoogleUserOrCreate($google_user, $refresh_token)    
    {
            $user = User::findFromGoogleUser($google_user)->first();
            return $user ?: User::create(['firstname'    =>$google_user->givenName, 
                                          'lastname'     =>$google_user->familyName, 
                                          'username'     =>explode("@", $google_user->email)[0], 
                                          'email'        =>$google_user->email, 
                                          'google_id'    =>$google_user->id,
                                          'google_token' =>$refresh_token]);
    }
}
