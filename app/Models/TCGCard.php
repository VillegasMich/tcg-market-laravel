<?php

// AUTHOR: Manuel Villegas Michel

namespace App\Models;

use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

class TCGCard extends Model
{
    use HasFactory;

    /**
     * $this->attributes['id'] - int - Product primary key
     * $this->attributes['name'] - string - Product name
     * $this->attributes['description'] - string - Product description
     * $this->attributes['franchise'] - string - Product franchise
     * $this->attributes['price'] - int - Product price
     * $this->attributes['PSAgrade'] - string - Product PSAgrade
     * $this->attributes['image'] - string - Card image
     * $this->attributes['launchDate'] - date - Product launchDate
     * $this->attributes['rarity'] - string - Product rarity
     * $this->attributes['pullRate'] - float - Product pullRate
     * $this->attributes['language'] - string - Product language
     * $this->attributes['stock'] - int - Product stock
     * $this->attributes['created_at'] - timestamp - date of creation
     * $this->attributes['updated_at'] - timestamp - date of last update
     * $this->attributes['tcgPacks'] - TCGPack[] - Product tcgPacks
     * $this->attributes['wishList'] - WishList - WishList primary key
     * $this->attributes['Items'] - Item[] - Items related to this TCGCard
     */
    protected $fillable = [
        'name',
        'description',
        'franchise',
        'price',
        'PSAgrade',
        'launchDate',
        'rarity',
        'pullRate',
        'language',
        'stock',
    ];

    public function tcgPacks(): BelongsToMany
    {
        return $this->belongsToMany(TCGPack::class);
    }

    public function wishList(): BelongsToMany
    {
        return $this->belongsToMany(WishList::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getDescription(): string
    {
        return $this->attributes['description'];
    }

    public function setDescription(string $description): void
    {
        $this->attributes['description'] = $description;
    }

    public function getFranchise(): string
    {
        return $this->attributes['franchise'];
    }

    public function setFranchise(string $franchise): void
    {
        $this->attributes['franchise'] = $franchise;
    }

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function setPrice(int $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function getPSAgrade(): string
    {
        return $this->attributes['PSAgrade'];
    }

    public function setPSAgrade(string $PSAgrade): void
    {
        $this->attributes['PSAgrade'] = $PSAgrade;
    }

    public function getImage(): string
    {
        return $this->attributes['image'];
    }

    public function setImage(string $image): void
    {
        $this->attributes['image'] = $image;
    }

    public function getLaunchDate(): string
    {
        return $this->attributes['launchDate'];
    }

    public function setLaunchDate(string $launchDate): void
    {
        $this->attributes['launchDate'] = $launchDate;
    }

    public function getRarity(): string
    {
        return $this->attributes['rarity'];
    }

    public function setRarity(string $rarity): void
    {
        $this->attributes['rarity'] = $rarity;
    }

    public function getPullRate(): float
    {
        return $this->attributes['pullRate'];
    }

    public function setPullRate(float $pullRate): void
    {
        $this->attributes['pullRate'] = $pullRate;
    }

    public function getLanguage(): string
    {
        return $this->attributes['language'];
    }

    public function setLanguage(string $language): void
    {
        $this->attributes['language'] = $language;
    }

    public function getStock(): int
    {
        return $this->attributes['stock'];
    }

    public function setStock(int $stock): void
    {
        $this->attributes['stock'] = $stock;
    }

    public function getTcgPacks(): Collection
    {
        return $this->tcgPacks;
    }

    public function setTcgPacks(array $tcgPacks): void
    {
        $this->tcgPacks()->sync($tcgPacks);
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function getWishList(): WishList
    {
        return $this->wishList;
    }

    public function setWishList(WishList $wishList): void
    {
        $this->wishList = $wishList;
    }

    public function getItems(): Collection
    {
        return $this->items;
    }

    public function setItems(Collection $items): void
    {
        $this->items = $items;
    }

    public static function filterAndSort(Request $request): Builder
    {
        $query = self::query();

        if ($request->has('keyword') && ! empty($request->keyword)) {
            $query->where('name', 'like', '%'.$request->keyword.'%');
        }

        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'price_asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc');
                    break;
                case 'psa_desc':
                    $query->orderByRaw("CASE
                        WHEN PSAgrade = 'undefined' THEN 0
                        ELSE CAST(PSAgrade AS UNSIGNED)
                        END DESC");
                    break;
                case 'psa_asc':
                    $query->orderByRaw("CASE
                        WHEN PSAgrade = 'undefined' THEN 0
                        ELSE CAST(PSAgrade AS UNSIGNED)
                        END ASC");
                    break;
                case 'newest':
                    $query->orderBy('created_at', 'desc');
                    break;
                case 'oldest':
                    $query->orderBy('created_at', 'asc');
                    break;
            }
        }

        return $query;
    }
}
