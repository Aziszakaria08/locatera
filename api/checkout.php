<?php
// 1. Tangkap Data dari Halaman Sebelumnya (Product Detail / Modal)
// Jika user membuka langsung tanpa order, kita set default kosong/dummy.
$productName = $_POST['product_name'] ?? 'Produk';
$productPrice = $_POST['product_price'] ?? 0;
$variant = $_POST['selected_variant'] ?? '-';
$qty = $_POST['quantity'] ?? 1;

// Hitung Subtotal Produk
$subtotal = $productPrice * $qty;
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout - Locatera</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            'sans': ['Cantarell', 'sans-serif'],
            'header': ['Lilita One', 'cursive'],
            'fontLogo': ['Lobster', 'cursive'],
            'roboto': ['Roboto', 'sans-serif'],
            'poppins': ['Poppins', 'sans-serif'],
          },
          colors: {
            // Definisikan warna utama dari design
            'locatera-orange': '#FF9D3D', // Oranye untuk tombol, nav, dll.
            'locatera-gray': '#F3F4F6', // Latar belakang tombol filter
            'locatera-dark': '#202020', // Teks
            'locatera-gray': '#6A6A6A', // Teks sekunder
            'locatera-blue': '#001833', // Teks sekunder
          }
        }
      }
    }
  </script>
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cantarell:ital,wght@0,400;0,700;1,400;1,700&family=Lilita+One&family=Lobster&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

</head>

