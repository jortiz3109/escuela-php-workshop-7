<?php

namespace App\Http\Controllers\Admin;

use App\Constants\ReportStatuses;
use App\Http\Controllers\Controller;
use App\Jobs\ProcessReportJob;
use App\Models\Report;
use App\Reports\ReportBase;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;

class ReportController extends Controller
{
    public function store(Request $request, ReportBase $reportImpl): RedirectResponse
    {
        $report = Report::create([
            'status' => ReportStatuses::CREATED,
            'name' => $request->input('name'),
        ]);

        Bus::chain([
            new ProcessReportJob($report, $reportImpl),
        ])->dispatch();

        return redirect()->route('admin.reports.show', $report);
    }
}
