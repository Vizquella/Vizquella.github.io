<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Motor Trail</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Eagle+Lake&family=Road+Rage&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Vollkorn:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
</head>
<body>

    <header>
        <h1>Bagus Trail</h1>
    </header>

    <nav>
    <ul>
        <li><a href="#home">Home</a></li>
        <li><a href="#tentang">Tentang Saya</a></li>
        <li><a href="admin_login.php">Admin</a></li>
    </ul>
    </nav>


    <main id="home">
        <section class="katalog">
            <h2>Katalog Motor Trail</h2>
            <div class="gallery">
                <div class="box">
                    <img src="DT.jpeg" alt="Kawasaki D-Tracker 150 SE">
                    <h3>Kawasaki D-Tracker</h3>
                    <button class="hamburger" onclick="toggleDetail('detailA')"><a href="#detailA">Lihat Detail</a></button>
                </div>
                <div class="box">
                    <img src="CRF.jpeg" alt="Honda CRF 150L">
                    <h3>Honda CRF 150L</h3>
                    <button class="hamburger" onclick="toggleDetail('detailB')"><a href="#detailB">Lihat Detail</a></button>
                </div>
                <div class="box">
                    <img src="WR.jpeg" alt="Yamaha WR155R">
                    <h3>Yamaha WR155R</h3>
                    <button class="hamburger" onclick="toggleDetail('detailC')"><a href="#detailC" style="text-decoration: none;">Lihat Detail</a></button>
                </div>
            </div>
        </section>

        <section id="detailA" class="detail hidden">
            <h2>Detail Kawasaki D-Tracker</h2>
            <p>Kawasaki D-Tracker 150 SE adalah motor trail yang cocok untuk segala medan. Dengan mesin 150cc, motor ini menawarkan tenaga besar dan kestabilan di medan berat.</p>
        </section>

        <section id="detailB" class="detail hidden">
            <h2>Detail Honda CRF 150L</h2>
            <p>Honda CRF 150L menawarkan kenyamanan dan ketangguhan. Cocok untuk pemula maupun profesional dengan teknologi suspensi terbaik dan mesin 150cc.</p>
        </section>

        <section id="detailC" class="detail hidden">
            <h2>Detail Yamaha WR155R</h2>
            <p>Yamaha WR155R adalah motor trail dengan mesin 155cc yang kuat dan dilengkapi teknologi VVA, memberikan performa unggul di medan off-road dan on-road.</p>
        </section>
        
        <section id="tentang" class="tentang">
            <h2>Tentang Saya</h2>
            <p>Hallo, saya Bagus Setianto. Saya membuat website ini untuk membantu sesama penggemar motor trail mencari informasi terbaru tentang motor trail terbaik.</p>
            <button onclick="openPopup()">Media Sosial</button>
            <button onclick="window.location.href='komentar.php'">Kritik/Saran</button>
            
        </section>
        

    </main>

    <footer>
        <p>&copy; 2024 Bagus Trail. All rights reserved.</p>
    </footer>

    <div id="popupBox" class="popup-box">
        <div class="popup-content">
            <span class="close-btn" onclick="closePopup()">&times;</span>
            <h3 id="popupTitle">Media Sosial</h3>
            <p>Maaf, informasi media sosial belum tersedia saat ini.</p>
        </div>
    </div>


    <script src="script.js"></script>

</body>
</html>

    

    

