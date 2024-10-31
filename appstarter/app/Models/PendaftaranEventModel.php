<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftaranEventModel extends Model
{
    protected $table = 'pendaftaran_event';
    protected $primaryKey = 'id';
    protected $allowedFields = ['event_id', 'username', 'email', 'nim', 'telpon'];
}