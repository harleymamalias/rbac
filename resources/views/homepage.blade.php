@extends('mainLayout')

@section('page-title','Main Landing Page')

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
    <h1>Welcome to the Site</h1>
    <br>
    <a href="{{ route('acctg') }}" @unless(Auth::user()->hasRole('admin') || Auth::user()->hasRole('bookeeper') ||
        Auth::user()->hasRole('auditor') || Auth::user()->hasRole('audasst'))
        class="link-dark not-allowed" style={!! '"pointer-events: none; cursor: not-allowed;"' !!}
        @endunless
        >Accounting</a>
    <a href="{{ route('prod') }}" @unless(Auth::user()->hasRole('admin') || Auth::user()->hasRole('assembler'))
        class="link-dark not-allowed" style={!! '"pointer-events: none; cursor: not-allowed;"' !!}
        @endunless
        >Production</a>
    @if(Auth::user()->hasRole('admin'))
    <a href="{{ route('dash') }}">Dashboard</a>
    @endif
</div>
@endsection