<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'type',
        'business_id'
    ];

    /**
     * Get the business that owns this user.
     */
    public function business(){
        return $this->belongsTo(Business::class);
    }
}
