<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SSHKey extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['user_id', 'name', 'key'];
    protected $table = "ssh_keys";
    protected $dates = ['deleted_at'];

}
