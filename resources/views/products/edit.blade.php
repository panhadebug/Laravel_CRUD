@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm rounded-4">
                <div class="card-header bg-info bg-gradient text-dark rounded-top-4">
                    <h5 class="mb-0">Edit Product</h5>
                </div>

                <div class="card-body">
                    <form method="POST"
                          action="{{ route('products.update', $product->pid) }}"
                          class="needs-validation">
                        @csrf
                        @method('PUT')

                        {{-- Product ID --}}
                        <div class="mb-3">
                            <label for="pidText" class="form-label fw-semibold">Product ID</label>
                            <input type="text"
                                   value="{{ $product->pid }}"
                                   readonly
                                   name="pid"
                                   id="pidText"
                                   class="form-control bg-light">
                        </div>

                        {{-- Title --}}
                        <div class="mb-3">
                            <label for="titleText" class="form-label fw-semibold">Title</label>
                            <input type="text"
                                   value="{{ $product->title }}"
                                   name="title"
                                   id="titleText"
                                   class="form-control"
                                   placeholder="Enter title">
                        </div>

                        {{-- Qty & Price --}}
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="qtyText" class="form-label fw-semibold">Quantity</label>
                                <input type="number"
                                       min="0"
                                       max="1000"
                                       value="{{ $product->qty }}"
                                       name="qty"
                                       id="qtyText"
                                       class="form-control"
                                       placeholder="Enter quantity">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="priceText" class="form-label fw-semibold">Price</label>
                                <input type="number"
                                       min="0"
                                       max="1000"
                                       step="0.01"
                                       value="{{ $product->price }}"
                                       name="price"
                                       id="priceText"
                                       class="form-control"
                                       placeholder="Enter price">
                            </div>
                        </div>

                        {{-- In Stock --}}
                        <div class="mb-4">
                            <label for="in_stockText" class="form-label fw-semibold">Stock Status</label>
                            <select name="in_stock"
                                    id="in_stockText"
                                    class="form-select">
                                <option value="1" {{ $product->in_stock == 1 ? 'selected' : '' }}>
                                    In Stock
                                </option>
                                <option value="0" {{ $product->in_stock == 0 ? 'selected' : '' }}>
                                    Out of Stock
                                </option>
                            </select>
                        </div>

                        {{-- Actions --}}
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('products.index') }}"
                               class="btn btn-outline-secondary">
                                ← Back
                            </a>

                            <button type="submit"
                                    class="btn btn-success px-4">
                                Update Product
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
