<?php

// Modified by Miguel Vasquez Bojanini

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use PhpParser\Node\Expr\FuncCall;

class User extends Authenticatable
{

    /**
     * USER ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id).
     * $this->attributes['name'] - string - contains the name of the user.
     * $this->attributes['email'] - string - contains the email registered by the user.
     * $this->attributes['email_verified_at'] - timestamp - Represents when the user was verified.
     * $this->attributes['password'] - string - contains the encrypted password set by the user.
     * $this->attributes['remember_token'] - string - A remember token used for sessions.
     * $this->attributes['updatedAt'] - Date - Represents the date the database entry was updated.
     * $this->attributes['customer'] - Customer - The customer this order is related to.
     * $this->orders - Order[] - Orders related to this Order.
     */

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     *  User's Orders.
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * User's wishList.
     */
    public function wishlist(): HasOne
    {
        return $this->hasOne(WishList::class);
    }

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
        ];
    }
}
