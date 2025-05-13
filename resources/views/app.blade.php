<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- Başlık dinamik olarak Inertia'dan gelecek --}}
        <title inertia>{{ config('app.name', 'Raho') }} - Ücretsiz QR Kod Oluşturucu</title>

        {{-- SEO META ETİKETLERİ --}}
        <meta name="description" content="Raho ile saniyeler içinde ücretsiz QR kod oluşturun. Hızlı, kolay ve güvenli QR oluşturucu.">
        <meta name="keywords" content="QR kod oluştur, ücretsiz QR kod, bedava QR, QR generator, online QR, Raho, Qr, qr, qr kod, karekod, karekod oluştur, free, free qr, qr free 
        kod oluştur, qr create, qr code, qr image, qr online, bedava qr kod, Güvenli Qr, Güvenli Qr Oluşturucu, Karekod">
        <meta name="author" content="Raho">
        <meta name="robots" content="index, follow">

        {{-- Open Graph (Facebook, WhatsApp vs.) --}}
        <meta property="og:title" content="Raho - Ücretsiz QR Kod Oluşturucu">
        <meta property="og:description" content="Raho ile kolayca QR kod oluşturun ve e-posta ile paylaşın. Üstelik tamamen ücretsiz.">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:image" content="{{ asset('images/qr-preview.png') }}">

        {{-- Twitter Card --}}
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Raho - Ücretsiz QR Kod Oluştur">
        <meta name="twitter:description" content="Hızlı ve kolay QR kod oluşturucu. Ücretsiz kullanın.">
        <meta name="twitter:image" content="{{ asset('images/qr-preview.png') }}">

        {{-- Canonical URL --}}
        <link rel="canonical" href="{{ url()->current() }}">

        {{-- Favicon --}}
        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

        {{-- Google Fonts --}}
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        {{-- Inertia & Vite --}}
        @routes
        @viteReactRefresh
        @vite(['resources/js/app.jsx', "resources/js/Pages/{$page['component']}.jsx"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
