@extends('layouts.app')
@section('title')
    Dashboard
@endsection
@section('content')

        <div class="row vh-md-100">
            <div class="col-md-8 col-sm-10 col-12 mx-auto my-auto text-center">
                <img src="{{asset("images/stock.png")}}" width="635" height="423">

                <h1 class="heading-black text-capitalize">Stock Managment Systeme </h1>
                <p class="lead py-3">this web site will allow you to manage your Product Stock and get alert whit evry New transaction happend </p>
                <a href="/products"><button class="btn btn-primary d-inline-flex flex-row align-items-center" >
                     Get started now
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right ml-2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </button></a>
            </div>
        </div>

@endsection
