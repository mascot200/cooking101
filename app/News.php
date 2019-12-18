<?php

namespace App;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public function user() {
        return $this->belongsTo("App\User");
    }
public function path() {
    return url("/news/{$this->id}-" . Str::slug($this->title));
}
}
