<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['id','productName','categoryId','productPrice','productQuantity','productDescription','productPicture','publicationStatus'];
}
