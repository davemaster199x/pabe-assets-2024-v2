@extends('layouts.master')

@section('title', 'Check Out')
@section('active-home', 'active')
@section('page-title', 'Check Out')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
        <label class="form-label" for="funding_source">Keep track of your assets within your organization and create an even more detailed history of them.</label>
            <div class="input-group">
                <button class="btn btn-primary" type="button">Select Assets</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.getElementById('check_out-navbar').classList.add('active');
</script>

<script>

</script>
@endsection