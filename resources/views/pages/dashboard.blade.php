@extends('layouts.master')

@section('title', 'Home Page')
@section('active-home', 'active')
@section('page-title', 'Home Page')

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
            <div class="cartoon"><img class="img-fluid" src="../assets/images/dashboard/cartoon.png" alt=""></div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.getElementById('dashboard-navbar').classList.add('active');
</script>

<script>
function updateTime() {
    const today = new Date();
    let hours = today.getHours();
    let minutes = today.getMinutes();
    let seconds = today.getSeconds();
    let ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = checkTime(minutes);
    seconds = checkTime(seconds);
    document.getElementById('txt').innerHTML = hours + ":" + minutes + ":" + seconds + " " + ampm;
}

function checkTime(i) {
    if (i < 10) {
        i = "0" + i
    }; // add zero in front of numbers < 10
    return i;
}

// Update the time every second
setInterval(updateTime, 1000);

// Call the function once initially to avoid delay
updateTime();
</script>
@endsection