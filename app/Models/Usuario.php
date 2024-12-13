<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Usuario extends Model 
{
    use HasFactory;


    protected $table = 'users';

    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'admin'
    ];

    function getAuthIdentifierName() {
        return 'id';
    }
    function getAuthIdentifier(){
        return $this->id;
    }
    function getAuthPassword() {
        return $this->password;
    }

    function getRememberToken() {

    }
    function setRememberToken($value) {

    }
    function getRememberTokenName() {

    }
}
