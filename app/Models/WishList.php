<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class WishList extends Model
{
    use HasFactory;

    /**
     * WISHLIST ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['name'] - string - contains the wishList name
     * $this->attributes['created_at'] - timestamp - date of creation
     * $this->attributes['updated_at'] - timestamp - date of last update
     * this->TCGCards - TCGCard[] - associated cards
     * this->user - User - associated user
     */
    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function getTCGCards(): Collection
    {
        return $this->TCGCards;
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function TCGCards(): BelongsToMany
    {
        return $this->belongsToMany(TCGCard::class);
    }

    public function setTCGCards(Collection $TCGCards): void
    {
        $this->TCGCards = $TCGCards;
    }

    public function addTCGCard(TCGCard $TCGCard): void
    {
        $this->TCGCards->add($TCGCard);
    }

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }
}
