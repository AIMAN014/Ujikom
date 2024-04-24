<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: linear-gradient(120deg, #333 50%, #fff 80%);
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 0 10px #fff;
            padding: 20px;
        }

        .profile {
            text-align: center;
            padding: 20px;
        }

        .profile img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #fff;
            box-shadow: 0 0 10px #333;
            transition: transform 0.3s ease-in-out;
        }

        .profile img:hover {
            transform: rotate(360deg) scale(1.1); /* Tambahkan scaling saat hover */
        }

        .profile h1 {
            margin: 10px 0;
            color: #333;
        }

        .profile p {
            margin: 5px 0;
            color: #666;
        }

        .profile a {
            text-decoration: none;
            color: #007bff;
            margin: 0 10px;
            transition: color 0.3s ease-in-out;
            font-size: 20px; /* Tambahkan ukuran font yang lebih besar */
        }

        .profile a:hover {
            color: #0056b3;
            transform: scale(1.2); /* Tambahkan scaling saat hover */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="profile">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQtp8YnDQdwhlzfXl2MfREIKrnnKrO9FS43Uw&usqp=CAU" alt="Profile Picture">
            <h1>Aiman Fathurrahman Effendi S.</h1>
            <p>Email: a.fathurrahman1403@gmail.com</p>
            <p>Location: Indonesia, IND</p>
            <p>Interests: Traveling</p>
            <div>
                <a href="https://www.facebook.com/?locale=id_ID" class="fab fa-facebook-f"></a>
                <a href="https://web.whatsapp.com/" class="fab fa-whatsapp"></a>
                <a href="https://www.instagram.com/" class="fab fa-instagram"></a>
            </div>
        </div>
    </div>
</body>

</html>
