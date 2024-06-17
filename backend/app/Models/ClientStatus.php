<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientStatus extends Model
{
    protected $table = 'client_statuses';

    protected $fillable = [
        'name'
    ];

    public function clients()
    {
        return $this->hasMany(Client::class);
    }
}
