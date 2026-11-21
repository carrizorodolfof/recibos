<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Validation extends BaseConfig
{
    public array $ruleSets = [
        \CodeIgniter\Validation\Rules::class,
        \CodeIgniter\Validation\FormatRules::class,
        \CodeIgniter\Validation\FileRules::class,
        \CodeIgniter\Validation\CreditCardRules::class,
        \App\Validation\EmpleadoRules::class, // 👈 tu regla
    ];
}