<?php

namespace App\Models\Admins;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use App\Models\Admin;
use App\Models\Admins\SellerCompany;
use App\Models\Admins\SellerCompanUsery;

class InviteSeller extends Model
{
    use HasFactory;
    protected $table = 'invite_sellers';
    protected $fillable = ['email', 'token', 'company_id', 'inviter_id', 'invitee_user_id', 'claimed', 'invitee_company_id'];

    public function seller_company() {

        return $this->belongsTo(SellerCompany::class, 'invitee_company_id', 'id');
     }

     public function invite_seller() {

        return $this->belongsTo(SellerCompanyUser::class, 'invitee_user_id', 'id');
     }
}
