@extends('admin.layouts.admin_master')
@section('dashboard')
    <!-- ########## START: LEFT PANEL ########## -->
    <div class="sl-logo"><a href="{{ route('admin.dashboard') }}"><i class="icon ion-android-star-outline"></i>
            starlight</a></div>
    <div class="sl-sideleft">
        <label class="sidebar-label">Navigation</label>
        <div class="sl-sideleft-menu">
            <a href="{{ route('admin.dashboard') }}" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                    <span class="menu-item-label">Dashboard</span>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <a href="{{ route('admin.sellers.companies') }}" class="sl-menu-link active">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                    <span class="menu-item-label">Sellers</span>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
        </div><!-- sl-sideleft-menu -->
        <br>
    </div><!-- sl-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Starlight</a>
            <a class="breadcrumb-item" href="{{ route('admin.sellers.companies') }}">Sellers</a>
            <span class="breadcrumb-item active">{{ $seller->seller_company_name }}</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>"{{ $seller->seller_company_name }}"
                    {{ Config::get('company_legal_status.legal_status.' .$seller->seller_company_profile->seller_company_legal_country .'.status.' .$seller->seller_company_legal_status) }}
                    Info</h5>

            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Base Accordion</h6>
                <p class="mg-b-20 mg-sm-b-30">The default collapse behavior to create an accordion.</p>

                <div id="accordion" class="accordion" role="tabpanel" aria-multiselectable="false">
                    <div class="card">
                        <div class="card-header" role="tab" id="headingOne">
                            <h6 class="mg-b-0">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false"
                                    aria-controls="collapseOne" class="tx-gray-800 transition">
                                    "{{ $seller->seller_company_name }}"
                                    {{ Config::get('company_legal_status.legal_status.' .$seller->seller_company_profile->seller_company_legal_country .'.status.' .$seller->seller_company_legal_status) }}
                                    general info
                                </a>
                            </h6>
                        </div><!-- card-header -->

                        <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                            <div class="card-body">
                                <div class="sl-pagebody">
                                    <div class="sl-page-title">
                                        <h5>"{{ $seller->seller_company_name }}"
                                            {{ Config::get('company_legal_status.legal_status.' .$seller->seller_company_profile->seller_company_legal_country .'.status.' .$seller->seller_company_legal_status) }}
                                        </h5>

                                        <p>Forms are used to collect user information with different element types of input,
                                            select, checkboxes, radios and more.</p>
                                    </div><!-- sl-page-title -->

                                    <div class="row row-sm mg-t-20">
                                        <div class="col-xl-6">
                                            <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
                                                <h6 class="card-body-title">"{{ $seller->seller_company_name }}"
                                                    {{ Config::get('company_legal_status.legal_status.' .$seller->seller_company_profile->seller_company_legal_country .'.status.' .$seller->seller_company_legal_status) }}
                                                    legal info</h6>
                                                <p class="mg-b-20 mg-sm-b-30">A basic form where labels are aligned in left.
                                                </p>
                                                <div class="row">
                                                    <label class="col-sm-4 form-control-label">Country:</label>
                                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                        <input type="text" class="form-control" disabled
                                                            value="{{ Config::get('countries.name.' . $seller->seller_company_profile->seller_company_legal_country . '.country_name') }}">
                                                    </div>
                                                </div><!-- row -->
                                                <div class="row mg-t-20">
                                                    <label class="col-sm-4 form-control-label">City: </label>
                                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                        <input type="text" class="form-control"
                                                            value="{{ Config::get('countries.name.' .$seller->seller_company_profile->seller_company_legal_country .'.regions.' .$seller->seller_company_profile->seller_company_legal_city .'.city_name') }}"
                                                            disabled>
                                                    </div>
                                                </div>
                                                <div class="row mg-t-20">
                                                    <label class="col-sm-4 form-control-label">Street: </label>
                                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                        <input type="text" class="form-control"
                                                            value="{{ Config::get('countries.name.' .$seller->seller_company_profile->seller_company_legal_country .'.regions.' .$seller->seller_company_profile->seller_company_legal_city .'.streets.' .$seller->seller_company_profile->seller_company_legal_street) }}"
                                                            disabled>
                                                    </div>
                                                </div>
                                                <div class="row mg-t-20">
                                                    <label class="col-sm-4 form-control-label">House:</label>
                                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                        <input type="text" class="form-control"
                                                            value="{{ $seller->seller_company_profile->seller_company_legal_house }}"
                                                            disabled>
                                                    </div>
                                                </div>
                                                <div class="row row-xs mg-t-20">
                                                    <label class="col-sm-4 form-control-label"> Room:</label>
                                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                        <input type="text" class="form-control"
                                                            value="{{ $seller->seller_company_profile->seller_company_legal_room }}"
                                                            disabled>
                                                    </div>
                                                </div><!-- row -->

                                            </div><!-- card -->
                                        </div><!-- col-6 -->
                                        <div class="col-xl-6 mg-t-25 mg-xl-t-0">
                                            <div class="card pd-20 pd-sm-40 form-layout form-layout-5">
                                                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">
                                                    "{{ $seller->seller_company_name }}"
                                                    {{ Config::get('company_legal_status.legal_status.' .$seller->seller_company_profile->seller_company_legal_country .'.status.' .$seller->seller_company_legal_status) }}
                                                    real info</h6>
                                                <p class="mg-b-30 tx-gray-600">A basic form where labels are aligned in
                                                    right.</p>
                                                <div class="row row-xs">
                                                    <label class="col-sm-4 form-control-label"> Country:</label>
                                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                        <input type="text" class="form-control"
                                                            value="{{ Config::get('countries.name.' . $seller->seller_company_profile->seller_company_phys_country . '.country_name') }}"
                                                            disabled>
                                                    </div>
                                                </div><!-- row -->
                                                <div class="row row-xs mg-t-20">
                                                    <label class="col-sm-4 form-control-label"> City:</label>
                                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                        <input type="text" class="form-control"
                                                            value="{{ Config::get('countries.name.' .$seller->seller_company_profile->seller_company_phys_country .'.regions.' .$seller->seller_company_profile->seller_company_phys_city .'.city_name') }}"
                                                            disabled>
                                                    </div>
                                                </div>
                                                <div class="row row-xs mg-t-20">
                                                    <label class="col-sm-4 form-control-label"> Street:</label>
                                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                        <input type="text" class="form-control"
                                                            value="{{ Config::get('countries.name.' .$seller->seller_company_profile->seller_company_phys_country .'.regions.' .$seller->seller_company_profile->seller_company_phys_city .'.streets.' .$seller->seller_company_profile->seller_company_phys_street) }}"
                                                            disabled>
                                                    </div>
                                                </div>
                                                <div class="row row-xs mg-t-20">
                                                    <label class="col-sm-4 form-control-label"> House:</label>
                                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                        <input type="text" class="form-control"
                                                            value="{{ $seller->seller_company_profile->seller_company_phys_house }}"
                                                            disabled>
                                                    </div>
                                                </div><!-- row -->
                                                <div class="row row-xs mg-t-20">
                                                    <label class="col-sm-4 form-control-label"> Room:</label>
                                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                        <input type="text" class="form-control"
                                                            value="{{ $seller->seller_company_profile->seller_company_phys_room }}"
                                                            disabled>
                                                    </div>
                                                </div><!-- row -->
                                                <div class="row row-xs mg-t-30">
                                                    <div class="col-sm-8 mg-l-auto">

                                                    </div><!-- col-8 -->
                                                </div>
                                            </div><!-- card -->
                                        </div><!-- col-6 -->
                                    </div><!-- row -->



                                </div><!-- sl-pagebody -->
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" role="tab" id="headingTwo">
                                <h6 class="mg-b-0">
                                    <a class="collapsed transition" data-toggle="collapse" data-parent="#accordion"
                                        href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Seller employees
                                    </a>
                                </h6>
                            </div>
                            <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="sl-pagebody">


                                    <div class="card pd-20 pd-sm-40">
                                        <h6 class="card-body-title">Seller employees</h6>
                                        <a href="" class="btn btn-warning pd-x-20" data-toggle="modal"
                                            data-target="#modaldemo3">Add new</a>


                                        <div class="table-wrapper">
                                            <table id="datatable1" class="table display responsive nowrap">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-20p">Name</th>
                                                        <th class="wd-20p">Created at</th>
                                                        <th class="wd-20p">Email</th>


                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($seller->seller_company_users as $user)
                                                        <tr>
                                                            <td>{{ $user->name }}</td>
                                                            <td>{{ $user->created_at }}</td>
                                                            <td>{{ $user->email }}</td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div><!-- table-wrapper -->
                                    </div><!-- card -->

                                </div><!-- sl-pagebody -->
                            </div>
                        </div>

                        <div id="modaldemo3" class="modal fade">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content tx-size-sm">
                                    <div class="modal-header pd-x-20">
                                        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add new user for
                                            {{ Config::get('company_legal_status.legal_status.' .$seller->seller_company_profile->seller_company_legal_country .'.status.' .$seller->seller_company_legal_status) }}
                                            "{{ $seller->seller_company_name }}"</h6>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body pd-10">
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
                                        <input type="hidden" name="company_id" value="{{ $seller->id }}">
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
                        <div class="card">
                            <div class="card-header" role="tab" id="headingThree">
                                <h6 class="mg-b-0">
                                    <a class="collapsed transition" data-toggle="collapse" data-parent="#accordion"
                                        href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Creating CSS3 Button with Rounded Corners
                                    </a>
                                </h6>
                            </div>
                            <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                    brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt
                                    aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                    Nihil anim keffiyeh helvetica, craft beer labore.
                                </div>
                            </div><!-- collapse -->
                        </div><!-- card -->
                    </div><!-- accordion -->
                </div><!-- card -->



            </div><!-- sl-pagebody -->

        </div><!-- sl-mainpanel -->
        <!-- ########## END: MAIN PANEL ########## -->
    @endsection
