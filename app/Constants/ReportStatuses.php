<?php

namespace App\Constants;

use Illuminate\Contracts\Support\Arrayable;

class ReportStatuses implements Arrayable
{
    public const CREATED = 'created';
    public const IN_PROCESS = 'in_process';
    public const FINISHED = 'finished';
    public const FAILED = 'failed';
    public function toArray(): array
    {
        return [
            self::CREATED,
            self::IN_PROCESS,
            self::FINISHED,
            self::FAILED
        ];
    }
}
