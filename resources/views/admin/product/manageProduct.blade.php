@extends('admin.master')
@section('maincontent')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                    @if(Session::has('message'))
                    <div class="alert alert-success">{{ Session::get('message') }} </div>
                    @endif

                <div class="panel panel-default">
                    <div class="panel-heading">ALL PRODUCTS</div>

                    <div class="panel-body">

                        <table class="table">
                            <tr>
                                <th> Product Name</th>
                                <th> Category Name</th>
                                <th> Quantity</th>
                                <th> Price</th>
                                <th>Picture</th>
                                <th> Publication Status</th>
                                <th> Action</th>

                            </tr>

                        @foreach($products as $product)
                            <tr>
                            <td>  {{ $product->productName }} <br> </td>
                            <td>  {{ $product->categoryName }}</td> <br>
                            <td>  {{ $product->productQuantity }}</td> <br>
                            <td>  {{ $product->productPrice }}</td> <br>
                             <td>  <img src="{{ asset('$product->productPicture')}} " width="100px" height="100px" /></td> <br>
                            <td>  {{ $product->publicationStatus==1 ? 'published':'unpublished' }} <br> </td>
                            <td> <a  href="{{ url('view-product/'.$product->id)}}"> View  </a>  <a href="{{url('edit-product/'.$product->id)}}"> Edit</a> <a href="{{ url('delete-product/'.$product->id)}}">Delete</a> </td>
      
                             </td>

                            </tr>
                         @endforeach
                        </table>
                    </div>
                </div
        </div>
    </div>
@endsection