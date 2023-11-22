<div>
    <h1>Edit transaksi</h1>
    <form action="{{ route('transactions.update', $transaksi->id)}}" method="POST">
        @csrf
        @method('PUT') <!-- Ini menandai bahwa ini adalah permintaan PUT -->
        <label for="customer_id">Customer ID:</label>
        <select id="customer_id" name="customer_id">
            @foreach($customers as $customer)
                <option value="{{ $customer->id }}" {{ $transaksi->customer_id == $customer->id ? 'selected' : '' }}>
                    {{ $customer->id }}.{{ $customer->name }}
                </option>
            @endforeach
        </select>
 
        <label for="product_id">Product</label>
        <select id="product_id" name="product_id">
            @foreach($product as $product)
                <option value="{{ $product->id }}" {{ $transaksi->product_id == $product->id ? 'selected' : '' }}>
                    {{ $product->prdnm }}
                </option>
            @endforeach
        </select>
 
        <label for="total_count">total_count:</label>
        <input type="text" id="total_count" name="total_count" value="{{ $transaksi->total_count }}">
 
        <label for="qty">Quantity:</label>
        <input type="number" id="qty" name="qty" value="{{ $transaksi->qty }}">
 
        <!-- ... tambahkan input lainnya sesuai kebutuhan ... -->
 
        <button type="submit">Simpan</button>
    </form>
</div>
