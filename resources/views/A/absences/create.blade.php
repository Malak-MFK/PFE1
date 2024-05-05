<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une absence</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #000; /* Fond noir */
            color: #fff; /* Texte blanc */
        }
        h1 {
            text-align: center;
            margin-top: 50px;
            color: rgb(167, 43, 8); /* Titre en couleur RGB(167, 43, 8) */
            animation: fadeInDown 1s ease-in-out;
        }
        form {
            width: 50%;
            margin: 0 auto;
            background-color: #333; /* Fond formulaire */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: #fff; /* Texte blanc */
        }
        select, input[type="date"] {
            width: calc(100% - 10px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            background-color: rgb(167, 43, 8); /* Couleur RGB(167, 43, 8) pour les inputs */
            color: #fff; /* Texte blanc */
        }
        button[type="submit"] {
            padding: 10px 20px;
            background-color:  rgb(167, 43, 8); /* Bleu */
            border: none;
            color: #fff; /* Texte blanc */
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #0056b3; /* Bleu foncé */
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
    </style>
</head>
<body>
    <h1>Créer une absence</h1>
    <form action="{{ route('absences.store') }}" method="POST">
        @csrf
        <label for="stagiaire_id">Stagiaire :</label>
        <select name="stagiaire_id" id="stagiaire_id">
            @foreach ($stagiaires as $stagiaire)
                <option value="{{ $stagiaire->id }}">{{ $stagiaire->nom }} {{ $stagiaire->prenom }}</option>
            @endforeach
        </select><br>
        <label for="date_absence">Date d'absence :</label>
        <input type="date" id="date_absence" name="date_absence" required><br>
        <button type="submit">Enregistrer</button>
    </form>
</body>
</html>
