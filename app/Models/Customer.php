<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model implements AuthenticatableContract
{
    use HasFactory,Authenticatable;
    protected $fillable = [
        'first_name',
        'last_name',
        'email_id',
        'contact_no',
        'password',
        'users_password',
    ];

    public function getAuthPassword()    {
        return $this->password;
   }
   public function username(){
        return 'email';
    }

public function getFullNameAttribute()
{
    return $this->first_name . " " . $this->last_name;
}
}
