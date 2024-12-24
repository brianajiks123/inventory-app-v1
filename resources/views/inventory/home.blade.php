@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-primary text-white">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <a href="{{ route('item.add') }}" class="btn btn-primary">Add Item</a>
                        <hr>

                        @if ($items->isEmpty())
                            <div class="alert alert-info text-center" role="alert">
                                There are no items available yet.
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Price (Rp)</th>
                                            <th>Stock</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($items as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ number_format($item->price, 2, '.', ',') }}</td>
                                                <td>{{ $item->stock }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href="{{ route('item.edit', $item->id) }}" class="btn btn-warning btn-sm mx-1">Edit</a>
                                                        <form action="{{ route('item.delete', $item->id) }}" method="post"
                                                            onsubmit="return confirm('Are you sure delete this item?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-danger btn-sm">Delete</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
