<?php

namespace App\ViewModels\Concerns;

use Illuminate\Contracts\Pagination\Paginator;

trait HasPaginator
{
    private Paginator $collection;

    public function collection(Paginator $collection): self
    {
        $this->collection = $collection;
        return $this;
    }
}
