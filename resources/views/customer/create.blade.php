<div>
    <h1>Create customer</h1>
    <form action="{{ route('customer.store') }}" method="POST">
     @csrf 

 
     <label for="name">nama Customer:</label>
     <input type="text" id="name" name="name">
 
     <!-- ... tambahkan input lainnya sesuai kebutuhan ... -->
 
     <button type="submit">Simpan</button>
 </form>
 
 </div>
 