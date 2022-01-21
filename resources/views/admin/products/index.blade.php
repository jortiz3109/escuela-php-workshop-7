@extends('layouts.app')
@push('main')
    <section class="hero is-small is-primary">
        <div class="hero-body">
            <p class="title">
                {{ $texts['title'] }}
            </p>
            <form action="{{ route('admin.reports.store') }}" method="post">
                @csrf
                <input type="hidden" name="type" value="{{ \App\Constants\ReportTypes::PRODUCTS }}">
                <input type="hidden" name="name" value="Products export">
                <button class="button is-success" type="submit">Export</button>
            </form>
        </div>
    </section>
    <div class="container mt-3">
        <div class="box">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">{{ trans('admin.products.fields.code') }}</th>
                    <th scope="col">{{ trans('admin.products.fields.name') }}</th>
                    <th scope="col">{{ trans('admin.products.fields.price') }}</th>
                    <th scope="col">{{ trans('admin.products.fields.description') }}</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td class="is-family-monospace">{{ $product->code }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                            <button @click="$emit('delete-item', { route: '{{ route('admin.products.destroy', $product) }}'})" class="button is-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <delete-component
        title="{{ trans('admin.products.messages.delete.title') }}"
        message="{{ trans('admin.products.messages.delete.message') }}"
        confirm-text="{{ trans('admin.products.messages.delete.confirm-text') }}"
        cancel-text="{{ trans('admin.products.messages.delete.cancel-text') }}"
    >
        @csrf
        @method('DELETE')
    </delete-component>
@endpush
