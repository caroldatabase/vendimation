<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as BaseEncrypter;

class EncryptCookies extends BaseEncrypter
{
    /**
     * The names of the cookies that should not be encrypted.
     *
     * @var array
<<<<<<< HEAD
     */
=======
     */ 
>>>>>>> 749be5ae7e09c2da741080e084a373208e43fcf9
    protected $except = [
        //
    ];
}
