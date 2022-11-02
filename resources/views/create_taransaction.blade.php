
@extends('layouts.app')
@section('title')
    Create New Transaction
@endsection
@section('content')
    <div>
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Make New Transaction</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>

    </div>

    <form action="{{route('transactions.store')}}" method="post" enctype="multipart/form-data">

        @csrf

        <div class="control-group">
            <label for="">Transaction Customer :</label>
            <select class="custom-select custom-select-lg mb-3" name="customer" aria-label="Default select example" required>
                @foreach($customers as $cust)
                    <option selected value="{{$cust->id}}">{{$cust->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="control-group">
            <label for="">Transaction Product :</label>
            <select class="custom-select custom-select-lg mb-3" name="product" aria-label="Default select example" required>
                @foreach($products as $prod)
                    <option selected value="{{$prod->id}}">{{$prod->name}} | Qty in Stock => {{$prod->qty_stock}}</option>
                @endforeach

            </select>
        </div>
        <div class="control-group">
            <label>Quantity You Want to Purshes :</label>
            <div class="form-group floating-label-form-group controls mb-0 pb-2">

                <input class="form-control" name="qty_purchased" type="number" placeholder="Product Quantity..." required="required" data-validation-required-message="Please enter Product Quantity ." />
                <p class="help-block text-danger"></p>
            </div>
        </div>






        <hr />


        <div class="row form-group mt-3">
            <div class="col-md-12">
                <button type="submit" class="btn btn-success w-50 float-right">Add Transaction</button>
            </div>
        </div>
    </form>
@endsection
