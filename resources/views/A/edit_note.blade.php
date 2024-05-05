<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une note</title>
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
            width: 60%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
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

        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }

        input[type="text"] {
            width: calc(100% - 10px);
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-bottom: 2px solid rgb(170, 73, 9);
            transition: border-bottom-color 0.3s;
            background-color: #f9f9f9;
            color: #333;
        }

        input[type="text"]:focus {
            outline: none;
            border-bottom-color: #0056b3;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: rgb(170, 73, 9);
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Modifier une note</h1>
    <form action="{{ route('notes.update', ['note' => $note->id]) }}" method="POST">
        @csrf
        @method('PUT') <!-- Utilisez la méthode PUT pour la mise à jour -->
        <label for="cc1">CC1:</label>
        <input type="text" id="cc1" name="cc1" value="{{ $note->cc1 }}">
        <label for="cc2">CC2:</label>
        <input type="text" id="cc2" name="cc2" value="{{ $note->cc2 }}">
        <label for="cc3">CC3:</label>
        <input type="text" id="cc3" name="cc3" value="{{ $note->cc3 }}">
        <input type="hidden" name="stagiaire_id" value="{{$note->stagiaire_id}}">
        <button type="submit">Mettre à jour</button>
    </form>
</body>
</html>
