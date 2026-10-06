<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    protected $table = 'homes';
    
    protected $fillable = ['title', 'tagline', 'deskripsi', 'link_linkedin', 'link_email', 'link_instagram'];
}
