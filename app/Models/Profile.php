<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table='profiles';
    protected $fillable=['user_id','mobile','profession','gender','datebirth','image','bio','married','city','upazila','union','postcode','village','house'];
    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
