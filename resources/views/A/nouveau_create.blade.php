<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rédiger un nouveau rapport disciplinaire</title>
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
            color: rgb(170, 73, 9);
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

        form {
            width: 80%;
            margin: 20px auto;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: rgb(170, 73, 9);
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Rédiger un nouveau rapport disciplinaire</h1>
    <form action="{{ route('disciplines.store', ['stagiaire' => $stagiaire->id]) }}" method="GET">
        <a href="formateurs/1/emploi"><button>Return</button></a>
        @csrf
        <label for="nom">Nom du stagiaire:</label><br>
        <input type="text" id="nom" name="nom" value="{{ $stagiaire->nom }}"><br>
        <label for="prenom">Prénom du stagiaire:</label><br>
        <input type="text" id="prenom" name="prenom" value="{{ $stagiaire->prenom }}"><br>
        <label for="content">Contenu du rapport disciplinaire:</label><br>
        <textarea id="content" name="content" rows="4" cols="50"></textarea><br>
        <button type="submit">Enregistrer</button>
    </form>
</body>
</html>
