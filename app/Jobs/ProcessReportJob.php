<?php

namespace App\Jobs;

use App\Models\Report;
use App\Reports\ReportBase;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessReportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private ReportBase $reportImpl;
    private Report $report;

    public $backoff = 3;

    public function __construct(Report $report, ReportBase $reportImpl)
    {
        $this->reportImpl = $reportImpl;
        $this->report = $report;
    }

    public function handle(): void
    {
        $this->reportImpl->setReport($this->report)->handle();
    }
}
