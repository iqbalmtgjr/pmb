<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pmbsekolah extends Model
{
    use HasFactory;
    protected $table = 'pmb_sekolah';
    protected $primaryKey = 'id_sekolah';
    protected $guarded = ['id_sekolah'];
    public $timestamps = false;

    public function datasekolah()
    {
        return $this->belongsTo(Datasekolah::class, 'data_sekolah_id');
    }
}
