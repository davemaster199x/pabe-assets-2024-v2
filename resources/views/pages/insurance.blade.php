@extends('layouts.master')

@section('title', 'Insurance')
@section('page-title', 'Insurance')

@section('header')
@endsection

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            @livewire('insurance')
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script type="text/javascript">
        
    </script>
@endsection