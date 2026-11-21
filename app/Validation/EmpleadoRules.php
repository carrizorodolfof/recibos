<?php

namespace App\Validation;

class EmpleadoRules
{

    public function empleadoExiste($value, $params = null, $data = null): bool
    {
        $db = \Config\Database::connect();
    
        $builder = $db->table('empleados');
    
        // validar email
        $builder->where('email', $value);
    
        // validar nombre si existe
        if (!empty($data['username'])) {
            $builder->where('nombre', $data['username']);
        }
    
        return $builder->get()->getRow() ? true : false;
    }
/*        
    public function empleadoExiste(string $value, ?string $params, array $data): bool
    {
        $db = \Config\Database::connect();

        $builder = $db->table('empleados');

        // usar $value (email actual)
        $builder->where('email', $value);

        if (!empty($data['username'])) {
            $builder->where('nombre', $data['username']);
        }

        return $builder->get()->getRow() ? true : false;
    }
*/    
}