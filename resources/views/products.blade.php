@extends('layouts.app')
@section('title')
    Products
@endsection
@section('content')


    <div>
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Products</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>

    </div>


    @if(sizeof($products)>1)
    <div class="slideshow-container">

        @foreach($products as $prd)
        <div class="mySlides fade">
            <img src="{{ asset('images/product/'.$prd->image) }}" width="100%" height="600px">
        </div>
        @endforeach
    </div>
    @endif

    <div id="success"></div>
    <div class="form-group"><a href="/products/create" class="button4" style="background-color:#4e9af1;float: right;">Add New Product</a></div>




    <div class="col-sm-12" style="margin-top: 100px">
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


    @if(sizeof($products)==0)
        <div class="alert alert-info col-12">
            <strong>
                <h1>No Product Found!</h1>
            </strong>
        </div>
    @else


        <div class="container-table100">
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
                            @foreach($products as $prd)
                            <tr class="row100 body" height="133px">
                                <td class="cell100 column1" >{{$loop->index+1}}</td>
                                <td class="cell100 column3" >
                                    <div style="display: flex; justify-content: space-between;">
                                    <a style="float:left;margin-right:10px;" href="{{route('products.edit',["product"=>$prd])}}" class="btn btn-sm btn-primary">Update</a>
                                    <form class="d-inline" action="{{route('products.destroy',["product"=>$prd])}}" method="post">
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
                                    <th class="cell100 column2">Images</th>
                                    <th class="cell100 column3">Name</th>
                                    <th class="cell100 column4">Descreption</th>
                                    <th class="cell100 column5">Categorie</th>
                                    <th class="cell100 column6">Quantity in stock</th>
                                    <th class="cell100 column7">Price</th>
                                    <th class="cell100 column8">Supplier</th>


                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $prd)
                                <tr class="row100 body">
                                    <td class="cell100 column2"><img src="{{ asset('images/product/'.$prd->image) }}" width="100px" height="100px" alt="Image"></td>
                                    <td class="cell100 column3">{{$prd->name}}</td>
                                    <td class="cell100 column4">{{$prd->descreption}}</td>
                                    <td class="cell100 column5">{{$prd->categorie->name}}</td>
                                    <td class="cell100 column6">{{$prd->qty_stock}}</td>
                                    <td class="cell100 column7">{{$prd->price}} DH</td>
                                    <td class="cell100 column8">{{$prd->supplier->name}}</td>


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

    <script>
        var slideIndex = 0;
        showSlides();

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {slideIndex = 1}
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";

            setTimeout(showSlides, 2000); // Change image every 2 seconds
        }
    </script>


@endsection




