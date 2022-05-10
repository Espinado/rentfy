<?php

namespace App\Models\Admins;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerCompanyProfile extends Model
{
    use HasFactory;
    protected $guard = 'admin';
    protected $fillable=[

'seller_company_legal_country',
'seller_company_legal_city',
'seller_company_legal_street',
'seller_company_legal_house',
'seller_company_legal_room',
'seller_company_legal_postcode',
'seller_company_phys_country',
'seller_company_phys_city',
'seller_company_phys_street',
'seller_company_phys_house',
'seller_company_phys_room',
'seller_company_phys_postcode',
'seller_company_admin_person',
'seller_company_logo',
    ];


    public function seller_company() {

        return $this->belongsTo(SellerCompany::class);
    }
}
