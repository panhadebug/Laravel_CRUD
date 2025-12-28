@extends('layouts.app')
@section('title', 'Product List')
@section('content')
<div class="my-3">
  <a href="{{ route('products.create') }}" class="btn btn-primary">Create New</a>
</div>
<table class="table table-hover table-dark">
  <thead class="table-primary">
    <th>PID</th>
    <th>Title</th>
    <th>Qty</th>
    <th>Price</th>
    <th>In Stock</th>
    <th>Actions</th>
  </thead>
  <tbody>
    @foreach($products as $product)
    <tr>
      <td class="col-1">{{ $product->pid }}</td>
      <td>{{ $product->title }}</td>
      <td>{{ $product->qty }}</td>
      <td>{{ $product->price }}</td>
      <td>
        @if( $product->in_stock == 1)
        <span class="badge bg-primary">In Stock</span>
        @else
        <span class="badge bg-danger">Out of stock</span>
        @endif
      </td>
      <td class="col-3">
        <a href="{{ route('products.show', $product->pid) }}" class="btn btn-primary">View</a>
        <a href="{{ route('products.edit', $product->pid) }}" class="btn btn-info">Edit</a>
        <form method="POST" action="{{ route('products.destroy', $product->pid) }}" class="d-inline">
          @csrf
          @method('DELETE')
          <button type="button" class="btn btn-danger btn-delete">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{ $products->links('pagination::bootstrap-5') }}
@endsection