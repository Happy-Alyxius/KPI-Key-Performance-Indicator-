<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'id_role',
        'id_vocation',
        'name',
        'username',
        'password',
        'type',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    protected function type(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  ["kepegawaian","mahasiswa", "tendik", "rektor","kaprodi"][$value],
        );
    }

    public function role(){
        return $this->belongsTo(Role::class, 'id_role');
    }
    public function vocation(){
        return $this->belongsTo(Vocation::class, 'id_vocation');
    }
}
