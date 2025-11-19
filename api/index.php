<?php
session_start();
include 'data.php';
/*
|--------------------------------------------------------------------------
| LOGIKA FILTER
|--------------------------------------------------------------------------
|
| 1. Kita ambil data filter dari URL (menggunakan $_GET).
| 2. Jika tidak ada filter di URL (misal: baru buka), kita set default ke 'All'.
|
*/
$activeFilter = $_GET['filter'] ?? 'All';
?>


<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home - Locatera</title>

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
            'locatera-dark': '#374151', // Teks
            'locatera-light-gray': '#9CA3AF', // Teks sekunder
          }
        }
      }
    }
  </script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cantarell:ital,wght@0,400;0,700;1,400;1,700&family=Lilita+One&family=Lobster&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

  <script type_module="text/javascript" src="https://unpkg.com/heroicons@2.1.1/24/outline/index.js"></script>
  <script type_module="text/javascript" src="https://unpkg.com/heroicons@2.1.1/24/solid/index.js"></script>

</head>

<body class="bg-white font-roboto min-h-screen">

  <?php include 'navbar.php'; ?>
  <main class="w-full max-w-7xl mx-auto p-4 sm:p-6 lg:p-8 pb-24 lg:pb-8">

    <header class="flex justify-between items-center mb-4">
      <div class="lg:hidden">
        <h1 class="text-3xl font-extrabold text-locatera-dark font-fontLogo">Locatera</h1>
        <p class="text-xs text-locatera-light-gray mt-1 font-poppins">"Satu Titipan Sejuta Cerita Lokal"</p>
      </div>
      <a href="profile.php">

        <img src="/src/asset/profil.jpg" alt="Profil" class="w-12 h-12 rounded-full"> </a>
    </header>

    <div class="flex gap-2 mb-4">
      <input type="text" placeholder="Search" class="flex-grow px-4 py-3 bg-white border border-gray-200 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-locatera-orange">
      <button class="flex-shrink-0 w-12 h-12 bg-locatera-orange text-white rounded-lg shadow-sm flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
        </svg>
      </button>
    </div>

    <div class="w-full overflow-x-auto whitespace-nowrap py-2 mb-4">
      <a href="index.php?filter=All"
        class="inline-block text-sm font-medium py-2 px-5 rounded-full mr-2 
               <?php echo ($activeFilter == 'All') ? 'bg-locatera-orange text-white' : 'bg-locatera-gray text-locatera-dark'; ?>">
        All
      </a>
      <a href="index.php?filter=Makanan Basah"
        class="inline-block text-sm font-medium py-2 px-5 rounded-full mr-2
               <?php echo ($activeFilter == 'Makanan Basah') ? 'bg-locatera-orange text-white' : 'bg-locatera-gray text-locatera-dark'; ?>">
        Makanan Basah
      </a>
      <a href="index.php?filter=Makanan Kering"
        class="inline-block text-sm font-medium py-2 px-5 rounded-full mr-2
               <?php echo ($activeFilter == 'Makanan Kering') ? 'bg-locatera-orange text-white' : 'bg-locatera-gray text-locatera-dark'; ?>">
        Makanan Kering
      </a>
      <a href="index.php?filter=Minuman"
        class="inline-block text-sm font-medium py-2 px-5 rounded-full mr-2
               <?php echo ($activeFilter == 'Minuman') ? 'bg-locatera-orange text-white' : 'bg-locatera-gray text-locatera-dark'; ?>">
        Minuman
      </a>
    </div>

    <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5"> <?php foreach ($products as $product): ?>

        <?php if ($activeFilter == 'All' || $product['category'] == $activeFilter): ?>

          <a href="product_detail.php?id=<?php echo $product['id']; ?>" class="block bg-white rounded-xl shadow-md overflow-hidden transition-transform duration-300 hover:scale-105">

            <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="w-full h-32 sm:h-40 md:h-48 object-cover">

            <div class="p-3">
              <h3 class="font-bold text-sm text-locatera-dark truncate"><?php echo $product['name']; ?></h3>
              <div class="flex justify-between items-center mt-2">
                <span class="flex items-center text-sm text-locatera-dark">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 text-yellow-500 mr-1">
                    <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.27 1.134-.959 2.036-1.99 1.409L12 18.049l-4.555 2.666c-1.03.628-2.26-.275-1.99-1.409l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.006Z" clip-rule="evenodd" />
                  </svg>
                  <?php echo $product['rating']; ?>
                </span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-locatera-light-gray">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                </svg>
              </div>
            </div>
          </a>

        <?php endif; ?>

      <?php endforeach; ?>

    </div>
  </main>

</body>

</html>