<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class loan extends Model
{
    protected $primaryKey = 'id';
    protected $keyType = 'int';

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(related: User::class, foreignKey: 'user_npm', ownerKey: 'npm');
    }


}