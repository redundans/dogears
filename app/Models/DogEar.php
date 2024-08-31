<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class DogEar extends Model
{
    use HasFactory;
    use Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'url',
        'name',
        'description',
        'headings',
        'paragraphs',
    ];

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function collections() {
        return $this->belongsToMany(Collection::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function toSearchableArray()
    {
        return [
            'url' => '',
            'name' => '',
            'description' => '',
            'headings' => '',
            'paragraphs' => '',
        ];
    }
}
