@extends('mainLayout')

@section('page-content')
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<div class="container-fluid">
    <div class="row">
        <div class="col text-end">
            <div class="fs-6">
                @if(Auth::check())
                {{ Auth::user()->userInfo->user_firstname.' '.Auth::user()->userInfo->user_lastname }}
                <span class="fs-6" style="font-weight: bold;">
                    @if(Auth::user()->hasRole('admin'))
                    : Admin User
                    @else
                    : User
                    @endif
                </span>
                @include('slugs.logout')
                @endif
            </div>
        </div>
    </div>
    People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius
    <p>
        <a href="{{ route('usertool') }}" class="link-primary">Manage User Roles and Permissions</a>
    </p>
    <p>
        <a href="{{ route('home') }}" class="link-dark">Back</a>
    </p>
</div>
@endsection