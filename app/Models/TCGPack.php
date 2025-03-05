<?php

// AUTHOR: Manuel Villegas Michel

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TCGPack extends Model
{
    use HasFactory;

    /**
     * $this->attributes['id'] - int - Product primary key
     * $this->attributes['name'] - string - Collection name
     * $this->attributes['image'] - string - Collection image
     * $this->attributes['tcgCards'] - array - Collection of cards
     * $this->attributes['created_at'] - timestamp - date of creation
     * $this->attributes['updated_at'] - timestamp - date of last update
     */
    public function tcgCards(): BelongsToMany
    {
        return $this->belongsToMany(TCGCard::class);
    }

    protected $fillable = [
        'name',
        'image',
    ];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function getImage(): string
    {
        return $this->attributes['image'];
    }

    public function setName(string $collection): void
    {
        $this->attributes['name'] = $collection;
    }

    public function setImage(string $image): void
    {
        $this->attributes['image'] = $image;
    }

    public function getTcgCards(): Collection
    {
        return $this->tcgCards;
    }

    public function setTcgCards(array $tcgCards): void
    {
        $this->tcgCards()->sync($tcgCards);
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }
}
