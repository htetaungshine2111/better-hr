<?php

namespace App\GraphQL\Mutations;

use App\Employee;
use CLosure;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\Mutation;

class InsertEmployeeMutation extends Mutation
{
    protected $attributes = [
        'name' => 'InsertEmployee'
    ];

    public function type(): Type
    {
        return GraphQL::type('Employee');
    }

    public function args(): array
    {
        return [
            'name' => ['name' => 'name', 'type' => Type::nonNull(Type::string())],
            'gender' => ['name' => 'gender', 'type' => Type::nonNull(Type::string())],
            'age' => ['name' => 'age', 'type' => Type::nonNull(Type::string())],
            'address' => ['name' => 'address', 'type' => Type::nonNull(Type::string())],
            'email' => ['name' => 'email', 'type' => Type::nonNull(Type::string())],
            'position' => ['name' => 'position', 'type' => Type::nonNull(Type::string())]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $employee = new Employee();
        $employee->name = $args['name'];
        $employee->gender = $args['gender'];
        $employee->age = $args['age'];
        $employee->email = $args['email'];
        $employee->address = $args['address'];
        $employee->position = $args['position'];
        $employee->save();

        return $employee;
    }
}