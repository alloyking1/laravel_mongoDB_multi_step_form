<?php

namespace App\Models;
use  MongoDB\Laravel\Eloquent\Model;

class MultiStepForm extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'multi_step_form';
    protected $fillable = [
        'name', 'email', 'address', 'city', 'gender',
    ];
}