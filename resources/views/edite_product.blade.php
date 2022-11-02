@extends('layouts.app')
@section('title')
    Edite Product
@endsection
@section('content')
    <div>
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Edite Product</h2>
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
                <form action="{{route("products.update",["product"=>$product])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Product Name :</label>
                            <input class="form-control" name="name" value="{{$product->name}}" type="text" placeholder="Product Name..." required="required" data-validation-required-message="Please enter Product Name ." />
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Product descreption :</label>
                            <input class="form-control" name="desc" value="{{$product->descreption}}" type="text" placeholder="Product descreption..." required="required" data-validation-required-message="Please enter Product descreption ." />
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Quantity in stock :</label>
                            <input class="form-control" name="qty" value="{{$product->qty_stock}}" type="text" placeholder="Product Quantity..." required="required" data-validation-required-message="Please enter Product Quantity ." />
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Product Price :</label>
                            <input class="form-control" name="price" value="{{$product->price}}" type="text" placeholder="Product Price..." required="required" data-validation-required-message="Please enter Product Price ." />
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="">Product Categorie :</label>
                        <select class="custom-select custom-select-lg mb-3" name="catg" aria-label="Default select example" value="{{$product->id_categorie}}">
                            @foreach($categories as $catg)
                                <option selected value="{{$catg->id}}">{{$catg->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="control-group">
                        <label for="">Product Supplier :</label>
                        <select class="custom-select custom-select-lg mb-3" name="supp" aria-label="Default select example" value="{{$product->id_supplier}}">
                            @foreach($suppliers as $supp)
                                <option selected value="{{$supp->id}}">{{$supp->name}}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="control-group">
                        <label for="">Product Image :</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file"  class="custom-file-input" name="image" id="inputGroupFile01" required>
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                    </div>








                    <hr />


                    <div class="row form-group mt-3">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success w-50 float-right">Edite Product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
