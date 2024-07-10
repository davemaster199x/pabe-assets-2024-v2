@extends('layouts.master')

@section('title', 'Asset Details')
@section('active-home', 'active')
@section('page-title', 'Asset View')

@section('content')
    <div class="col-xl-4 col-lg-12 xl-50 morning-sec box-col-12">
        <div class="card profile-greeting">
            <div class="card-body pb-0">
                <div class="media">
                    <div class="media-body">
                        <div class="greeting-user">
                            <h4 class="f-w-600 font-primary" id="greeting">-</h4>
                            <p>Here whats happing in your account today</p>
                            <div class="whatsnew-btn"><a class="btn btn-primary">Whats New !</a></div>
                        </div>
                    </div>
                    <div class="badge-groups">
                        <div class="badge f-10"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock me-1">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg><span id="txt">2:32 PM</span></div>
                    </div>
                </div>
                <div class="cartoon"><img class="img-fluid" src="{{ asset('assets/images/dashboard/cartoon.png') }}" alt=""></div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.getElementById('list_of_assets-navbar').classList.add('active');
    </script>

@endsection