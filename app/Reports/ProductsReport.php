<?php

namespace App\Reports;

use App\Constants\ReportStatuses;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use League\Csv\Writer;

class ProductsReport extends ReportBase
{
    public const FIELDS = ['name', 'price'];
    public function handle(): void
    {
        $products = Product::all(self::FIELDS);

        $csv = Writer::createFromString();
        $csv->insertOne(self::FIELDS);
        $csv->insertAll($products->toArray());

        Storage::disk('reports')->append("products/export-{$this->report->id}-{$this->report->created_at->toDateString()}.csv", $csv->toString());

        $this->report->update(['status' => ReportStatuses::FINISHED]);
    }
}
