<?php

/*
Controller for managing seller companies and users
*/

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Admins\SellerCompanyProfile;
use Illuminate\Http\Request;
use App\Models\Admins\SellerCompany;
use App\Models\Admins\SellerUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use App\Models\Admins\InviteSeller;
use App\Mail\InviteCreated;
use App\Models\Admins\SellerCompanyUser;
use Illuminate\Support\Facades\Mail;
use App\Helpers\Invite;
use Auth;


use function App\Helpers\invite;

class SellerController extends Controller
{

    public function SellerCompanies()
    {
        /*
         Getting list of seller companies
         App/Models/Admins/SellerCompany
       */

        $sellerCompanies = SellerCompany::all();

        return view('admin.sellers.index', compact('sellerCompanies'));
    }

    public function SellerRegister()
    {

        return view('admin.sellers.add_seller_company_form');
    }

    public function AdminRegisterCreate(Request $request)
    {
        /*
  Creating new seller company
*/

        $validateData = $request->validate([
            'seller_company_legal_country'                   => 'required',
            'seller_company_legal_city'                      => 'required',
            'seller_company_legal_street'                    => 'required|max:20',
            'seller_company_legal_house'                     => 'required|max:20',
            'seller_company_legal_room'                      => 'required',
            'seller_company_legal_postcode'                  => 'required',
            'seller_company_phys_country'                    => 'required',
            'seller_company_phys_city'                       => 'required',
            'seller_company_phys_street'                     => 'required',
            'seller_company_phys_house'                      => 'required',
            'seller_company_phys_room'                       => 'required',
            'seller_company_phys_postcode'                   => 'required',
            'seller_company_name'                            => 'required',
            'seller_company_status'                          => 'required',
            'seller_company_reg_number'                      => 'required|unique:seller_companies',
            'seller_company_vat_number'                      => 'required|unique:seller_companies',
            'seller_admin_name'                              => 'required',
            'seller_admin_surname'                           => 'required',
            'seller_admin_email'                             => 'required|unique:seller_companies',
        ]);
        $sellerCompany = new SellerCompany;

        $sellerCompany->seller_company_name           = $request->seller_company_name;
        $sellerCompany->seller_company_legal_status   = $request->seller_company_status;
        $sellerCompany->seller_company_reg_number     = $request->seller_company_reg_number;
        $sellerCompany->seller_company_vat_number     = $request->seller_company_vat_number;
        $sellerCompany->seller_admin_name             = $request->seller_admin_name;
        $sellerCompany->seller_admin_surname          = $request->seller_admin_surname;
        $sellerCompany->seller_admin_email            = $request->seller_admin_email;
        $sellerCompany->save();
        $sellerCompany->seller_company_profile()->create([

            'seller_company_legal_country'             => $request->seller_company_legal_country,
            'seller_company_legal_city'                => $request->seller_company_legal_city,
            'seller_company_legal_street'              => $request->seller_company_legal_street,
            'seller_company_legal_house'               => $request->seller_company_legal_house,
            'seller_company_legal_room'                => $request->seller_company_legal_room,
            'seller_company_legal_postcode'            => $request->seller_company_legal_postcode,
            'seller_company_phys_country'              => $request->seller_company_phys_country,
            'seller_company_phys_city'                 => $request->seller_company_phys_city,
            'seller_company_phys_street'               => $request->seller_company_phys_street,
            'seller_company_phys_house'                => $request->seller_company_phys_house,
            'seller_company_phys_room'                 => $request->seller_company_phys_room,
            'seller_company_phys_postcode'             => $request->seller_company_phys_postcode,
        ]);
        /*
        Creating responsible person for company
        */
        $sellerCompany->seller_company_users()->create([

            'name'                => $request->seller_admin_name,
            'surname'             => $request->seller_admin_surname,
            'email'               => $request->seller_admin_email,
            'seller_company_id'   => $sellerCompany->id,
            'password'            =>   Hash::make('password'),
            'created_at'          =>   Carbon::now()
        ]);

        return redirect()->route('admin.sellers.companies')->with('success', 'Done');
    }

    public function SellerView($id)
    {
        /*
        View company profile
        */
        $seller = SellerCompany::find($id);
        return view('admin.sellers.seller_company_view', compact('seller'));
    }

    public function SellerEmployeeStore(Request $request)
    {

        do {
            $token = Invite::generateToken();  //calling helper Invite to get token
        } while (InviteSeller::where('token', $token)->first());
        /*
         We are using Helper App/Helpers/Invite
        */

        $inviteSeller = InviteSeller::create([
            'email'                  =>   $request->email,
            'token'                  =>   $token,
            'inviter_id'             =>   Auth::guard('admin')->user()->id,
            'invitee_company_id'     =>   $request->company_id,
            'invitee_user_id'        =>   SellerCompanyUser::insertGetId([
                'name'               =>   $request->name,
                'email'              =>   $request->email,
                'seller_company_id'  =>   $request->company_id,
                'status'             =>   true,
                'created_at'         =>   Carbon::now()
            ]),
            'created_at'             => Carbon::now(),
        ]);
        /*
        Creating invitationg and sending by email App/Mail/InviteCreated, view emails/invite.blade
        */
        Mail::to($request->get('email'))->send(new InviteCreated($inviteSeller));
        return back()->with('success', 'Recorded');
    }
}
