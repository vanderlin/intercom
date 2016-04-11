<?php

namespace InterComm;

use Illuminate\Database\Eloquent\Model;
use InterComm\AuthUser;
use DB;

class User extends AuthUser
{
    protected $fillable = ['email', 'password', 'firstname', 'lastname', 'dob', 'data'];

}
