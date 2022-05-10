@extends('admin.layouts.admin_master')
@section('dashboard')
    <!-- ########## START: LEFT PANEL ########## -->
    <div class="sl-logo"><a href="{{ route('admin.dashboard') }}"><i class="icon ion-android-star-outline"></i>
            starlight</a></div>
    <div class="sl-sideleft">
        {{-- {{LaravelLocalization::getSupportedLocales()}} --}}
        <label class="sidebar-label">Navigation</label>
        <div class="sl-sideleft-menu">
            <a href="{{ LaravelLocalization::localizeUrl('/admin/') }}" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                    <span class="menu-item-label">{{ __('system.dashboard') }}</span>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <a href="{{ route('admin.admins') }}" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                    <span class="menu-item-label">{{ __('system.admins') }}</span>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->

            <a href="{{ route('admin.sellers.companies') }}" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                    <span class="menu-item-label">{{ __('system.sellers') }}</span>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <a href="{{ route('admin.categories') }}" class="sl-menu-link  active">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                    <span class="menu-item-label">{{ __('system.categories') }}</span>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                    <span class="menu-item-label">{{ __('system.items') }}</span>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">

                <li class="nav-item"><a href="form-elements.html"
                        class="nav-link">{{ __('system.confirmed_items') }}</a></li>
                <li class="nav-item"><a href="form-layouts.html"
                        class="nav-link">{{ __('system.unconfirmed_items') }}</a></li>

            </ul>


        </div><!-- sl-sideleft-menu -->

        <br>
    </div><!-- sl-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-pagebody">
        <div class="sl-mainpanel">
            <nav class="breadcrumb sl-breadcrumb">
                <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">{{ __('system.dashboard') }}</a>

                <span class="breadcrumb-item active">{{ __('system.edit_category') }}</span>
            </nav>


            <div class="sl-pagebody">
                <div class="sl-page-title">
                    <h5>{{ __('system.edit_category') }}</h5>

                </div><!-- sl-page-title -->

                <div class="row row-sm mg-t-40">
                    <div class="col-xl-10">
                        <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
                            <form method="post" action="{{ route('admin.category.update') }}">
                                <input type="hidden" name="id" value="{{$id}}">
                                @csrf
                                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <div class="row">
                                        <label class="col-sm-4 form-control-label">{{ $properties['native'] }}: <span
                                                class="tx-danger">*</span></label>
                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                            @if ($cat_array->$localeCode)
                                                <input type="text" class="form-control" value="{{ $cat_array->$localeCode }}" name="category_name[{{$localeCode}}]" required>
                                            @else
                                                <input type="text" class="form-control" placeholder="No translation" name="category_name[{{$localeCode}}]" required>
                                            @endif
                                        </div>
                                    </div><!-- row -->
                                @endforeach
                                <div class="form-layout-footer mg-t-30">
                                    <button class="btn btn-info mg-r-5">Submit Form</button>
                                    <button class="btn btn-secondary">Cancel</button>
                                </div><!-- form-layout-footer -->
                        </div><!-- card -->
                    </form>
                    </div><!-- col-6 -->

                </div><!-- row -->

            </div><!-- sl-pagebody -->


        </div><!-- sl-mainpanel -->
        <!-- ########## END: MAIN PANEL ########## -->
