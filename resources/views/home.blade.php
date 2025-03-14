<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RAMADHAN MART - Manajemen Barang Terbaik</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: rgb(43, 121, 223);
            color: #fff;
            background-image: url('https://i.pinimg.com/736x/9b/fa/1e/9bfa1eb9496ea664d124a956f6f1c99c.jpg'), 
                              url('https://i.pinimg.com/736x/00/7a/08/007a08ad4a181acac1202216a38cd85d.jpg');
            background-position: right bottom, left bottom;
            background-repeat: no-repeat;
            background-size: 200px auto, 200px auto;
        }
        .container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            background-color: rgba(74, 74, 74, 0.7); /* Latar belakang semi-transparan */
            padding: 40px; /* Ruang dalam kontainer */
            border-radius: 10px; /* Sudut melengkung */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5); /* Bayangan untuk efek kedalaman */
        }
        h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        p {
            font-size: 1.5rem;
            margin-bottom: 40px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
        }
        a {
            text-decoration: none;
            border: 2px solid #fff;
            color: #fff;
            background-color: rgba(66, 134, 190, 0.47);
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            transition: 0.3s;
        }
        a:hover {
            background-color: #fff;
            color: #11A27B;
        }
        img {
            width: 200px;
            height: 200px;
            margin-bottom: 20px;
        }
        .crescent {
            font-size: 100px;
            color:rgb(255, 255, 255);
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="py-14">
        <div class="container">
            <div class="row">
                <div class="offset-lg-2 col-lg-8 col-md-12 col-12 text-center">
                    <div class="crescent">🌙</div>
                    <!-- heading  -->
                    <h1 class="display-3 mt-4 mb-3 fw-bold">Ramadhan Mart</h1>
                    <!-- para  -->
                    <p class="lead px-lg-8 mb-6">Selamat datang di platform manajemen stok barang. Semoga berkah Ramadhan menyertai kita semua!</p>
                    <a href="/dashboard" class="btn btn-primary">Masuk ke Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>