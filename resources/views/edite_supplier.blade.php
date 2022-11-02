@extends('layouts.app')
@section('title')
    Edite Supplier
@endsection
@section('content')


    <div>
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0"> Edite Supplier Info</h2>
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
                <form action="{{route("suppliers.update",$supplier)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Supplier Name :</label>
                            <input class="form-control" name="name" value="{{$supplier->name}}" type="text" placeholder="Supplier Name..." required="required" data-validation-required-message="Please enter Supplier Name ." />
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Supplier Email :</label>
                            <input class="form-control" name="email" value="{{$supplier->email}}" type="text" placeholder="Supplier Email..." required="required" data-validation-required-message="Please enter Supplier Email ." />
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Supplier Address :</label>
                            <input class="form-control" name="address" value="{{$supplier->address}}" type="text" placeholder="Supplier Address..." required="required" data-validation-required-message="Please enter Supplier Address ." />
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Supplier Phone :</label>
                            <input class="form-control" name="phone" value="{{$supplier->phone}}" type="text" placeholder="Supplier Phone..." required="required" data-validation-required-message="Please enter Supplier Phone ." />
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>


                    <hr />


                    <div class="row form-group mt-3">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success w-50 float-right">Edite Supplier</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
