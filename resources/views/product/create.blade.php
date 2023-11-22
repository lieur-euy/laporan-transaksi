<div>
    <h1>Create Product</h1>
    <form action="{{ route('product.store') }}" method="POST">
     @csrf 

 
     <label for="prdnm">nama product(prdnm):</label>
     <input type="text" id="prdnm" name="prdnm">
     <label for="harga">harga :</label>
     <input type="number" id="harga" name="harga">
     <!-- ... tambahkan input lainnya sesuai kebutuhan ... -->
 
     <button type="submit">Simpan</button>
 </form>
 
 </div>
 