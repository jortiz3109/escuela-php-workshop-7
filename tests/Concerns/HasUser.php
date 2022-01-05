<?php

namespace Tests\Concerns;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

trait HasUser
{
    public function user(array $params = []): User
    {
        return $this->factory()->create($params);
    }

    private function factory(): Factory
    {
        return User::factory();
    }

    public function disabledUser(array $params = []): User
    {
        return $this->factory()->disabled()->create($params);
    }

    public function enabledUser(array $params = []): User
    {
        return $this->factory()->enabled()->create($params);
    }
}
