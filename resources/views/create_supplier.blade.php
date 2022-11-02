@extends('layouts.app')
@section('title')
    Create New Supplier
@endsection
@section('content')
    <div>
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Create New Supplier</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>

    </div>

    <form action="{{route('suppliers.store')}}" method="post">
        @csrf

        <div class="control-group">
            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Product Name :</label>
                <input class="form-control" name="name" type="text" placeholder="Supplier Name..." required="required" data-validation-required-message="Please enter Supplier Name ." />
                <p class="help-block text-danger"></p>
            </div>
        </div>
        <div class="control-group">
            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Product Email :</label>
                <input class="form-control" name="email" type="text" placeholder="Supplier Email..." required="required" data-validation-required-message="Please enter Supplier Email ." />
                <p class="help-block text-danger"></p>
            </div>
        </div>
        <div class="control-group">
            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Product Address :</label>
                <input class="form-control" name="address" type="text" placeholder="Supplier Address..." required="required" data-validation-required-message="Please enter Supplier Address ." />
                <p class="help-block text-danger"></p>
            </div>
        </div>
        <div class="control-group">
            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Product Phone :</label>
                <input class="form-control" name="phone" type="text" placeholder="Supplier Phone..." required="required" data-validation-required-message="Please enter Supplier Phone ." />
                <p class="help-block text-danger"></p>
            </div>
        </div>



        <hr />


        <div class="row form-group mt-3">
            <div class="col-md-12">
                <button type="submit" class="btn btn-success w-50 float-right">Add Supplier</button>
            </div>
        </div>
    </form>
@endsection
