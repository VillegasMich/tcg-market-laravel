<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TCGPack extends Model
{
    use HasFactory;

    /**
    * $this->atributes['id'] - int - Product primary key
    * $this->atributes['name'] - string - Collection name
    * $this->atributes['image'] - string - Collection image
    */

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
}
