<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'repoUrl', 'startingDate'];

    public static function generateSlug($name)
    {
        return Str::slug($name, '-');
    }

    public static function generateRepoUrl($slug) {
        $repoUrl = 'https://github.com/LucaRanieri96/' . $slug;
        return $repoUrl;
    }
}
