<?php

namespace App\Models\master;

use App\Models\Model;

class Faskes extends Model
{
    protected $table = "master.faskes";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $timestamp = false;
    public $incrementing = false;
}
