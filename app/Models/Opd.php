<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Opd extends Model
{
    protected $table = 'opd';
    protected $primaryKey = 'id';
    protected $guarded = ['created_at', 'updated_at'];

    // Menentukan bahwa id menggunakan UUID
    public $incrementing = false;  // Non-incrementing karena menggunakan UUID sebagai primary key
    protected $keyType = 'string'; // Menentukan bahwa tipe data primary key adalah string

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($model) {
    //         // Menghasilkan UUID versi 4 dan menetapkannya ke kolom 'id'
    //         $model->id = (string) Uuid::generate(4);
    //     });
    // }

    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'pegawai_id', 'id');
    }
}
