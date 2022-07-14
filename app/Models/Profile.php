<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function plans()
    {
        return $this->belongsToMany(Plan::class);
    }


    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function permissionsAvailable($filter = null)
    {
        $permissions = Permission::whereNotIn('id' ,function ($query){
            $query->select('permission_profile.permission_id')
                  ->from('permission_profile')
                  ->whereRaw("permission_profile.profile_id={$this->id}");
        })->where(function ($queryFilter) use ($filter){
            if($filter)
            $queryFilter->where('permissions.name', 'LIKE', "%{$filter}%");
        });

        return $permissions->get();

    }
}
