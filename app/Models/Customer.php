<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
      'cust_code',
      'cust_name',
      'cust_amphur',
      'cust_address',
      'cust_country',
      'cust_province',
      'cust_region',
      'cust_sale',
      'cust_tel',
      'cust_district',
      'cust_zipcode',
    ];
}
