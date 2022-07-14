<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Support\Cropper;

class Product extends Model
{
    use HasFactory;

    use TenantTrait;

    protected $fillable = [
      'title',
      'flag',
      'image',
      'price',
      'description'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function categoriesAvailable($filter = null)
    {
        $categories = Category::whereNotIn('categories.id' ,function ($query){
            $query->select('category_product.category_id')
                ->from('category_product')
                ->whereRaw("category_product.product_id={$this->id}");
        })->where(function ($queryFilter) use ($filter){
            if($filter)
                $queryFilter->where('categories.name', 'LIKE', "%{$filter}%");
        });

        return $categories->get();

    }

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = (!empty($value) ? floatval($this->convertStringToDouble($value)) : null);
    }

    public function getPriceAttribute($value)
    {
        if (empty($value)) {
            return number_format($value, 2, ',', '.');
        }

        return number_format($value, 2, ',', '.');
    }

    private function convertStringToDouble($param)
    {
        if(empty($param)){
            return null;
        }

        return str_replace(',', '.', str_replace('.', '', $param));
    }

    private function clearField(?string $param)
    {
        if(empty($param)){
            return null;
        }

        return str_replace(['.', '-', '/', '(', ')', ' '], '', $param);
    }

    public function getUrlImageAttribute()
    {
        if (!empty($this->image)) {
            return Storage::url(Cropper::thumb($this->image, 500, 500));
        }

        return asset('backend/assets/images/layouts/no-image.png');
    }
}
