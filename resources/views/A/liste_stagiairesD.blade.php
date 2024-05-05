<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Stagiaires</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(0, 0, 0);
            color: #fff;
            margin: 0;
            padding: 0;
            animation: fadeIn ease 1s;
        }

        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            color: #fff;
            animation: slideInDown ease 1s;
        }

        @keyframes slideInDown {
            0% {
                transform: translateY(-100%);
            }
            100% {
                transform: translateY(0);
            }
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 20px;
        }

        li {
            margin-bottom: 10px;
            background-color: rgba(170, 73, 9, 0.8);
            padding: 10px;
            border-radius: 5px;
        }

        li a {
            color: #fff;
            text-decoration: none;
            background-color: rgb(0, 0, 0);
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
            
        }

        li a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    
    <h1>Liste des Stagiaires</h1>
    <a href="formateurs/1/emploi"><button>Return</button></a>   
    <ul>
        @foreach ($stagiaires as $stagiaire)
            <li>
                {{ $stagiaire->nom }} {{ $stagiaire->prenom }}
                <a href="{{ route('disciplines.newCreate', ['stagiaire' => $stagiaire->id]) }}">Créer un rapport disciplinaire</a>
            </li>
        @endforeach
    </ul>
</body>
</html>
