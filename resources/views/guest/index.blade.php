<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMKM Digital | Beranda</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f9fafb;
            color: #333;
        }

        /* Navbar */
        nav {
            background: linear-gradient(90deg, #4f46e5, #3b82f6);
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 5%;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        nav .logo {
            font-size: 1.5rem;
            font-weight: 700;
            letter-spacing: 1px;
        }

        nav ul {
            display: flex;
            list-style: none;
        }

        nav ul li {
            margin-left: 2rem;
        }

        nav ul li a {
            text-decoration: none;
            color: #fff;
            font-weight: 500;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: #facc15;
        }

        /* Hero */
        .hero {
            background: linear-gradient(to right, #4f46e5, #3b82f6);
            color: white;
            text-align: center;
            padding: 6rem 2rem;
        }

        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        .hero a {
            background-color: #facc15;
            color: #333;
            padding: 0.8rem 2rem;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: background 0.3s;
        }

        .hero a:hover {
            background-color: #fde047;
        }

        /* About */
        .about {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            padding: 5rem 10%;
            background: #f3f4f6;
        }

        .about-text {
            flex: 1;
            min-width: 300px;
            margin-bottom: 2rem;
        }

        .about-text h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: #111827;
        }

        .about-text p {
            line-height: 1.6;
            color: #4b5563;
        }

        .about img {
            width: 400px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Produk */
        .produk {
            text-align: center;
            padding: 5rem 10%;
        }

        .produk h2 {
            font-size: 2rem;
            margin-bottom: 2rem;
        }

        .produk-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-8px);
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-content {
            padding: 1.5rem;
        }

        .card-content h3 {
            margin-bottom: 0.5rem;
            font-size: 1.2rem;
            color: #111827;
        }

        .card-content p {
            font-size: 0.9rem;
            color: #4b5563;
            margin-bottom: 0.8rem;
        }

        .price {
            color: #4f46e5;
            font-weight: 600;
        }

        /* CTA */
        .cta {
            background: linear-gradient(90deg, #4f46e5, #3b82f6);
            color: #fff;
            text-align: center;
            padding: 4rem 2rem;
        }

        .cta h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .cta a {
            background-color: #facc15;
            color: #333;
            padding: 0.8rem 2rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: background 0.3s;
        }

        .cta a:hover {
            background-color: #fde047;
        }

        /* Footer */
        footer {
            background: #111827;
            color: #9ca3af;
            text-align: center;
            padding: 1.5rem 0;
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            nav ul {
                flex-direction: column;
                position: absolute;
                top: 70px;
                left: 0;
                width: 100%;
                background: #4f46e5;
                display: none;
            }

            nav ul.show {
                display: flex;
            }

            nav ul li {
                margin: 1rem 0;
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav>
        <div class="logo">UMKM Digital</div>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Tentang</a></li>
            <li><a href="#">Produk</a></li>
            <li><a href="#">Testimoni</a></li>
            <li><a href="#">Kontak</a></li>
            <li><a href="{{ route('reservation.index') }}">Log In</a></li>
        </ul>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <h1>Selamat Datang di <span style="color:#facc15;">UMKM Digital</span></h1>
        <p>Tempatnya pelaku UMKM memasarkan produk, mengembangkan bisnis, dan menjangkau pelanggan secara digital!</p>
        <a href="#">Lihat Produk</a>
    </section>

    <!-- About Section -->
    <section class="about">
        <div class="about-text justify">
            <h2>Tentang UMKM Digital – Rental PS
            </h2>
            <p>

                Kami membantu pelaku UMKM rental PlayStation untuk naik kelas melalui transformasi digital. Dengan
                platform ini, pemilik rental PS bisa menampilkan layanan dan fasilitas mereka secara profesional, mulai
                dari paket permainan, pilihan konsol, hingga promo yang sedang berlangsung.

                Melalui keberadaan online yang mudah dan efisien, usaha rental PS dapat menjangkau lebih banyak
                pelanggan, meningkatkan pemesanan, serta membangun brand yang lebih kuat di dunia digital. UMKM Digital
                hadir untuk memastikan bisnis rental PS Anda tetap kompetitif dan terus berkembang di era modern.
            </p>
        </div>
        <img src="{{ asset('img/main.jpg') }}" alt="Tim UMKM Digital">
    </section>

    <!-- Produk Section -->
    <section class="produk">
        <h2>Produk Unggulan</h2>
        <div class="produk-grid">
            <div class="card">
                <img src="{{ asset('img/room1.jpg') }}" alt="Produk 1">
                <div class="card-content">
                    <h3>Kopi Nusantara</h3>
                    <p>Cita rasa kopi lokal pilihan dengan aroma khas Indonesia.</p>
                    <div class="price">Rp50.000</div>
                </div>
            </div>
            <div class="card">
                <img src="{{ asset('img/room2.jpg') }}" alt="Produk 2">
                <div class="card-content">
                    <h3>Kerajinan Kayu</h3>
                    <p>Produk unik dari bahan alami dengan desain khas tradisional.</p>
                    <div class="price">Rp120.000</div>
                </div>
            </div>
            <div class="card">
                <img src="{{ asset('img/room3.jpg') }}" alt="Produk 3">
                <div class="card-content">
                    <h3>Batik Modern</h3>
                    <p>Perpaduan elegan antara motif klasik dan gaya kekinian.</p>
                    <div class="price">Rp250.000</div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="cta">
        <h2>Ingin Bisnismu Tampil di UMKM Digital?</h2>
        <p>Daftarkan usaha kamu sekarang dan jangkau pelanggan lebih luas!</p>
        <a href="#">Daftar Sekarang</a>
    </section>

    <!-- Footer -->
    <footer>
        &copy; 2025 UMKM Digital. Semua hak cipta dilindungi.
    </footer>

</body>
<!-- 🌐 Floating WhatsApp Button 6281234567890 -->
<a href="https://wa.me/628988182167?text=Halo%2C%20saya%20ingin%20bertanya%20tentang%20produk%20Anda"
    class="whatsapp-float" target="_blank" title="Hubungi kami di WhatsApp">
    <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp Logo"
        class="whatsapp-icon">
</a>

<!-- 💅 CSS -->
<style>
    .whatsapp-float {
        position: fixed;
        width: 60px;
        height: 60px;
        bottom: 25px;
        right: 25px;
        background-color: #25D366;
        border-radius: 50%;
        text-align: center;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
        z-index: 999;
        transition: all 0.3s ease-in-out;
    }

    .whatsapp-float:hover {
        background-color: #1ebe5a;
        transform: scale(1.1);
    }

    .whatsapp-icon {
        width: 35px;
        height: 35px;
        margin-top: 12px;
    }
</style>

</html>
