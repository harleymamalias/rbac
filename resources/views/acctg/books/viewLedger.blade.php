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
    <!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
    <div class="row">

        <div class="col-4" style="background-color: black; color: white;">Ledger Entry Details</div>
        <div class="col-4"></div>
        <div class="col-4"></div>
        <div class="col-4"></div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div>
                Entry Number: {{ $ledger->id }}
            </div>
            <div>
                Entry Details: <br>
                <textarea name="" id="" cols="30" rows="5" class="text-start">
                {{ $ledger->entry }}
                </textarea>
            </div>
            <div>
                Amount: PHP <span class="fw-bold">{{ number_format($ledger->amount,2) }}</span>
            </div>
            <div>
                Encoded by: {{ $encoder->user_firstname.' '.$encoder->user_lastname }}
            </div>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
    </div>
    <div class="row">
        <div class="col">
            <a href="{{ route('ledgers') }}" class="link-dark">Back</a>
        </div>
    </div>
</div>
@endsection
