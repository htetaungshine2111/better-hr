<?php

namespace App\GraphQL\Queries;

use App\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Illuminate\Support\Facades\Hash;
use Exception;

class UserQuery extends Query
{
    protected $attributes = [
        'name' => 'user',
    ];

    public function type() : Type
    {
        return GraphQL::type('User');
    }

    public function args() : array
    {
        return [
            'email' => [
                'name' => 'email',
                'type' => Type::string(),
                'rules' => ['required']
            ],
            'password' => [
                'name' => 'password',
                'type' => Type::string(),
                'rules' => ['required']
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $user = User::where('email', $args['email'])->first();
        if ($user && Hash::check($args['password'], $user->password)) {
            $user['token'] = $user->createToken('better hr')->accessToken;
            return $user;
        }
        throw new Exception('Error login');
        return null;

    }
}