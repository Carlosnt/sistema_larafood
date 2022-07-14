<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url',
        'price',
        'description'
    ];

    public function profilesAvailable($filter = null)
    {
        $profiles = Profile::whereNotIn('profiles.id' ,function ($query){
            $query->select('plan_profile.profile_id')
                ->from('plan_profile')
                ->whereRaw("plan_profile.plan_id={$this->id}");
        })->where(function ($queryFilter) use ($filter){
            if($filter)
                $queryFilter->where('profiles.name', 'LIKE', "%{$filter}%");
        });

        return $profiles->get();

    }

    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }

    public function details()
    {
        return $this->hasMany(DetailPlan::class);
    }

    public function tenants()
    {
        return $this->hasMany(Tenant::class);
    }

    public function search(string $filter = null)
    {
        $results = $this->where('name', 'LIKE', "%($filter)%")
            ->orWhere('description', 'LIKE', "%($filter)%")
            ->paginate();
        return $results;
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


    public function setSlug()
    {
        if(!empty($this->name)){
            $this->attributes['url'] = Str::slug($this->name) . '-' . $this->id;
            $this->save();
        }
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

}
