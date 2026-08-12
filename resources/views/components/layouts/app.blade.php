<!DOCTYPE html>
<html class="scroll-smooth" data-theme="corporate" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'WFNS 2027' }}</title>
    <meta name="description" content="The 20th World Congress of Neurosurgery - One world, one neurosurgery, The Bali Renaissance" />
    <meta name="keywords" content="wfns, Bali, International, Neurosurgeon, Neurosurgery" />
    <meta name="author" content="AV-PRO" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <!-- favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!--FontAwesome CSS-->
    <script src="https://kit.fontawesome.com/f662ae2afd.js" crossorigin="anonymous"></script>
    <!-- daisy ui -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <link href="https://cdn.jsdelivr.net/npm/daisyui@5/themes.css" rel="stylesheet" type="text/css" />

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-PR7VG6BSKR"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-PR7VG6BSKR');
    </script>

</head>

<body>
    <x-section.header />
    {{ $slot }}
    <x-section.footer />

    <!-- Back-to-top Button start -->
    <button onclick="topFunction()" id="back-to-top"
        class="fixed rounded z-10 bottom-5 end-5 bg-primary border-none shadow-none text-white btn btn-sm hover:scale-105">
        <i class="fa-solid fa-angles-up"></i>
    </button>
    <!-- Back-to-top Button end -->

    <script src="assets/js/custom.js" data-navigate-once></script>
</body>

</html>