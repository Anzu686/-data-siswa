<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Siswa;

class Jurusan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    //protected $with = ['siswa'];

    public function siswa(){
        return $this->hasMany(Siswa::class);
    }


}
