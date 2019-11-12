<?php
namespace App\GraphQL\Mutations;

use App\Employee;
use Closure;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class DeleteEmployeeMutation extends Mutation
{
    protected $attributes = [
        'name' => 'DeleteEmployee'
    ];

    public function type(): Type
    {
        return GraphQl::type('Employee');
    }

    public function args(): array
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::int()],
        ];
    }

    protected function rules(array $args = []): array
    {
        return [
            'id' => ['required']
        ];
    }

    public function validationErrorMessages(array $args = []): array
    {
        return [
            'id.required' => 'Please enter your ID.',
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $employee = Employee::find($args['id']);
        if (!$employee) {
            return null;
        }

        $employee->delete();

        return $employee;
    }

}