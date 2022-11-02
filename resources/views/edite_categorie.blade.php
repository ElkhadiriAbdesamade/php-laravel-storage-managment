@extends('layouts.app')
@section('title')
Edite Categorie
@endsection
@section('content')
    <div>
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Edite Categorie</h2>
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
            <form action="{{route("categories.update",["categorie"=>$categorie])}}" method="post">
            @csrf
                @method('PUT')
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls mb-0 pb-2">
                        <label>Categorie Name :</label>
                        <input class="form-control" name="name" value="{{$categorie->name}}" type="text" placeholder="Categorie Name..." required="required" data-validation-required-message="Please enter Categorie Name ." />
                        <p class="help-block text-danger"></p>
                    </div>
                </div>


                <hr />


                <div class="row form-group mt-3">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success w-50 float-right">Edite Categorie</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
