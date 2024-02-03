<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
        protected $fillable = [
            
      
    'title',
            'content',
            '_token', // Add '_token' to the fillable array
        ];
    
        // ... rest of your model code
        use HasFactory;
    }
   

