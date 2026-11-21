<?php
// app/Models/UserModel.php
namespace App\Models;

use CodeIgniter\Shield\Models\UserModel as ShieldUserModel;

class UserModel extends ShieldUserModel
{
    protected $allowedFields = [
        'username',
        'active',
        'blocked',
    ];
}