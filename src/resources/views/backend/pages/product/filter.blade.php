<table class="datatables-products table item_table table-hover">
    <thead class="border-top">
    <tr>
        <th>#</th>
        <th>Created At</th>
        <th>Category</th>
        <th>Product Name</th>
        <th> Price</th>
        <th>Discount Price</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($products as $product)
        <tr id="deleteitem_remove_{{ $product->id }}">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $product->created_at->format('d M Y') }}</td>
            <td>{{ $product->category->category_name }}</td>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->discount_price }}</td>
            <td>
                @if ($product->status == 1)
                    <span class="badge bg-label-success">Active</span>
                @else
                    <span class="badge bg-label-danger">Inactive</span>
                @endif
            </td>
            <td>
                <div class="d-inline-block text-nowrap">
                    <a href="{{ route('product.edit', $product->id) }}">
                        <button class="btn btn-sm btn-icon edit-i"><i class="ti ti-edit"></i></button>
                    </a>
                    <button id="confirm-text_{{ $product->id }}" class="btn btn-sm btn-icon delete-record delete-i">
                        <i onClick="deleteConfirmation({{ $product->id }}, '{{ route('product.destroy', $product->id) }}')" class="ti ti-trash"></i>
                    </button>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
