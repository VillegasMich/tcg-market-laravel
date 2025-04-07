<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /**
     * USER ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id).
     * $this->attributes['name'] - string - contains the name of the user.
     * $this->attributes['address'] - string - contains the address of the user.
     * $this->attributes['email'] - string - contains the email registered by the user.
     * $this->attributes['email_verified_at'] - timestamp - Represents when the user was verified.
     * $this->attributes['password'] - string - contains the encrypted password set by the user.
     * $this->attributes['role'] - string - Role of the user.
     * $this->attributes['remember_token'] - string - A remember token used for sessions.
     * $this->attributes['updated_at'] - Date - Represents the date the database entry was updated.
     * $this->attributes['created_at'] - Date - Represents the date the database entry was created.
     * $this->orders - Order[] - Orders related to this user.
     * $this->wishlist - WishList - WishList related to this User.
     */

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'role',
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

    public function getId(): string
    {
        return $this->attributes['id'];
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function getEmail(): string
    {
        return $this->attributes['email'];
    }

    public function getAddress(): string
    {
        return $this->attributes['address'];
    }

    public function getRole(): string
    {
        return $this->attributes['role'];
    }

    public function getBalance(): string
    {
        return $this->attributes['balance'];
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function getWishList(): WishList
    {
        return $this->wishlist;
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function setEmail(string $email): void
    {
        $this->attributes['email'] = $email;
    }

    public function setAddress(string $address): void
    {
        $this->attributes['address'] = $address;
    }

    public function setRole(string $role): void
    {
        $this->attributes['role'] = $role;
    }

    public function setBalance(string $balance): void
    {
        $this->attributes['balance'] = $balance;
    }

    public function wishlist(): HasOne
    {
        return $this->hasOne(WishList::class);
    }

    public function setWishlist(WishList $wishlist): void
    {
        $this->wishlist()->save($wishlist);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function addOrder(Order $order): void
    {
        $this->orders->add($order);
    }
}
