@extends('layouts.master')

@section('title', 'Home Page')
@section('active-home', 'active')
@section('page-title', 'Home Page')

@section('content')
<!-- <div class="col-12">
    <div class="card">
        <div class="card-body"> -->
            @livewire('dashboard')
        <!-- </div>
    </div>
</div> -->

@endsection

@section('scripts')
@endsection