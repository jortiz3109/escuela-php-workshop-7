<?php

namespace Tests\Feature\Admin\Contracts;

use Illuminate\Testing\TestResponse;

interface HasValidationTestsContract
{
    public function performAction(array $data): TestResponse;
}
