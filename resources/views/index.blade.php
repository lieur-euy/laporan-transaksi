<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="antialiased max-w-7xl">
        <br />
        <a class="p-3 bg-blue-500 rounded-lg" href="/transaksi/create">Create Transaksi</a>
        <br />
        <br />

        <h1 class="Text-3xl font-bold">tabel transaksi</h1>
        <table class="border-collapse border border-slate-500 w-full">
            <thead>
                <tr>
                    <th scope="col" class="border border-slate-600 bg-blue-400">ID</th>
                    <th scope="col"  class="border border-slate-600 bg-blue-400">Invoice Number</th>
                    <th scope="col"  class="border border-slate-600 bg-blue-400">Customer Name</th>
                    <th scope="col"  class="border border-slate-600 bg-blue-400">qty</th>
                    <th scope="col"  class="border border-slate-600 bg-blue-400">Total Amount</th>
                    <th scope="col"  class="border border-slate-600 bg-blue-400">Product Detail</th>
                    <th scope="col"  class="border border-slate-600 bg-blue-400">Invoice Date</th>
                    <!-- Tambahkan kolom lain jika diperlukan -->
                </tr>
            </thead>
            <tbody>
                @foreach ($formattedTransactions as $transaction)
                <tr>
                    <td  class="border border-slate-700">{{ $transaction['id'] }}</td>
                    <td  class="border border-slate-700">{{ $transaction['invoice_number'] }}</td>
                    <td  class="border border-slate-700">{{ $transaction['customer_name'] }}</td>
                    <td  class="border border-slate-700">{{ $transaction['qty'] }}</td>
                    <td  class="border border-slate-700">{{ $transaction['total_amount'] }}</td>
                    <td  class="border border-slate-700">{{ $transaction['product_detail'] }}</td>
                    <td  class="border border-slate-700">{{ $transaction['invoice_date'] }}</td>
                    <!-- Tambahkan sel lain jika diperlukan -->
                </tr>
                @endforeach
            </tbody>
        </table>
        <br/>
        
        <br/>
   
        <a class="p-3 bg-blue-500 rounded-lg" href="/product/create">Create Produk</a>
        <br />
        <br />
        <h1 class="Text-3xl font-bold ">tabel Produk</h1>
        <table class="border-collapse border border-slate-500 w-full">
            <thead>
                <tr>
                    <th scope="col" class="border border-slate-600 bg-blue-400"> </th>
                    <th scope="col"  class="border border-slate-600 bg-blue-400">prdnm</th>
                    <th scope="col"  class="border border-slate-600 bg-blue-400">harga</th>
                    <!-- Tambahkan kolom lain jika diperlukan -->
                </tr>
            </thead>
            <tbody>
                @foreach ($dataproducts as $produk)
                <tr>
                    <td  class="border border-slate-700">{{ $produk['id'] }}</td>
                    <td  class="border border-slate-700">{{ $produk['prdnm'] }}</td>
                    <td  class="border border-slate-700">{{ $produk['harga'] }}</td>
       
                    <!-- Tambahkan sel lain jika diperlukan -->
                </tr>
                @endforeach
            </tbody>
        </table>

   

        <br/>
   
        <a class="p-3 bg-blue-500 rounded-lg" href="/customer/create">Create customer</a>
        <br />
        <br />
        <h1 class="Text-3xl font-bold ">Customer</h1>
        <table class="border-collapse border border-slate-500 w-full">
            <thead>
                <tr>
                    <th scope="col" class="border border-slate-600 bg-blue-400"> </th>
                    <th scope="col"  class="border border-slate-600 bg-blue-400">customer</th>

                    <!-- Tambahkan kolom lain jika diperlukan -->
                </tr>
            </thead>
            <tbody>
                @foreach ($datacustomer as $customer)
                <tr>
                    <td  class="border border-slate-700">{{ $customer['id'] }}</td>
                    <td  class="border border-slate-700">{{ $customer['name'] }}</td>

                    <!-- Tambahkan sel lain jika diperlukan -->
                </tr>
                @endforeach
            </tbody>
        </table>

        <br/>
        <h1 class="Text-3xl font-bold ">Laporan Transaksi</h1>
        <table class="border-collapse border border-slate-500 w-full">
            <thead>
                <tr>
                    <th scope="col" class="border border-slate-600 bg-blue-400">bnsperiod</th>
                    <th scope="col"  class="border border-slate-600 bg-blue-400">invoice_number</th>
                    <th scope="col"  class="border border-slate-600 bg-blue-400">invoice_date</th>
                    <th scope="col"  class="border border-slate-600 bg-blue-400">customer</th>
                    <th scope="col"  class="border border-slate-600 bg-blue-400">prdnm</th>
                    <th scope="col"  class="border border-slate-600 bg-blue-400">qty</th>
                    <th scope="col"  class="border border-slate-600 bg-blue-400">harga</th>
                    <!-- Tambahkan kolom lain jika diperlukan -->
                </tr>
            </thead>
            <tbody>
                @foreach ($formattedLaporanTransactions as $laporan)
                <tr>
                    <td  class="border border-slate-700">{{ $laporan['invoice_date'] }}</td>
                    <td  class="border border-slate-700">{{ $laporan['invoice_number'] }}</td>
                    <td  class="border border-slate-700">{{ $laporan['invoice_date'] }}</td>
                    <td  class="border border-slate-700">{{ $laporan['customer_name'] }}</td>
                    <td  class="border border-slate-700">{{ $laporan['product_detail'] }}</td>
                    <td  class="border border-slate-700">{{ $laporan['qty'] }}</td>
                    <td  class="border border-slate-700">{{ $laporan['total_amount'] }}</td>
       
                    <!-- Tambahkan sel lain jika diperlukan -->
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>
