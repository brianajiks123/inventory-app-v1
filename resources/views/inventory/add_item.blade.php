@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-primary text-white">Add Item</div>

                    <div class="card-body">
                        <hr>

                        {{-- Form Add Item --}}
                        <form action="{{ route('item.store') }}" method="post">
                            @csrf
                            <div class="form-group my-3">
                                <div class="row">
                                    <div class="col-md">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Item Name" required>
                                    </div>
                                    <div class="col-md">
                                        <label for="price">Price (Rp)</label>
                                        <input type="number" name="price" id="price" class="form-control"
                                            placeholder="Item Price" min="1" required>
                                    </div>
                                    <div class="col-md">
                                        <label for="stock">Stock</label>
                                        <input type="number" name="stock" id="stock" class="form-control"
                                            placeholder="Item Stock" min="1" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group my-3">
                                <button type="submit" class="btn btn-success">Save</button>
                                <a href="{{ route('item.home') }}" class="btn btn-secondary">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
