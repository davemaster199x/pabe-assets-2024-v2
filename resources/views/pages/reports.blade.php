@extends('layouts.master')

@section('title', 'Reports')
@section('page-title', 'Reports')

@section('header')
@endsection

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            @livewire('reports')
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script type="text/javascript">
        
    </script>
@endsection