<?php

namespace App\Models\Vendor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VendorModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'vendors';

    protected $fillable = [
        'id',
        'vendor_name',
        'vendor_email',
        'vendor_phone',
        'address_line1',
        'address_line2',
        'city',
        'state',
        'country',
        'admin_action'
    ];
}
