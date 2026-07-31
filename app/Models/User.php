<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Enums\UserRole;

#[Fillable(['name', 'email', 'password' , 'role'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => UserRole::class,
        ];

    }

        function isAdmin()
        {
            return $this->role === UserRole::ADMIN ;
        }

        function isVendor()
        {
            return $this->role === UserRole::VENDOR ;
        }

        function isCustomer()
        {
            return $this->role === UserRole::CUSTOMER ;
        }


        public function store()
        {
            return $this->hasOne(Store::class , 'vendor_id');
        }

        public function cart()
        {
            return $this->hasOne(Cart::class , 'customer_id');
        }

        public function orders()
        {
            return $this->hasMany(Order::class , 'customer_id');
        }
}
