<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use HasFactory;

    /**
     * Item ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['quantity'] - int - contains the card quantity
     * $this->attributes['subtotal'] - int - contains the item subtotal
     * $this->attributes['created_at'] - timestamp - date of creation
     * $this->attributes['updated_at'] - timestamp - date of last update
     * $this->TCGCard - TCGCard - associated TCGCard
     * $this->order - Order -  associated Order
     */
    protected $fillable = ['quantity', 'subtotal'];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function TCGCard(): BelongsTo
    {
        return $this->belongsTo(TCGCard::class);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getQuantity(): int
    {
        return $this->attributes['quantity'];
    }

    public function setQuantity(int $quantity): void
    {
        $this->attributes['quantity'] = $quantity;
    }

    public function getSubtotal(): int
    {
        return $this->attributes['subtotal'];
    }

    public function setSubtotal(int $subtotal): void
    {
        $this->attributes['subtotal'] = $subtotal;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function getTCGCard(): TCGCard
    {
        return $this->TCGCard;
    }

    public function getOrder(): Order
    {
        return $this->order;
    }

    public function setOrder(Order $order): void
    {
        $this->order = $order;
    }

    public function setTCGCard(TCGCard $TCGCard): void
    {
        $this->TCGCard = $TCGCard;
    }
}
