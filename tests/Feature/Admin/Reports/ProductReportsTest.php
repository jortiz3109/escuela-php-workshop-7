<?php

namespace Tests\Feature\Admin\Reports;

use App\Constants\ReportTypes;
use App\Jobs\ProcessReportJob;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Bus;
use Tests\TestCase;

class ProductReportsTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_export_products(): void
    {
        Bus::fake();
        Product::factory()->count(15)->create();

        $this->post('admin/reports', ['type' => ReportTypes::PRODUCTS, 'name' => 'Products export']);

        Bus::assertDispatched(ProcessReportJob::class);
    }
}
