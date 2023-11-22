<div>
   <h1>Msdadsa</h1>
   <form action="{{ route('transactions.store') }}" method="POST">
    @csrf 
    <label for="customer_id">Customer ID:</label>
    <select id="customer_id" name="customer_id">
        @foreach($customers as $customer)
            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
            <!-- Ganti 'name' dengan atribut yang sesuai untuk menampilkan nama customer -->
        @endforeach
    </select>

    <label for="product_id">Product</label>
    <select id="product_id" name="product_id">
        @foreach($product as $product)
            <option value="{{ $product->id }}">{{ $product->prdnm }}</option>
            <!-- Ganti 'name' dengan atribut yang sesuai untuk menampilkan nama customer -->
        @endforeach
    </select>

    <label for="total_count">total_count:</label>
    <input type="text" id="total_count" name="total_count">


    <label for="qty">Quantity:</label>
    <input type="number" id="qty" name="qty">

    <!-- ... tambahkan input lainnya sesuai kebutuhan ... -->

    <button type="submit">Simpan</button>
</form>

</div>
