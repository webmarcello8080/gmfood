<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'businesses';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'address', 'address2', 'postcode', 'city', 'phone_number', 'website', 'email'];

    /**
     * Get the user is connected with a business.
     */
    public function users(){
        return $this->hasMany(User::class);
    }

    /**
     * Get the menu is connected with a business.
     */
    public function menus(){
        return $this->hasMany(Menu::class);
    }
}
