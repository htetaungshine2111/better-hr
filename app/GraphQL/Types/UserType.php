<?php

namespace App\GraphQL\Types;

use App\Employee;
use App\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'User',
        'model' => User::class
    ];

    public function fields() : array
    {
        return [
            'id' => [

                'type' => Type::nonNull(Type::int()),
                'description' => 'Id of the employee',

            ],

            'token' => [

                'type' => Type::nonNull(Type::string()),
                'description' => 'Id of the employee',

            ],
        ];
    }
}