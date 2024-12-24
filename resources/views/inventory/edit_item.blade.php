@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-primary text-white">Edit Item</div>

                    <div class="card-body">
                        <hr>

                        @if ($item)
                            {{-- Form Update Item --}}
                            <form action="{{ route('item.update') }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group my-3">
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <div class="row">
                                        <div class="col-md">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" id="name" class="form-control"
                                                placeholder="Item Name" value="{{ $item->name }}" required>
                                        </div>
                                        <div class="col-md">
                                            <label for="price">Price (Rp)</label>
                                            <input type="number" name="price" id="price" class="form-control"
                                                placeholder="Item Price" min="1" value="{{ $item->price }}"
                                                required>
                                        </div>
                                        <div class="col-md">
                                            <label for="stock">Stock</label>
                                            <input type="number" name="stock" id="stock" class="form-control"
                                                placeholder="Item Stock" min="1" value="{{ $item->stock }}"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group my-3">
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <a href="{{ route('item.home') }}" class="btn btn-secondary">Back</a>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