<body class="bg-gray-50 font-poppins min-h-screen flex flex-col items-center py-8 px-4">

  <div class="w-full max-w-md lg:max-w-3xl bg-white lg:rounded-3xl shadow-xl min-h-[80vh] flex flex-col relative overflow-hidden">

    <div class="bg-white pt-6 pb-2 px-6 lg:px-10">
      <div class="flex items-center justify-between mb-6">
        <a href="javascript:history.back()" class="p-2 -ml-2 hover:bg-gray-100 rounded-full transition">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 text-locatera-dark">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
          </svg>
        </a>
        <h1 class="text-xl font-bold text-locatera-blue">Checkout</h1>
        <div class="w-10"></div>
      </div>

      <div class="flex items-center justify-center gap-4 mb-4">
        <div class="flex flex-col items-center">
          <div class="bg-orange-100 p-2 rounded-full mb-1"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-locatera-orange">
              <path fill-rule="evenodd" d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" />
            </svg></div>
        </div>
        <div class="flex gap-1">
          <div class="w-1 h-1 rounded-full bg-gray-300"></div>
          <div class="w-1 h-1 rounded-full bg-gray-300"></div>
          <div class="w-1 h-1 rounded-full bg-gray-300"></div>
        </div>
        <div class="text-gray-300"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
            <path d="M4.5 3.75a3 3 0 0 0-3 3v.75h21v-.75a3 3 0 0 0-3-3h-15Z" />
            <path fill-rule="evenodd" d="M22.5 9.75h-21v7.5a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3v-7.5Zm-18 3.75a.75.75 0 0 1 .75-.75h6a.75.75 0 0 1 0 1.5h-6a.75.75 0 0 1-.75-.75Zm.75 2.25a.75.75 0 0 0 0 1.5h3a.75.75 0 0 0 0-1.5h-3Z" clip-rule="evenodd" />
          </svg></div>
        <div class="flex gap-1">
          <div class="w-1 h-1 rounded-full bg-gray-300"></div>
          <div class="w-1 h-1 rounded-full bg-gray-300"></div>
          <div class="w-1 h-1 rounded-full bg-gray-300"></div>
        </div>
        <div class="text-gray-300"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
          </svg></div>
      </div>
    </div>

    <form action="payment.php" method="POST" class="px-6 lg:px-10 pb-10 flex-grow flex flex-col">

      <input type="hidden" name="product_name" value="<?php echo $productName; ?>">
      <input type="hidden" name="product_price" value="<?php echo $productPrice; ?>">
      <input type="hidden" name="selected_variant" value="<?php echo $variant; ?>">
      <input type="hidden" name="quantity" value="<?php echo $qty; ?>">
      <input type="hidden" name="subtotal" value="<?php echo $subtotal; ?>">

      <h2 class="text-xl font-bold text-locatera-dark mb-6">Billing address</h2>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-x-8">

        <div class="group lg:col-span-2">
          <label class="block text-xs text-gray-400 mb-1">Nama Lengkap</label>
          <input type="text" name="fullname" value="" class="w-full border-b border-gray-200 py-2 text-locatera-dark font-medium focus:outline-none focus:border-locatera-orange transition-colors" required>
        </div>

        <div class="lg:col-span-2">
          <label class="block text-xs text-gray-400 mb-1">Alamat</label>
          <input type="text" name="address" value="" class="w-full border-b border-gray-200 py-2 text-locatera-dark font-medium text-sm truncate focus:outline-none focus:border-locatera-orange transition-colors" required>
        </div>

        <div class="relative">
          <label class="block text-xs text-gray-400 mb-1">Provinsi</label>
          <select name="province" class="w-full appearance-none bg-transparent border-b border-gray-200 py-2 text-locatera-dark font-medium text-sm focus:outline-none focus:border-locatera-orange">
            <option value="DKI Jakarta" selected>DKI Jakarta</option>
            <option value="Jawa Barat">Jawa Barat</option>
            <option value="Jawa Tengah">Jawa Tengah</option>
            <option value="Jawa Timur">Jawa Timur</option>
            <option value="DI Yogyakarta">DI Yogyakarta</option>
            <option value="Banten">Banten</option>
            <option value="Kalimantan Selatan">Kalimantan Selatan</option>
            <option value="Kalimantan Timur">Kalimantan Timur</option>
            <option value="Kalimantan Utara">Kalimantan Utara</option>
            <option value="Kalimantan Barat">Kalimantan Barat</option>
            <option value="Kalimantan Tengah">Kalimantan Tengah</option>
            <option value="Sumatera Barat">Sumatera Barat</option>
            <option value="Banda Aceh">Banda Aceh</option>
            <option value="Sumatera Utara">Sumatera Utara</option>
            <option value="Sumatera Selatan">Sumatera Selatan</option>
            <option value="Sulawesi Selatan">Sulawesi Selatan</option>
            <option value="Sulawesi Tengah">Sulawesi Tengah</option>
            <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
            <option value="Sulawesi Barat">Sulawesi Barat</option>
            <option value="Bengkulu">Bengkulu</option>
            <option value="Lampung">Lampung</option>
            <option value="Jambi">Jambi</option>
            <option value="Riau">Riau</option>
            <option value="Bali">Bali</option>
            <option value="NTB">NTB</option>
            <option value="NTT">NTT</option>
          </select>
        </div>

        <div>
          <label class="block text-xs text-gray-400 mb-1">Pos Kode</label>
          <input type="text" name="zipcode" value="" class="w-full border-b border-gray-200 py-2 text-locatera-dark font-medium focus:outline-none focus:border-locatera-orange transition-colors">
        </div>

        <div>
          <label class="block text-xs text-gray-400 mb-1">Nomor Telepon</label>
          <input type="tel" name="phone" value="" class="w-full border-b border-gray-200 py-2 text-locatera-dark font-medium focus:outline-none focus:border-locatera-orange transition-colors" required>
        </div>

        <div class="relative">
          <label class="block text-xs text-gray-400 mb-1">Opsi Pengiriman</label>
          <select name="shipping_option" class="w-full appearance-none bg-transparent border-b border-gray-200 py-2 text-locatera-dark font-medium text-sm focus:outline-none focus:border-locatera-orange">
            <option value="15000" selected>Reguler (+ Rp. 15.000)</option>
            <option value="13000">Hemat (+ Rp. 13.000)</option>
            <option value="22500">Kargo (+ Rp. 22.500)</option>
            <option value="25000">Kilat (+ Rp. 25.000)</option>
          </select>
        </div>
      </div>

      <div class="flex items-start mt-8 mb-8">
        <div class="flex items-center h-5">
          <input id="save_address" type="checkbox" class="w-5 h-5 text-locatera-orange rounded focus:ring-locatera-orange accent-locatera-orange" checked>
        </div>
        <div class="ml-3 text-xs lg:text-sm">
          <label for="save_address" class="font-medium text-gray-400">Simpan detail alamat ini</label>
        </div>
      </div>

      <button type="submit" class="mt-auto lg:mt-8 w-full bg-locatera-orange text-white font-bold text-lg py-4 rounded-full shadow-lg hover:bg-orange-600 transition transform active:scale-95">
        Lanjut ke Pembayaran
      </button>

    </form>
  </div>

</body>

</html>