<?php
// 1. TANGKAP DATA DARI HALAMAN SEBELUMNYA (checkout.php)
$productName = $_POST['product_name'] ?? 'Produk';
$productPrice = $_POST['product_price'] ?? 0;
$variant = $_POST['selected_variant'] ?? '-';
$qty = $_POST['quantity'] ?? 1;
$subtotal = $_POST['subtotal'] ?? ($productPrice * $qty);

// Data Alamat (Kita simpan lagi di hidden input nanti)
$fullname = $_POST['fullname'] ?? '';
$address = $_POST['address'] ?? '';
$phone = $_POST['phone'] ?? '';

// Data Ongkir
$shippingCost = $_POST['shipping_option'] ?? 15000;

// 2. HITUNG TOTAL
$total = $subtotal + $shippingCost;
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment - Locatera</title>
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

  <div class="w-full max-w-md lg:max-w-5xl bg-white lg:rounded-3xl shadow-xl min-h-[80vh] flex flex-col relative overflow-hidden">

    <div class="w-full max-w-md lg:max-w-5xl bg-white lg:rounded-3xl shadow-xl min-h-[80vh] flex flex-col relative overflow-hidden">

      <div class="bg-white pt-6 px-6 lg:px-10">
        <div class="flex items-center justify-between mb-6">
          <a href="javascript:history.back()" class="p-2 -ml-2 hover:bg-gray-100 rounded-full transition"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 text-locatera-dark">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg></a>
          <h1 class="text-xl font-bold text-locatera-blue">Checkout</h1>
          <div class="w-10"></div>
        </div>

        <div class="flex items-center justify-center gap-4 mb-8">
          <div class="text-locatera-orange"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
              <path fill-rule="evenodd" d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" />
            </svg></div>
          <div class="flex gap-1">
            <div class="w-1 h-1 rounded-full bg-locatera-orange"></div>
            <div class="w-1 h-1 rounded-full bg-locatera-orange"></div>
          </div>

          <div class="bg-orange-100 p-2 rounded-full"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-locatera-orange">
              <path d="M4.5 3.75a3 3 0 0 0-3 3v.75h21v-.75a3 3 0 0 0-3-3h-15Z" />
              <path fill-rule="evenodd" d="M22.5 9.75h-21v7.5a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3v-7.5Zm-18 3.75a.75.75 0 0 1 .75-.75h6a.75.75 0 0 1 0 1.5h-6a.75.75 0 0 1-.75-.75Zm.75 2.25a.75.75 0 0 0 0 1.5h3a.75.75 0 0 0 0-1.5h-3Z" clip-rule="evenodd" />
            </svg></div>
          <div class="flex gap-1">
            <div class="w-1 h-1 rounded-full bg-gray-300"></div>
            <div class="w-1 h-1 rounded-full bg-gray-300"></div>
          </div>

          <div class="text-gray-300"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
              <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
            </svg></div>
        </div>
      </div>

      <form action="success.php" method="POST" class="flex-grow flex flex-col px-6 lg:px-10 pb-10">
        <input type="hidden" name="product_name" value="<?php echo $productName; ?>">
        <input type="hidden" name="total_price" value="<?php echo $total; ?>">

        <div class="grid grid-cols-1 lg:grid-cols-12 lg:gap-12 flex-grow">

          <div class="lg:col-span-7 lg:order-1 order-2">
            <h2 class="text-xl font-bold text-locatera-dark mb-6 mt-6 lg:mt-0">Payment methods</h2>

            <label class="relative block mb-4 cursor-pointer group">
              <input type="radio" name="payment_method" value="credit_card" class="peer sr-only" checked>
              <div class="flex items-center justify-between p-4 rounded-2xl border border-transparent bg-locatera-orange text-white shadow-lg peer-checked:scale-[1.02] transition-all">
                <div class="flex items-center gap-4">
                  <div class="bg-white/20 p-1 rounded w-10 h-6 flex items-center justify-center relative overflow-hidden">
                    <div class="w-4 h-4 bg-red-500 rounded-full absolute left-1 opacity-90"></div>
                    <div class="w-4 h-4 bg-yellow-400 rounded-full absolute right-1 opacity-90"></div>
                  </div>
                  <div>
                    <p class="text-xs font-medium opacity-90">Credit card</p>
                    <p class="text-sm font-bold">5105 **** **** 0505</p>
                  </div>
                </div>
                <div class="w-5 h-5 rounded-full border-2 border-white flex items-center justify-center">
                  <div class="w-2.5 h-2.5 bg-white rounded-full"></div>
                </div>
              </div>
            </label>

            <label class="relative block mb-4 cursor-pointer group">
              <input type="radio" name="payment_method" value="debit_card" class="peer sr-only">
              <div class="flex items-center justify-between p-4 rounded-2xl border border-gray-100 bg-gray-50 text-gray-500 hover:bg-gray-100 transition-all peer-checked:bg-locatera-orange peer-checked:text-white">
                <div class="flex items-center gap-4">
                  <div class="w-10 h-6 flex items-center justify-center font-bold italic text-blue-800 text-lg peer-checked:text-white">VISA</div>
                  <div>
                    <p class="text-xs font-medium">Debit card</p>
                    <p class="text-sm font-bold">3566 **** **** 0505</p>
                  </div>
                </div>
                <div class="w-5 h-5 rounded-full border-2 border-gray-300 peer-checked:border-white flex items-center justify-center">
                  <div class="w-2.5 h-2.5 bg-transparent peer-checked:bg-white rounded-full"></div>
                </div>
              </div>
            </label>
          </div>

          <div class="lg:col-span-5 lg:order-2 order-1">
            <div class="bg-gray-50 lg:bg-white p-4 lg:p-6 rounded-2xl lg:border lg:border-gray-100">
              <h2 class="text-xl font-bold text-locatera-dark mb-4">Order summary</h2>

              <div class="space-y-3 mb-6">
                <div class="flex justify-between text-sm text-gray-500"><span>Produk</span><span class="font-medium text-gray-700"><?php echo $productName; ?> (x<?php echo $qty; ?>)</span></div>
                <div class="flex justify-between text-sm text-gray-500"><span>Harga</span><span class="font-medium text-gray-700"><?php echo number_format($subtotal, 0, ',', '.'); ?></span></div>
                <div class="flex justify-between text-sm text-gray-500"><span>Ongkir</span><span class="font-medium text-gray-700"><?php echo number_format($shippingCost, 0, ',', '.'); ?></span></div>

                <hr class="border-gray-200 my-2">

                <div class="flex justify-between items-center">
                  <span class="font-bold text-locatera-dark">Total:</span>
                  <span class="font-bold text-locatera-dark text-xl"><?php echo number_format($total, 0, ',', '.'); ?></span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="mt-8 pt-6 border-t border-gray-100 lg:border-none flex flex-col lg:flex-row lg:justify-end items-center gap-4">
          <div class="lg:hidden w-full flex justify-between mb-2">
            <p class="text-xs text-gray-400">Total price</p>
            <h3 class="text-2xl font-bold text-locatera-dark"><?php echo number_format($total, 0, ',', '.'); ?></h3>
          </div>
          <button type="submit" class="w-full lg:w-auto bg-locatera-orange text-white font-bold px-12 py-4 rounded-xl shadow-lg hover:bg-orange-600 transition transform active:scale-95 uppercase tracking-wide">
            PESAN SEKARANG
          </button>
        </div>
      </form>
    </div>

</body>

</html>