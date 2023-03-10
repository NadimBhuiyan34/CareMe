<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorProfile extends Model
{
    use HasFactory;
    protected $table='doctor_profiles';
    protected $fillable=['user_id','mobile','hqualification','specility','collage','image','about'];
    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
