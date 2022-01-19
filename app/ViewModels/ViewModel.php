<?php

namespace App\ViewModels;

use Illuminate\Contracts\Support\Arrayable;

abstract class ViewModel implements Arrayable
{
    public function toArray(): array
    {
        return ['buttons' => $this->buttons(), 'texts' => $this->texts(), 'fields' => $this->fields(),] + $this->data();
    }

    abstract protected function buttons(): array;

    protected function texts(): array
    {
        return ['title' => $this->title(),];
    }

    abstract protected function title(): string;

    protected function fields(): array
    {
        return [];
    }

    abstract protected function data(): array;
}
