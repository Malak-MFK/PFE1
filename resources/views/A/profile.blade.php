<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil du formateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            font-family: "Lato", sans-serif;
            background-color: #000;
            margin: 0;
            padding: 0;
            transition: background-color 0.5s;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
            color:  rgb(170, 73, 9);
            animation: fadeInDown 1s ease;
        }

        .info-container {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.1);
            padding: 30px;
            margin: 20px auto;
            max-width: 600px;
            animation: slideInUp 1s ease;
        }

        .info-container img {
            display: block;
            margin: 0 auto 20px;
            border-radius: 50%;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
            animation: pulse 1.5s infinite alternate;
        }

        p {
            color: #fff;
            text-align: center;
        }

        a {
            display: block;
            margin-top: 20px;
            color: #fff;
            text-decoration: none;
            background-color: rgb(170, 73, 9);
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s;
            animation: fadeIn 1s ease;
        }

        a:hover {
            background-color: rgba(0, 123, 255, 1);
            transform: scale(1.05);
        }

        @keyframes fadeInDown {
            0% { opacity: 0; transform: translateY(-50px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideInUp {
            0% { opacity: 0; transform: translateY(50px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            100% { transform: scale(1.05); }
        }

        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }
    </style>
</head>
<body>
    <h1>Profil de {{ $formateurs->prenom }} {{ $formateurs->nom }}</h1>
    <a href="formateurs/1/emploi"><button>Return</button></a>
    <div class="info-container">
        <img src="{{ asset($formateurs->photo) }}" alt="Photo du formateur" width="150">
        <p><strong>{{ $formateurs->prenom }} {{ $formateurs->nom }}</strong><br>
            2022-2024 <br>
            {{ $formateurs->role }}<br>
            {{ $formateurs->email }}<br>
        </p>
        <a href="/liste-stagiaires">Notes</a>
        <a href="/abscence">Abscence</a>
        <a href="/stagiaires">Rapport disciplinaire</a>
    </div>
</body>
</html>
