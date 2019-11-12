<?php

namespace App\GraphQL\Mutations;

use App\Employee;
use Closure;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class UpdateEmployeeMutation extends Mutation
{
    protected $attributes = [
        'name' => 'UpdateEmployee'
    ];

    public function type(): Type
    {
        return GraphQl::type('Employee');
    }

    public function args(): array
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::int()],
            'name' => ['name' => 'name', 'type' => Type::string()]
        ];
    }

    protected function rules(array $args = []): array
    {
        return [
            'id' => ['required'],
            'name' => ['required']
        ];
    }

    public function validationErrorMessages(array $args = []): array
    {
        return [
            'id.required' => 'Please enter your ID.',
            'name.required' => 'Please enter your Name',
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $employee = Employee::find($args['id']);
        if (!$employee) {
            return null;
        }

        $employee->name = $args['name'];
        $employee->save();

        return $employee;
    }
}