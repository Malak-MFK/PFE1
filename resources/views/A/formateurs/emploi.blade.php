<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emploi du formateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Ajoutez votre propre style CSS -->
    <style>
        body {
            font-family: "Arial", sans-serif;
            background-color: #000;
            color: #fff;
            margin: 0;
            padding: 0;
        }

        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #000;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #fff;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:not(:first-child):hover {
            color: #fa0;
            background-color: #000;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
            color: #fff;
        }

        #main {
            transition: margin-left .5s;
            padding: 16px;
            background-color: #000 ;
        }

        @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
        }

        /* Autres styles */
        #infos {
            display: flex;
            margin-top: 30px;
            margin-left: 200px;
        }

        #infos img {
            margin-right: 100px;
        }

        #infos div p {
            margin: 5px 0;
        }

        a {
            color: #fff;
            text-decoration: none;
        }

        a:hover {
            color: #fa0;
        }

        .mainnav .navbar-brand a {
            color: #fff;
        }

        .mainnav .navbar-brand a:hover {
            color: #fa0;
        }
    </style>
</head>
<body id="main">

<div id="mySidenav" class="sidenav" style="display: flex; flex-direction: column;">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div style="display: flex; align-items: center;">
        <p style="color:#fa0;text-align: center;"><strong>{{ $formateur->prenom }} {{ $formateur->nom }}</strong><br>
            <br>
            {{ $formateur->role }}</p>
    </div>
    <a href="/liste-stagiaires">Notes</a>
    <a href="/absences/create">Abscence</a>
    <a href="/stagiaires">Rapport</a>
</div>

<div class="mainnav">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <span style="font-size:30px;cursor:pointer;color:white; margin: 0px 15px;" onclick="openNav()">&#9776;</span>
        <div class="container-fluid" style="display: flex; justify-content: space-around;">
            <a class="navbar-brand" href="#">
                <img src="PFE_PICS/Ellipse 37-2.png" alt="Ntic Logo" style="width:40px;" class="rounded-pill">
                <a href="#">Acceuil</a>
                <a href="/profile/{{$formateur->id}}">profile</a>

            </a>
        </div>
    </nav>
</div>

<!-- Ajoutez le sélecteur de groupes -->


<center>
    <!-- Contenu principal -->
    <div id="main" style="display: flex; justify-content: center; align-items: center; height: 70vh;">
        <div>
            <!-- Ajoutez l'image de l'emploi -->
            <img src="{{ asset($formateur->emploist->emploi) }}" alt="Emploi de {{ $formateur->nom }} {{ $formateur->prenom }}" style="max-width: 100%; max-height: 100%;">
        </div>
    </div>
</center>

<!-- Ajoutez le script JavaScript -->
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";
        document.body.style.backgroundColor = "#000";
    }
</script>
</body>
<footer>

</footer>
</html>
