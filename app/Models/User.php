<?php

namespace App\Models;

use App\Models\Traits\UserAclTrait;
use App\Support\Cropper;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\auth;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, UserAclTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'tenant_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profiles()
    {
        return $this->hasMany(Profile::class);
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function rolesAvailable($filter = null)
    {
        $roles = Role::whereNotIn('id' ,function ($query){
            $query->select('role_user.role_id')
                ->from('role_user')
                ->whereRaw("role_user.user_id={$this->id}");
        })->where(function ($queryFilter) use ($filter){
            if($filter)
                $queryFilter->where('roles.name', 'LIKE', "%{$filter}%");
        });

        return $roles->get();
    }

    public function setPasswordAttribute($value)
    {
        if (empty($value)) {
            unset($this->attributes['password']);
            return;
        }

        $this->attributes['password'] = bcrypt($value);
    }

    public function getUrlImageAttribute()
    {
        if (!empty($this->image)) {
            return Storage::url(Cropper::thumb($this->image, 500, 500));
        }

        return asset('backend/assets/images/layouts/no-image.png');
    }

    /**
     * Scope a query to only include popular users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTenantUser($query)
    {
        return $query->where('tenant_id', auth()->user()->tenant_id)->get();
    }
}
