<?php

namespace App\Reports;

interface ReportContract
{
    public function handle(): void;
}
