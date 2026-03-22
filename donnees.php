<html>
    <head>
        <title>Afficher les donnees</title>
    <style>
        table{
            border-collapse:collapse;
            width:100%;
        }
        th,td{
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
        th{
            background-color: lightgray;
        }
         nav {
            background-color: #333;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex; 
        }


        nav ul li a  {
            display: block;
            padding: 14px;
            text-align: center;
            text-decoration: none;
            color: white;
        }
         nav ul li a:hover {
            color: lightgreen;
            text-shadow: 2px 2px 5px black; 
        }
         .footer {
            background-color:#111 ;
            color: #fff;
            padding: 40px 20px;
        }
        .container{
            display: flex;
            justify-content: space-between;
        }
        .col h4{
            margin-bottom: 10px;
        }
        .col ul li a{
            color: #ccc;
        }
        .col ul li a:hover{
            color: lightgreen;
        }
        copyright {
            text-align: center;
            margin-top: 20px;
        }
    </style>
    </head>
    <body>
        <div style="height: 50;width: 100%;text-align: CENTER;">  <img style="height:51;width: 80;position: relative;right: 500;bottom:5;"src="logo.jpg">
        <h1 style="text-align: center;position: relative;bottom: 65;color: green;">SPARKSIDE ACADEMY</h1></div>
         <nav>
        <ul>
            <li><a href="index.html">Accueil</a></li>
             <li><a href="Presentation.html">A propos</a></li> 
            <li><a href="frais.html">Frais de scolarite</a></li>
            <li><a href="vie.html">Nos Atouts</a></li>
            
            
        </ul>
    </nav>
        <?php
        $pdo = new
        PDO("mysql:host=localhost;dbname=donnees","root","");
        
        $sql = "SELECT * FROM formulaire";
        $resultat = $pdo->query($sql);
        ?>
        
        <H2>ELEVES ENREGISTRES</H2>
    <table border="1px">
        <tr>
            <th>ID</th>
            <th>NOM</th>
            <th>DATE DE NAISSANNCE</th>
            <th>EMAIL</th>
            <th>TELEPHONE</th>
            <th>ADRESSE</th>
            <th>DATE D'ENREGISTREMENT</th>
        </tr>

        <?php 
        while($donnees = $resultat->fetch()) {
        ?>
        <tr>
            <td> <?= $donnees['id'] ?></td>
            <td> <?= $donnees['nom'] ?></td>
            <td> <?= $donnees['date_de_naissance'] ?></td>
            <td> <?= $donnees['email'] ?></td>
            <td> <?= $donnees['telephone'] ?></td>
            <td> <?= $donnees['adresse'] ?></td>
            <td> <?= $donnees['created_at'] ?></td>
        </tr>
    <?php } ?>
</table>
</body>
<footer class="footer">
    <div class="container">
        <div class="col">
            <h3>SPARKSIDE ACADEMY</h3>
            <p>L'ecole du futur</p>
            <img style="height:150;width: 200;"src="logo.jpg">
        </div>    
        <div class="col">
        <h4>Liens</h4>
        <ul>
            <li><a href="index.html">Accueil</a></li>
             <li><a href="Presentation.html">A propos</a></li> 
            <li><a href="frais.html">Frais de scolarite</a></li>
            <li><a href="devoir.php">S'enregistrer</a></li>
            <li><a href="vie.html">Nos Atouts</a></li>
            
            
        </ul>
    </div>
    <div class="col">
        <h4>Contact</h4>
        <p>Email: sparkside@gmail.com</p>
        <p>Tel: +237 656452704</p>
        <p>Whatsapp: +237 656452704</p>
        <p>localisation: Yaounde-jouvence</p>
    </div>
</div>

    <P class="copyright">
        Copyright 2026 Sparkside Academy - Tous droits reserves
    </P>

</footer>
</html>