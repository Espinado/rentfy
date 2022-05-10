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
        <a href="{{route('admin.admins')}}" class="sl-menu-link active">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">{{ __('system.admins') }}</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->

        <a href="{{route('admin.sellers.companies')}}" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">{{ __('system.sellers') }}</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="{{route('admin.categories')}}" class="sl-menu-link">
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

        </ul>


      </div><!-- sl-sideleft-menu -->

      <br>
    </div><!-- sl-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-pagebody">
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Starlight</a>

        <span class="breadcrumb-item active">{{ __('system.admins') }}</span>
      </nav>
      @if(Session::has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong> {{session::get('success')}}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif


      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>{{ __('system.admin_list') }}</h5>

        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">{{ __('system.authorized') }} {{ __('system.admins') }}</h6><a href="" data-toggle="modal"
                                            data-target="#modaldemo3" class="btn btn-sm btn-warning" style="float: right;">{{ __('system.add_new') }}</a>


          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">{{ __('system.name') }}</th>
                  <th class="wd-15p">{{ __('system.email') }}</th>
                  <th class="wd-20p">{{ __('system.active') }}</th>
                  <th class="wd-15p">{{ __('system.created_at') }}</th>

                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Tiger</td>
                  <td>Nixon</td>
                  <td>System Architect</td>
                  <td>2011/04/25</td>

                </tr>
               {{-- @foreach ($sellerCompanies as $seller)
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
               @endforeach --}}
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->

      </div><!-- sl-pagebody -->

    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
    <div id="modaldemo3" class="modal fade">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content tx-size-sm">
                                    <div class="modal-header pd-x-20">
                                        {{-- <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add new user for
                                            {{ Config::get('company_legal_status.legal_status.' .$seller->seller_company_profile->seller_company_legal_country .'.status.' .$seller->seller_company_legal_status) }}
                                            "{{ $seller->seller_company_name }}"</h6> --}}
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    {{-- <div class="modal-body pd-10">
                                        <div class="col-xl-15 mg-t-25 mg-xl-t-0">
                                            <div class="card pd-20 pd-sm-40 form-layout form-layout-5">
                                                <form method="post" action="{{ route('seller.employee.store') }}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row row-xs">
                                                        <label class="col-sm-4 form-control-label"><span
                                                                class="tx-danger">*</span> Name:</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input type="text" class="form-control" name="name"
                                                                placeholder="Enter name">
                                                        </div>
                                                    </div><!-- row -->
                                                    <div class="row row-xs mg-t-20">
                                                        <label class="col-sm-4 form-control-label"><span
                                                                class="tx-danger">*</span> Email:</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input type="email" class="form-control" name="email"
                                                                placeholder="Enter email">
                                                        </div>
                                                    </div>
                                            </div>
                                            <!-- card -->
                                        </div><!-- col-6 -->
                                        <input type="hidden" name="company_id" value="{{ $seller->id }}"> --}}
                                    </div><!-- modal-body -->
                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-success pd-x-20" value="Add"></button>

                                        <button type="button" class="btn btn-danger pd-x-20"
                                            data-dismiss="modal">Cancel</button>
                                        </form>
                                    </div>
                                </div>
                            </div><!-- modal-dialog -->
                        </div><!-- modal -->

 @endsection
