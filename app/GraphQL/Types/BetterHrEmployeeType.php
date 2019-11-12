<?php

namespace App\GraphQL\Types;

use App\Employee;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class BetterHrEmployeeType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Employee',
        'model' => Employee::class
    ];

    public function fields() : array
    {
        return [
            'id' => [

                'type' => Type::nonNull(Type::int()),
                'description' => 'Id of the employee',

            ],

            'name' => [

                'type' => Type::nonNull(Type::string()),
                'description' => 'The name of the employee',

            ],

            'gender' => [

                'type' => Type::nonNull(Type::string()),
                'description' => 'Gender of the employee',

            ],

            'age' => [

                'type' => Type::nonNull(Type::string()),
                'description' => 'Age of the employee',

            ],

            'email' => [

                'type' => Type::nonNull(Type::string()),
                'description' => 'Email of the employee',

            ],

            'address' => [

                'type' => Type::nonNull(Type::string()),
                'description' => 'Address of the employee',

            ],

            'position' => [

                'type' => Type::nonNull(Type::string()),
                'description' => 'Position of the employee',

            ]
        ];
    }
}