<?php

namespace App\Models\Marketings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function invoice_detail()
    {
        return $this->hasMany('App\Models\Marketings\InvoiceDetails');
    }


}
