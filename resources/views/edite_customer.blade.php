@extends('layouts.app')
@section('title')
    Edite Customer
@endsection
@section('content')
    <div>
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0"> Edite Customer Info</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>

    </div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route("customers.update",$customer)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Customer Name :</label>
                            <input class="form-control" name="name" value="{{$customer->name}}" type="text" placeholder="Customer Name..." required="required" data-validation-required-message="Please enter Customer Name ." />
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Customer Email :</label>
                            <input class="form-control" name="email" value="{{$customer->email}}" type="text" placeholder="Customer Email..." required="required" data-validation-required-message="Please enter Customer Email ." />
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Customer Address :</label>
                            <input class="form-control" name="address" value="{{$customer->address}}" type="text" placeholder="Customer Address..." required="required" data-validation-required-message="Please enter Customer Address ." />
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Customer Phone :</label>
                            <input class="form-control" name="phone" value="{{$customer->phone}}" type="text" placeholder="Customer Phone..." required="required" data-validation-required-message="Please enter Customer Phone ." />
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>


                    <hr />


                    <div class="row form-group mt-3">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success w-50 float-right">Edite Customer</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
