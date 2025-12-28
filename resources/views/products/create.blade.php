@extends('layouts.app')

@section('title', 'Create Product')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm rounded-4">
                <div class="card-header bg-primary text-white rounded-top-4">
                    <h5 class="mb-0">Create New Product</h5>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('products.store') }}" class="needs-validation">
                        @csrf

                        <div class="mb-3">
                            <label for="titleText" class="form-label fw-semibold">Product Title</label>
                            <input
                                type="text"
                                name="title"
                                id="titleText"
                                class="form-control form-control-lg"
                                placeholder="Enter product title"
                                required
                            >
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="qtyText" class="form-label fw-semibold">Quantity</label>
                                <input
                                    type="number"
                                    min="0"
                                    max="1000"
                                    name="qty"
                                    id="qtyText"
                                    class="form-control"
                                    placeholder="Enter quantity"
                                    required
                                >
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="priceText" class="form-label fw-semibold">Price ($)</label>
                                <input
                                    type="number"
                                    min="0"
                                    max="5000"
                                    step="0.01"
                                    name="price"
                                    id="priceText"
                                    class="form-control"
                                    placeholder="Enter price"
                                    required
                                >
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="in_stock" class="form-label fw-semibold">Stock Status</label>
                            <select name="in_stock" id="in_stock" class="form-select" required>
                                <option value="">-- Select Stock --</option>
                                <option value="1">In Stock</option>
                                <option value="0">Out of Stock</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                                ← Back
                            </a>
                            <button type="submit" class="btn btn-primary px-4">
                                Save Product
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
