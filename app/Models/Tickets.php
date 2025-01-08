<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    protected $table = 'tickets';
    public $fillable = ['request_detail', 'requestor', 'requestor_dept', 'requestor_phone', 'category', 'status', 'urgency', 'is_sent', 'datetime'];
}
