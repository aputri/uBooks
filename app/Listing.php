<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
   // public $timestamps = false;
	//This is for sorting don't worry about it
	public static $columns = [
	"Name" =>"name",
	"Condition"=>"condition",
	"Edition"=>"edition",
	"Price"=>"price",
	"RetailPrice"=>"retailPrice"
	];
}
