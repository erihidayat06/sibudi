<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SIBUDI</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/assets/img/favicon.png" rel="icon">
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
        document.addEventListener('DOMContentLoaded', function() {

            var kecamatanDropdown = document.getElementById('kecamatan');
            var desaDropdown = document.getElementById('desa');

            kecamatanDropdown.addEventListener('change', function() {
                // Panggil endpoint API untuk mendapatkan data desa berdasarkan kecamatan
                var kecamatanId = this.value;

                fetch('http://www.emsifa.com/api-wilayah-indonesia/api/villages/' + kecamatanId +
                        '.json')
                    .then(response => response.json())
                    .then(data => {
                        // Bersihkan dropdown desa
                        desaDropdown.innerHTML = '<option value="">Pilih Desa</option>';

                        // Isi dropdown desa dengan data yang diterima dari API
                        data.forEach(function(desa) {
                            var option = document.createElement('option');
                            option.value = desa.name;
                            option.text = desa.name;
                            desaDropdown.add(option);
                        });
                    });
            });
        });
    </script>

</body>

</html>
