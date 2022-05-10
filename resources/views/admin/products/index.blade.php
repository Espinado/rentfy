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
        </a><!-- sl-menu-link -->

      </div><!-- sl-sideleft-menu -->

      <br>
    </div><!-- sl-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    @endsection
