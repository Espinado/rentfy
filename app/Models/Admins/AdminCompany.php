<?php

namespace App\Models\Admins;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminCompany extends Model
{
    use HasFactory;
    protected $guard = 'admin';

    protected $fillable = [


        'owner_company_name',
        'owner_company_reg_number',
        'owner_company_vat_number',
        'owner_company_legal_country',
        'owner_company_legal_city',
        'owner_company_legal_street',
        'owner_company_legal_house',
        'owner_company_legal_room',
        'owner_company_legal_postcode',
        'owner_company_phys_country',
        'owner_company_phys_city',
        'owner_company_phys_street',
        'owner_company_phys_house',
        'owner_company_phys_room',
        'owner_company_phys_postcode',
        'owner_company_logo',
    ];
}
