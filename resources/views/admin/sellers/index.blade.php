@extends('admin.layouts.admin_master')
@section('dashboard')

    <!-- ########## START: LEFT PANEL ########## -->
    <div class="sl-logo"><a href="{{route('admin.dashboard')}}"><i class="icon ion-android-star-outline"></i> starlight</a></div>
    <div class="sl-sideleft">

      <label class="sidebar-label">Navigation</label>
      <div class="sl-sideleft-menu">
        <a href="{{ LaravelLocalization::localizeUrl('/admin/') }}" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">{{ __('system.dashboard') }}</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="{{route('admin.admins')}}" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">{{ __('system.admins') }}</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->

        <a href="{{route('admin.sellers.companies')}}" class="sl-menu-link active">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">{{ __('system.sellers') }}</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        {{-- <a href="{{route('admin.categories')}}" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">{{ __('system.categories') }}</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
         <a href="{{route('admin.brands')}}" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">{{ __('system.brands') }}</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
       <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">{{ __('system.items') }}</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">

          <li class="nav-item"><a href="{{ route('admin.products') }}" class="nav-link">{{ __('system.confirmed_items') }}</a></li>
          <li class="nav-item"><a href="" class="nav-link">{{ __('system.unconfirmed_items') }}</a></li>

        </ul> --}}


      </div><!-- sl-sideleft-menu -->
        </a><!-- sl-menu-link -->

      </div><!-- sl-sideleft-menu -->

      <br>
    </div><!-- sl-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-pagebody">
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Starlight</a>

        <span class="breadcrumb-item active">{{ __('system.sellers') }}</span>
      </nav>
    

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Sellers list</h5>

        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Authorised sellers</h6><a href="{{route('seller.register')}}" class="btn btn-sm btn-warning" style="float: right;">Add New</a>


          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Seller Name</th>
                  <th class="wd-15p">Seller legal status</th>
                  <th class="wd-20p">Seller Reg country</th>
                  <th class="wd-15p">Is taxpayer</th>
                  <th class="wd-10p">Is active</th>
                  <th class="wd-25p">Is banned</th>
                  <th class="wd-25p">Details</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Tiger</td>
                  <td>Nixon</td>
                  <td>System Architect</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                  <td>t.nixon@datatables.net</td>
                  <td><a class="btn btn-danger">Details</a></td>
                </tr>
               @foreach ($sellerCompanies as $seller)
               <tr>
               <td>{{$seller->seller_company_name}}</td>
               <td>{{Config::get('company_legal_status.legal_status.'.$seller->seller_company_profile->seller_company_legal_country.'.status.'.$seller->seller_company_legal_status)}}</td>
               <td>{{Config::get('countries.name.'.$seller->seller_company_profile->seller_company_phys_country.'.country_name')}}</td>
                 @if ($seller->tax_payer== true)
                    <td><span class="badge badge-success">Taxpayer</span></td>
                 @else
                    <td><span class="badge badge-danger">Not Taxpayer</span></td>

               @endif
               @if ($seller->is_active== true)
                    <td><span class="badge badge-success">Active</span></td>
                 @else
                    <td><span class="badge badge-danger">Disactive</span></td>

               @endif
               @if ($seller->is_banned== true)
               <td><span class="badge badge-danger">Banned</span></td>
            @else
               <td><span class="badge badge-success">Not available</span></td>

          @endif
               <td><a href="{{ route('seller.company.view', $seller->id) }}" class="btn btn-danger">Details</a></td>
               </tr>
               @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->

      </div><!-- sl-pagebody -->

    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

 @endsection
