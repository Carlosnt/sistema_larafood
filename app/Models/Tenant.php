<?php

namespace App\Models;

use App\Support\Cropper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan_id',
        'document',
        'company',
        'email',
        'url',
        'logo',
        'active',
        'subscription',
        'expired_at',
        'subscription_id',
        'subscription_active',
        'subscription_suspended',
    ];

    public function users()
    {
        return $this->hasMany(User::class); // um para muitos
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class); // um para muitos
    }

    public function getUrlLogoAttribute()
    {
        if (!empty($this->logo)) {
            return Storage::url(Cropper::thumb($this->logo, 500, 500));
        }

        return asset('backend/assets/images/layouts/no-image.png');
    }

    public function getActiveAttribute()
    {
        if($this->attributes['active'] == "Y"){
            return "Sim";
        }else{
            return "Não";
        }
    }
}
