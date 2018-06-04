@extends('admin.master')
@section('maincontent')
<div style="padding-left: 300px">
<h1>  Product Picture</h1>
<hr>
<img src="{{ asset($products->productPicture)}}" width="280px" height="330px" >

<table>
	
<tr>
<td>Produt Name: </td><td> {{ $products->productName }}</td>

</tr>
<tr>
<td>Product Price: </td><td>{{ $products->productPrice }}</td>

</tr>
<tr>
<td> Product Quantity:</td><td>{{ $products->productQuantity }}</td>

</tr>
<tr>
<td>Product Description: </td><td>{{ $products->productDescription }}</td>

</tr>
<tr>
<td>Publication Status: </td><td>{{ $products->publicationStatus }}</td>
</tr>















</table>

</div>
@endsection