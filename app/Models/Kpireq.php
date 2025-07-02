<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kpireq extends Model
{
    /** @use HasFactory<\Database\Factories\KpireqFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'id_role',
        'id_vocation',
    ];

    public function role(){
        return $this->belongsTo(Role::class, 'id_role');
    }
    public function vocation(){
        return $this->belongsTo(Vocation::class, 'id_vocation');
    }

}
