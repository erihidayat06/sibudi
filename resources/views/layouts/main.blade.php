<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SIBUDI</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/assets/img/Brebes.jpg" rel="icon">
    <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet">

    {{-- icone bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Nov 17 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    @include('sweetalert::alert')
    @include('layouts.header')

    @include('layouts.sidebar')
    <main id="main" class="main">

        <section>
            @yield('container')
        </section>

    </main><!-- End #main -->
    @include('layouts.footer')


    <script>
        // Load data kecamatan and desa from Laravel config into JavaScript
        var kecamatanOptions = @json(config('kecamatan'));

        // Tambahkan event listener untuk perubahan pada pilihan kecamatan
        document.getElementById('kecamatan').addEventListener('change', function() {
            var selectedKecamatan = this.value;
            var desaSelect = document.getElementById('desa');

            // Hapus semua opsi desa yang sudah ada
            desaSelect.innerHTML = '';

            // Tambahkan opsi desa baru berdasarkan kecamatan yang dipilih
            kecamatanOptions[selectedKecamatan].forEach(function(desa) {
                var option = document.createElement('option');
                option.value = desa;
                option.text = desa;
                desaSelect.add(option);
            });
        });
    </script>




</body>

</html>
