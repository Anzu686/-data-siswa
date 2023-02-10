<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
   protected $with = ['jurusan'];

    public function Jurusan(){
        return $this->belongsTo(Jurusan::class);
    }


}
