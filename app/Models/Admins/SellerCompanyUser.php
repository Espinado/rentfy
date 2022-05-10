<?php

namespace App\Models\Admins;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Admins\InviteSeller;
use App\Models\Admins\SellerCompany;
use Spatie\Permission\Traits\HasRoles;

class SellerCompanyUser extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guard='admin';
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'seller_company_id'
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

    public function seller_company() {

        return $this->belongsTo(SellerCompany::class);
    }

    public function seller_invite() {

        return $this->hasMany(InviteSeller::class);
    }
}
