<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;

class TCGCard extends Model
{
    use HasFactory;

    /**
     * $this->atributes['id'] - int - Product primary key
     * $this->atributes['name'] - string - Product name
     * $this->atributes['description'] - string - Product description
     * $this->atributes['franchise'] - string('Pokemon', 'Yu-Gi-Oh!', 'Magic: The Gathering') - Product franchise
     * $this->atributes['collection'] - string - Product collection
     * $this->atributes['price'] - int - Product price
     * $this->atributes['PSAgrade'] - string - Product PSAgrade
     * $this->atributes['image'] - string - Card image
     * $this->atributes['launchDate'] - date - Product launchDate
     * $this->atributes['rarity'] - string - Product rarity
     * $this->atributes['pullRate'] - float - Product pullRate
     * $this->atributes['language'] - string - Product language
     * $this->atributes['stock'] - int - Product stock
     */
    protected $fillable = [
        'name',
        'description',
        'franchise',
        'collection',
        'price',
        'PSAgrade',
        'image',
        'launchDate',
        'rarity',
        'pullRate',
        'language',
        'stock',
    ];

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

    public function getCollection(): string
    {
        return $this->attributes['collection'];
    }

    public function setCollection(string $collection): void
    {
        $this->attributes['collection'] = $collection;
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

    public function getLaunchDate(): Date
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
}
