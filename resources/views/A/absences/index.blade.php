<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des absences</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #0d0000;
        }
        h1 {
            text-align: center;
            margin-top: 50px;
            color: rgb(167, 43, 8); /* Couleur RGB(167, 43, 8) */
            animation: fadeInDown 1s ease-in-out;
        }
        ul {
            list-style: none;
            padding: 0;
            margin: 0;
            width: 50%;
            margin: 0 auto;
        }
        li {
            background-color: #fff;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            animation: fadeInUp 1s ease-in-out;
        }

        /* Animation */
        @keyframes fadeInDown {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <h1>Liste des absences</h1>
    <ul>
        @foreach ($absences as $absence)
            <li>{{ $absence->stagiaire->nom }} {{ $absence->stagiaire->prenom }} - {{ $absence->date }}</li>
        @endforeach
    </ul>
</body>
</html>
