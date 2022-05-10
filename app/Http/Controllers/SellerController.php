<?php

namespace App\Http\Controllers;

use App\Models\Admins\InviteSeller;
use App\Models\Admins\SellerCompanyUser;
use Illuminate\Http\Request;
use Auth;
use App\Models\Seller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;



class SellerController extends Controller
{
    public function __construct()
    {
        $this->middleware('seller', ['except' => ['Index', 'Login', 'ConfirmRegister', 'SellerConfirmed', 'LoginAfterConfirm']]);
    }

    public function Index()
    {
        return view('seller.auth.login');
    }

    public function Dashboard()
    {
        return view('seller.index');
    }

    public function Login(Request $request)
    {
        $check = $request->all();
        if (Auth::guard('seller')->attempt([
            'email'    => $check['email'],
            'password' => $check['password']
        ])) {
            return redirect()->route('seller.dashboard')->with('success', 'Logged in');
        } else {
            return back()->with('error', 'Login failed');
        }
    }

    public function SellerLogout()
    {
        Auth::guard('seller')->logout();
        return redirect()->route('seller.login_form')->with('error', 'Logged Out');
    }

    public function ConfirmRegister($token, $invitee_id)
    {
        $Invitee = SellerCompanyUser::where('id', $invitee_id)->with('seller_company')->first();
        return view('seller.auth.set_pass', compact('Invitee', 'token'));
    }

    public function SellerConfirmed(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'password' => 'required| min:4| max:20 |confirmed',
            'password_confirmation' => 'required| min:4'
        ]);
        if ($validator->fails()) {
            return back()->with('error', 'Password not confirmed');
        } else {
            $seller = SellerCompanyUser::where('id', $request->invitee_id)->update([
                'password'            =>  Hash::make($request->password),
                'updated_at'          =>  Carbon::now(),
                'email_verified_at'   =>  Carbon::now()

            ]);
            InviteSeller::where([
                'invitee_user_id' => $request->invitee_id,
                'token'           => $request->token
            ])->update([
                'updated_at'      => Carbon::now(),
                'claimed'         => Carbon::now()
            ]);

            return Redirect::route('confirmed.login', [
                'email' => $request->invitee_email,
                'password' => $request->password
            ]);
        }
    }

    public function LoginAfterConfirm($email, $password)
    {
        if (Auth::guard('seller')->attempt([
            'email'    => $email,
            'password' => $password
        ])) {
            return redirect()->route('seller.dashboard')->with('success', 'Logged in');
        } else {
            return back()->with('error', 'Login failed');
        }
    }
}
