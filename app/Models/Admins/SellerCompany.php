<?php

namespace App\Models\Admins;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerCompany extends Model
{
    use HasFactory;
    protected $guard = 'admin';

    protected $fillable = [

        'seller_company_status',
        'seller_company_name',
        'seller_company_reg_number',
        'seller_company_vat_number',
        'seller_admin_name',
        'seller_admin_surname',
        'seller_admin_email',
        'tax_payer',
        'is_active',
        'is_banned'
    ];

    public function seller_company_profile() {

       return $this->hasOne(SellerCompanyProfile::class);
    }
    public function seller_company_users() {

        return $this->hasMany(SellerCompanyUser::class);
     }

     public function seller_company_invitees() {

        return $this->hasMany(InviteSeller::class);
     }
}


