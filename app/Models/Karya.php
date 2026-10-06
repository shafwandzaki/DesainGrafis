<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karya extends Model
{
    protected $fillable = ['img_karya', 'nama_karya', 'deskripsi', 'link_karya'];
}
