<?php

// AUTHOR: Manuel Villegas Michel

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\Request;

class TCGPack extends Model
{
    use HasFactory;

    /**
     * $this->attributes['id'] - int - Product primary key
     * $this->attributes['name'] - string - Collection name
     * $this->attributes['image'] - string - Collection image
     * $this->attributes['franchise'] - string - Franchise of the pack
     * $this->attributes['created_at'] - timestamp - date of creation
     * $this->attributes['updated_at'] - timestamp - date of last update
     * $this->tcgCards - TCGCard[] - Collection of cards
     */
    public function tcgCards(): BelongsToMany
    {
        return $this->belongsToMany(TCGCard::class);
    }

    protected $fillable = [
        'name',
        'image',
        'franchise',
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

    public function getFranchise(): string
    {
        return $this->attributes['franchise'];
    }

    public function setFranchise(string $franchise): void
    {
        $this->attributes['franchise'] = $franchise;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public static function filterAndSort(Request $request): Builder
    {
        $query = TCGPack::query();
        if ($request->has('keyword') && ! empty($request->keyword)) {
            $query->where('name', 'like', '%'.$request->keyword.'%');
        }
        if ($request->has('sort')) {
            if ($request->sort === 'price_asc') {
                $query->orderBy('price', 'asc');
            } elseif ($request->sort === 'price_desc') {
                $query->orderBy('price', 'desc');
            } elseif ($request->sort === 'newest') {
                $query->orderBy('created_at', 'desc');
            } elseif ($request->sort === 'oldest') {
                $query->orderBy('created_at', 'asc');
            }
        }

        return $query;
    }
}
