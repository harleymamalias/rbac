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
    Simplicity is the ultimate sophistication. - Leonardo da Vinci
    <p>
        @can('create')
        <a href="{{ url('acctg/new') }}">Add New Ledger Entry</a>
        @elsecan('viewAll')
        <a href="{{ url('acctg/view/all') }}">View All Ledgers</a>
        @endcan
    </p>
    <p>
        @include('slugs.homeLink')
    </p>
</div>
@endsection