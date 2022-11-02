@extends('layouts.app')
@section('title')
    Transactions
@endsection
@section('content')


    <div>
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Transactions</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>

    </div>


    <div id="success"></div>
    <div class="form-group">
        <a href="/transactions/create" class="button4" style="background-color:#4e9af1;float: right;">Make Transaction</a>
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



    @if(sizeof($transactions)==0)
        <div class="alert alert-info col-12">
            <strong>
                <h1>No Transaction Found!</h1>
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
                        @foreach($transactions as $trs)
                            <tr class="row100 body" height="64px">
                                <td class="cell100 column1" >{{$loop->index+1}}</td>
                                <td class="cell100 column2" >
                                    <div style="display: flex; justify-content: space-between;">
                                        <form class="d-inline" action="{{route('transactions.destroy',["transaction"=>$trs])}}" method="post">
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
                            <tr class="row100 head" >
                                <th class="cell100 column2">Customer</th>
                                <th class="cell100 column3">Product</th>
                                <th class="cell100 column4">Qty purchased</th>
                                <th class="cell100 column5">Transaction date'</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($transactions as $trs)
                                <tr class="row100 body" height="64px">
                                    <td class="cell100 column2">{{$trs->customer->name}}</td>
                                    <td class="cell100 column3">{{$trs->product->name}}</td>
                                    <td class="cell100 column4">{{$trs->qty_purchased}}</td>
                                    <td class="cell100 column5">{{$trs->transaction_date}}</td>
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




