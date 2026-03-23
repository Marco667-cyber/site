    <html>
	<head>
		<title>formulaire d'enregistrement </title>
	</head>
	<body>
<div style="height: 50;width: 100%;text-align: CENTER;">  <img style="height:51;width: 80;position: relative;right: 500;bottom:5;"src="logo.jpg"><h1 style="text-align: center;position: relative;bottom: 65;color: green;">SPARKSIDE ACADEMY</h1></div>		<style>

     
        nav {
            background-color: #333;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex; 
        }


        nav ul li a {
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
    </style>
</head>

    <nav>
        <ul>
            <li><a href="index.html">Accueil</a></li>
             <li><a href="presentation.html">A propos</a></li> 
            <li><a href="frais.html">Frais de scolarite</a></li>
            <li><a href="vie.html">Nos Atouts</a></li>
            
            
        </ul>
    </nav>
	<style>
        body {
            background-color: #f4f6f8;
        }
        .form-container {
            max-width: 500px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            font-family: Arial, sans-serif;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        input, select, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            margin-top: 15px;
            padding: 10px;
            width: 100%;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
        }
        .error {
          color: red;
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

<?php
$message = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $pdo = new
PDO("mysql:host=localhost;dbname=donnees","root", "");
        $nom = $_POST["nom"] ;
        $date_de_naissance = $_POST["dateNaissance"] ;
        $classe = $_POST["classe"] ;
        $email = $_POST["email"] ;
        $telephone = $_POST["telephone"] ;
        $adresse= $_POST["adresse"];
       
$sql = "INSERT INTO formulaire(nom,date_de_naissance,classe,email,telephone,adresse)
VALUES(:nom,:date_de_naissance,:classe,:email,:telephone,:adresse)";
$stmt = $pdo->prepare($sql);


if ($stmt->execute([
":nom" => $nom,
":date_de_naissance" => $date_de_naissance,
":classe" => $classe,
":email" => $email,
":telephone" => $telephone,
"adresse" => $adresse
])){
    $message = "Donnee enregistre avec succes";
}
}

?>
<?php if(!empty($message)) : ?>
    <P style="color: green; font-weight: bold;">
        <?= $message ?>
    </p>
<?php endif; ?>

<div class="form-container">
    <h2>Inscription Scolaire</h2>
    <form action="" method="POST" id="inscriptionForm">
        <label for="nom">Nom complet *</label>
        <input type="text" id="nom" name="nom" required>

        <label for="dateNaissance">Date de naissance *</label>
        <input type="date" id="dateNaissance" max="2017-01-01" name="dateNaissance" >

        <label for="classe">Classe demandee *</label>
        <select id="classe" name="classe" required>
            <option value="">-- Selectionnez --</option>
            <option value="6eme">6eme</option>
            <option value="5eme">5eme</option>
            <option value="3eme">3eme</option>
            <option value="2nde">2nde</option>
            <option value="1ere">1ere</option>
            <option value="TLE">Tle</option>
        </select>

        <label for="email">Email du parent *</label>
        <input type="email" id="email" name="email" required>

        <label for="telephone">Telephone *</label>
        <input type="tel" id="telephone" name="telephone" pattern="[0-9]{9}" placeholder="Ex: 690123456" required>

        <label for="adresse">Adresse</label>
        <textarea id="adresse" name="adresse" rows="1"></textarea>


        <button type="submit"> Envoyer </button>
        <button><a href="donnees.php">VOIR LA LISTE DES INSCRIPTIONS</a></button>    
    </form>
</div>

<script>
document.getElementById('inscriptionForm')
.addEventListener('submit', function(e) {
    

    const nom = document.getElementById('nom').value.trim();
    const email = document.getElementById('email').value.trim();
    const tel = document.getElementById('telephone').value.trim();
    const errorMsg = document.getElementById('errorMsg');
    let modele = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!modele.test(email)){
    	errorMsg.textContent = "Email invalide";
    	return;
    }

    if (nom.length < 3) {
        errorMsg.textContent = "Le nom doit contenir au moins 3 caractères.";
        return;
    }
    if (!/^[0-9]{8,15}$/.test(tel)) {
        errorMsg.textContent = "Le numéro de téléphone doit contenir uniquement des chiffres (0 a 9).";
        return;
    
    e.preventDefault();
    }
     
});
</script>
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
             <li><a href="presentation.html">A propos</a></li> 
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
