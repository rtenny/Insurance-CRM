<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table         = 'users';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'username',
        'email',
        'password_hash',
        'reset_token',
        'reset_token_expires_at',
    ];

    // Enable automatic timestamps
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Automatically hash password before insert/update
    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    protected function hashPassword(array $data)
    {
        if (isset($data['data']['password_hash'])) {
            // hash the password field using PHP's native function
            $data['data']['password_hash'] = password_hash($data['data']['password_hash'], PASSWORD_DEFAULT);
        }
        return $data;
    }
}
