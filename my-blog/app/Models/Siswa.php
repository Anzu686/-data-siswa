<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jurusan;

class Siswa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
   protected $with = ['jurusan'];

    public function jurusan(){
        return $this->belongsTo(Jurusan::class);
    }


}
