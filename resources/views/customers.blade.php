@extends('layouts.app')
@section('title')
    Customers
@endsection
@section('content')
    <div>
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Customers</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>

    </div>


    <div id="success">
    <div class="form-group"><a href="/customers/create" class="button4" style="background-color:#4e9af1;float: right;">Add New Customer</a></div>
    </div>

    <br/>
    <br/>
    <br/>

    <div class="col-sm-12">
        @if(session()->get('success'))
            <div class="alert alert-success" role="alert" >
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Success!   </strong>{{ session()->get('success') }}

            </div>
        @endif
    </div>
    <div class="col-sm-12">
        @if(session()->get('Error'))
            <div class="alert alert-danger" role="alert" >
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Error!   </strong>{{ session()->get('Error') }}

            </div>
        @endif
    </div>

    @if(sizeof($customers)==0)
        <div class="alert alert-info col-12">
            <strong>
                <h1>No Customer Found!</h1>
            </strong>
        </div>
    @else


        <div class="container-table100" style="margin-top: 100px">
        <div class="wrap-table100">
            <div class="table100 ver1">
                <div class="table100-firstcol">
                    <table>
                        <thead>
                        <tr class="row100 head">
                            <th class="cell100 column1">ID</th>
                            <th class="cell100 column2">Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $cust)
                            <tr class="row100 body" height="64px">
                                <td class="cell100 column1" >{{$loop->index+1}}</td>
                                <td class="cell100 column3" >
                                    <div style="display: flex; justify-content: space-between;">
                                        <a style="float:left;margin-right:10px;" href="{{route('customers.edit',["customer"=>$cust])}}" class="btn btn-sm btn-primary">Update</a>
                                        <form class="d-inline" action="{{route('customers.destroy',["customer"=>$cust])}}" method="post">
                                            @method("delete")
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form></div></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="wrap-table100-nextcols js-pscroll">
                    <div class="table100-nextcols">
                        <table>
                            <thead>
                            <tr class="row100 head">
                                <th class="cell100 column2">Name</th>
                                <th class="cell100 column3">Email</th>
                                <th class="cell100 column4">Address</th>
                                <th class="cell100 column5">Phone</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customers as $cust)
                                <tr class="row100 body"  height="64px">
                                    <td class="cell100 column2">{{$cust->name}}</td>
                                    <td class="cell100 column3">{{$cust->email}}</td>
                                    <td class="cell100 column4">{{$cust->address}}</td>
                                    <td class="cell100 column5">{{$cust->phone}}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endif

@endsection

