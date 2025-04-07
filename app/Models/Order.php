<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    /**
     * ORDER ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id).
     * $this->attributes['total'] - int - contains the total amount of money for the order.
     * $this->attributes['status'] - string - Represents the status of the order.
     * $this->attributes['paymentMethod'] - string - contains the payment method the user selected for this order.
     * $this->attributes['created_at'] - Date - Represents the date the database entry was created.
     * $this->attributes['updated_at'] - Date - Represents the date the database entry was updated.
     * $this->user - User - The user this order is related to.
     * $this->items - Item[] - Items related to this Order.
     */
    protected $fillable = [
        'total',
        'paymentMethod',
    ];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getTotal(): int
    {
        return $this->attributes['total'];
    }

    public function setTotal(int $value): void
    {
        $this->attributes['total'] = $value;
    }

    public function getStatus(): string
    {
        return $this->attributes['status'];
    }

    public function setStatus(string $value): void
    {
        $this->attributes['status'] = $value;
    }

    public function getPaymentMethod(): string
    {
        return $this->attributes['paymentMethod'];
    }

    public function setPaymentMethod(string $value): void
    {
        $this->attributes['paymentMethod'] = $value;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): void
    {
        $this->user()->associate($user);
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function getItems(): Collection
    {
        return $this->items;
    }

    public function setItems(Collection $items): void
    {
        $this->items = $items;
    }
}
