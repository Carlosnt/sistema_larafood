<?php

namespace App\Models;

use App\Tenant\Observers\TenantObserver;
use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    use TenantTrait;

    protected $fillable = [
        'name',
        'url',
        'description'
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function setSlug()
    {
        if(!empty($this->name)){
            $this->attributes['url'] = Str::slug($this->name) . '-' . $this->id;
            $this->save();
        }
    }

}
