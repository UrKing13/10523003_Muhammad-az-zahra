<?php
$biodata = [
    "Nama" => "Muhammad az-zahra",
    "Alamat" => "Jl.merawan no 1153",
    "Tanggal Lahir" => "Palembang 13 September 2001", 
    "Hobi" => "Bermain Sepakbola",
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muhammad az-zahra</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f3f3f3;
            color: #333;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        .biodata {
            max-width: 700px;
            margin: 50px auto;
            padding: 30px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
            transform: translateY(0);
            transition: transform 0.3s ease-in-out;
        }

        .biodata:hover {
            transform: translateY(-10px);
        }

        .biodata h1 {
            font-size: 32px;
            color: #2c3e50;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .biodata ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .biodata li {
            margin-bottom: 12px;
            font-size: 18px;
        }

        .biodata li strong {
            color: #007bff;
            font-weight: 500;
        }

        .biodata img {
            max-width: 150px;
            height: auto;
            border-radius: 50%;
            margin-bottom: 20px;
            border: 4px solid #007bff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        .back-button {
            margin-top: 20px;
        }

        .back-button a {
            padding: 12px 25px;
            background-color: #007bff;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .back-button a:hover {
            background-color: #0056b3;
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            .biodata {
                padding: 20px;
            }
            .biodata h1 {
                font-size: 28px;
            }
            .biodata li {
                font-size: 16px;
            }
            .biodata img {
                max-width: 120px;
            }
        }

        @media (max-width: 480px) {
            .biodata {
                padding: 15px;
            }
            .biodata h1 {
                font-size: 24px;
            }
            .biodata li {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="biodata">
        <img src="aza.jpg" alt="Foto Saya">
        <h1>Muhammad Az-zahra</h1>
        <ul>
            <?php foreach ($biodata as $key => $value): ?>
                <li><strong><?php echo htmlspecialchars($key); ?>:</strong> <?php echo htmlspecialchars($value); ?></li>
            <?php endforeach; ?>
        </ul>
        <div class="back-button">
            <a href="./?adm=mahasiswa">Kembali</a>
        </div>
    </div>
</body>
</html>
