<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
//use Spatie\MediaLibrary\InteractsWithMedia;


class Customer extends Model //implements HasMedia
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone_no1',
        'phone_no2',
        'address',
        'date_of_register',
        'due', 
        'deposit',
        'media',
        'notes',
    ];

    public function addFile($file)
    {
        return $this->addMedia($file)->toMediaCollection('customer_files');
    }
}