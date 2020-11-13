<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SSHKey extends Model
{
    use HasFactory;

    protected $table = "ssh_keys";

    public function key()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
