@extends('admin.master')

@section('maincontent')

 <div style="padding-left: 300px">

 	 @if(Session::has('message'))
                    <div class="alert alert-success">{{ Session::get('message') }} </div>
                    @endif
  
 	<h1>Add Products</h1>
 	{!! Form::open(['url'=>'save-product','class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data'])!!}
 	{{ csrf_field() }}
  <div class="form-group">
    <label class="control-label col-sm-2" for="productName">Product Name:</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="productName" placeholder="Enter productName" name="productName">
    </div>
  </div>
<div class="form-group">
    <label class="control-label col-sm-2" for="productCategory">Product Category:</label>
    <div class="col-sm-6">
    	<select class="form-control" name="categoryId" id="categoryId"> 
         <option>Select Product Category</option>
       @foreach( $categories as $category)  
       <option value="{{$category->id}}"> {{ $category->categoryName}}</option>   
       @endforeach
    	</select>
    </div>
</div>
     <div class="form-group">
    <label class="control-label col-sm-2" for="productPrice">Product Price:</label>
    <div class="col-sm-6">
      <input type="number" class="form-control" id="productPrice" placeholder="Enter product Price" name="productPrice">
    </div>
</div>
     <div class="form-group">
    <label class="control-label col-sm-2" for="productQuantity">Product Quantity:</label>
    <div class="col-sm-6">
      <input type="number" class="form-control" id="productQuantity" placeholder="Enter product Quantity" name="productQuantity">
    </div>
</div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="productDescription">Product Description:</label>
    <div class="col-sm-6"> 
      <textarea type="text" class="form-control" id="productDescription" placeholder="Enter Product Description" name="productDescription"></textarea>
    </div>
  </div>
     <div class="form-group">
    <label class="control-label col-sm-2" for="productPicture">Product Picture:</label>
    <div class="col-sm-6">
      <input type="file" class="form-control" id="productPicture" placeholder="Enter product Picture" name="productPicture">
    </div>
</div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="publicationStatus">Publication Status:</label>
    <div class="col-sm-6">
    	<select class="form-control" name="publicationStatus" id="publicationStatus"> 
         <option>Category Status</option>
         <option value="1">Published</option>
         <option value="0">Unpublished</option>
    	</select>
    </div>
</div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-6">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
{!! Form::close() !!}
@include('admin.Errors.errors');
 </div>
}
    
@endsection
