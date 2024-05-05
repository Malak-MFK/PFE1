<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des stagiaires avec notes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(0, 0, 0);
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

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            animation: zoomIn ease 1s;
        }

        @keyframes zoomIn {
            0% {
                transform: scale(0);
            }
            100% {
                transform: scale(1);
            }
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            transition: background-color 0.3s;
        }

        th {
            background-color: rgb(170, 73, 9);
            color: #fff;
            text-transform: uppercase;
        }

        td {
            color: #333;
        }

        td.actions a {
            display: inline-block;
            padding: 5px 10px;
            text-decoration: none;
            background-color: rgb(170, 73, 9);
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        td.actions a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Liste des stagiaires avec notes</h1>
    <a href="formateurs/1/emploi"><button>Return</button></a>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Date de naissance</th>
                <th>CC1</th>
                <th>CC2</th>
                <th>CC3</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stagiaires as $stagiaire)
            <tr>
                <td>{{ $stagiaire->nom }}</td>
                <td>{{ $stagiaire->prenom }}</td>
                <td>{{ $stagiaire->email }}</td>
                <td>{{ $stagiaire->date_naissance }}</td>
                <td>{{ $stagiaire->notes->cc1 ?? '-' }}</td>
                <td>{{ $stagiaire->notes->cc2 ?? '-' }}</td>
                <td>{{ $stagiaire->notes->cc3 ?? '-' }}</td>
                <td class="actions">
                    <!-- Boutons pour ajouter/modifier les notes -->
                    <a href="{{ route('notes.create', ['stagiaire_id' => $stagiaire->id]) }}">Ajouter</a>
                    <a href="/notes/{{$stagiaire->id}}/edit">Modifier</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
