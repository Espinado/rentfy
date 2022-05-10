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

                <li class="nav-item"><a href="{{ route('admin.products') }}"
                        class="nav-link">{{ __('system.confirmed_items') }}</a></li>
                <li class="nav-item"><a href=""
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

                <span class="breadcrumb-item active">{{ __('system.categories') }}</span>
            </nav>


            <div class="sl-pagebody">
                <div class="sl-page-title">
                    <h5>{{ __('system.categories') }}</h5>

                </div><!-- sl-page-title -->

                <div class="card pd-20 pd-sm-40">
                    <h6 class="card-body-title">{{ __('system.categories') }}
                        <a href="#" class="btn btn-sm btn-warning passingID" style="float: right;" data-toggle="modal"
                            data-target="#modaldemo3">{{ __('system.add_category') }}</a>
                    </h6>
                    <div class="table-wrapper">
                        <table id="datatable1" class="table display responsive nowrap">
                            <thead>
                                <tr>
                                    <th class="wd-15p">Category name</th>
                                    {{-- <th class="wd-20p">Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $row)
                                    <tr>
                                        <td>
                                            <ul id="tree1">
                                                <a href="{{ url('admin/category/edit/' . $row->id) }}"
                                                    class="btn btn-sm btn-danger"
                                                    style="float: right;">{{ __('system.edit') }}</a>
                                                <a href="#" class="btn btn-sm btn-warning passingID" style="float: right;"
                                                    data-toggle="modal" data-target="#modaldemo3"
                                                    data-parent_id="{{ $row->id }}"
                                                    @foreach (json_decode($row->category_name, true) as $key => $t) @if ($key == LaravelLocalization::GetCurrentLocale())
                                                     data-parent_name="{{ $t }}"
                                                      @endif @endforeach>

                                                    {{ __('system.add_category') }}
                                                </a>
                                                <a href="{{ url('admin/product/add/' . $row->id) }}"
                                                    class="btn btn-sm btn-info catID"
                                                    style="float: right;">{{ __('system.add_product') }}</a>



                                                @foreach (json_decode($row->category_name, true) as $tmp => $value)
                                                    {{ $tmp }}=> {{ $value }} <br>
                                                @endforeach
                                                @if (count($row->children))
                                                    @include(
                                                        'admin.categories.partials.subcategories',
                                                        ['subcategories' => $row->children]
                                                    )
                                                @endif
                                            </ul </td>
                                    </tr>
                                @endforeach

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
                        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">{{ __('system.add_category') }}</h6>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>


                    <div class="modal-body pd-20">
                        <div class="col-xl-35 mg-t-35 mg-xl-t-0">
                            <div class="card pd-30 pd-sm-50 form-layout form-layout-5">
                                <form method="post" action="{{ route('admin.category.store') }}">
                                    @csrf
                                    @foreach (LaravelLocalization::getSupportedLocales() as $key => $value)
                                        <div class="row row-xs">
                                            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>
                                                {{ $value['native'] }}</label>
                                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                <input type="text" class="form-control"
                                                    name="category_name[{{ $key }}]">
                                            </div>
                                        </div><!-- row -->
                                    @endforeach
                                    <div class="row row-xs mg-t-20" id="select_list">
                                        <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>
                                            {{ __('system.select_from_list') }}:</label>

                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                            <select class="form-control select2-show-search"
                                                data-placeholder="Choose one (with searchbox)" name="parent_id">
                                                <option label="----"></option>
                                                @foreach ($categories as $category)
                                                    <option
                                                        label="{{ json_decode($category->category_name)->$locale }} ">
                                                        {{ $category->id }}</option>
                                                    @if ($category->children)
                                                        @include(
                                                            'admin.categories.partials.subcategories_for_select',
                                                            [
                                                                'subcategories' =>
                                                                    $category->children,
                                                            ]
                                                        )
                                                    @endif
                                                @endforeach
                                            </select>

                                        </div>

                                    </div>
                            </div>
                            <!-- card -->

                        </div><!-- col-6 -->
                        <div id="select" class="col-sm-10 mg-t-20 mg-sm-t-0"></div>
                    </div><!-- modal-body -->

                    <div class="modal-footer">
                        <input type="submit" class="btn btn-success pd-x-20" value="Add"></button>

                        <button type="button" class="btn btn-danger pd-x-20" data-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div>
            </div><!-- modal-dialog -->
        </div><!-- modal -->
    @endsection
