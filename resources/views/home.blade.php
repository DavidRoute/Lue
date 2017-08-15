@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row topbar-info">

        <div class="bar"></div>
        <div class="col-md-2 avatar">
            <img src="{{ url('avatars') }}/{{ $user->avatar }}" class="rounded" style="width:140px;">
        </div>
        <div class="col-md-10 name-bar">

            <div class="user-name">
                <b>{{ $user->name }}</b>
                <div> {{ $user->position->title }}</div>
                <div> {{ $user->get_long_time() }}</div>
            </div>
        </div>
    </div>
    
    <div class="row info-bar-detail">
        <div class="col-md-2">
            <ul class="user-info-data">

            @if (Auth::user()->is_admin() || $is_profile == false)
                <li><b>Leave : </b>{{ $user->no_of_leave }} days left</li>
                <li><b>Sick leave : </b>{{ $user->sick_leave }} days left</li>
            @endif
        @isset($user->supervisor)
        <li><b>Manager : </b><a href="{{ route('user_profile',["id" => $user->supervisor->id])}}">{{ $user->supervisor->name }}</a></li>
        @endisset
        </ul>
        </div>
        <div class="col-md-10">
            <ul class='user-info-detail'>
            <li><label>Email</label><span>{{ $user->email }}</span></li>
            <li><label>Mobile</label><span>{{ $user->mobile_no }}</span></li>
            <li><label>Address</label><span>{{ $user->location->name }}</span></li>
            <li><label>Join Date</label><span>{{ $user->get_join_date() }}</span></li>
            <li><label>Birthday</label><span>{{ $user->get_birthday() }} ({{ $user->age() }})</span></li>
            </ul>
        </div>
    </div>
    @if($is_profile==false)
    <div class="row">
    <!-- Brithday List -->
    <div class="col-4">
        <div class="card">
            <div class="card-header">
        <h6>Birthday</h6>
            </div>
            <div class="card-block">
            <ul class="user-info-data">
                @if(count($birthdays_of_users)!=0)
                @foreach($birthdays_of_users as $birthday_user)
                <li><a href="{{ route('user_profile',["id" => $birthday_user->id])}}">{{$birthday_user->name}}</a> , {{date('d F',strtotime($birthday_user->birthday))}}</li>
                @endforeach
                @else
                    <li>No Brithday In This Month</li>
                @endif
            </ul>
    
    </div>
    </div>
    </div>
    <!-- End Brithday List -->

    <!-- Anniversary List -->
    <div class="col-4">
    <div class="card">
        <div class="card-header">
        <h6>Anniversary</h6>
        </div>
        <div class="card-block">
        <ul class="user-info-data">
        @if(count($anniversary_users))
        @foreach($anniversary_users as $anniversary_user)
            
            
                <li><a href="{{ route('user_profile',["id" => $anniversary_user->id])}}">{{$anniversary_user->name}}</a> , {{$anniversary_user->No_Of_Years}} 

                @if($anniversary_user->No_Of_Years > 1) 
                    Years 
                @else 
                    Year 
                @endif

                at {{date('d/m',strtotime($anniversary_user->join_date))}} 

                </li>
            
           
        @endforeach
        @else
            <li>No Anniversary In This Month</li>
        @endif
        </ul>
    </div>
    </div>
    </div>
    <!-- End Anniversary List -->

    <!-- Anniversary List -->
    <!-- Leave List -->
    <div class="col-4">
    <div class="card">
        <div class="card-header">
        <h6>Leaves</h6>
        </div>
        <div class="card-block">
            
        
        <ul class="user-info-data">
       @if(count($leaves)!=0)
       @foreach($leaves as $leave)

                <li>
                <a href="{{ route('user_profile',["id" => $leave->user->id])}}">{{$leave->user->name}} </a>
                <br/>
                <div class='small'>

                from {{date('d/m',strtotime($leave->from))}} 
                to {{date('d/m',strtotime($leave->to))}} , {{$leave->no_of_day}} 

                @if($leave->no_of_day > 1) 
                    days 
                @else 
                    day 
                @endif

                </div></li> 
                  
       @endforeach
       @else
            <li>No Leave Today</li> 
       @endif
        </ul>
    </div>
    </div>
    </div>
    <!-- End Anniversary List -->
    <!-- End Leave List -->

    </div>
    @endif
</div>
@endsection
