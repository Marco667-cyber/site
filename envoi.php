<?php
declare(strict_types=1);
require __DIR__ . "/db.php";

$success = false;

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
         $nom = trim((string)($_POST["nom"] ?? ""));
        $date_de_naissance = trim((string)($_POST["dateNaissance"] ?? ""));
        $classe = trim((string)($_POST["classe"] ?? ""));
        $email = trim((string)($_POST["email"] ?? ""));
        $telephone = trim((string)($_POST["telephone"] ?? ""));
        $adresse= trim((string)($_POST["adresse"] ?? ""));
       
$stmt = $pdo->prepare(
"INSERT INTO formulaire(nom,date_de_naissance,classe,email,telephone,adresse)
VALUES(:nom,:date_de_naissance,:classe,:email,:telephone,:adresse)"
);

$stmt->execute([
":nom" => $nom,
":date_de_naissance" => $date_de_naissance,
":classe" => $classe,
":email" => $email,
":telephone" => $telephone,
"adresse" => $adresse
]);
echo "FELICITATIONS<b> $nom </b><br> VOTRE ENREGISTREMENT A BIEN ETE PRIS EN COMPTE, 
<br>NOUS VOUS PRIONS DE PASSER A L'ETABLISSEMENT DANS LES DELAIS
 LES PLUS PROCHES POUR FINALISER L'INSCRIPTION !!!";
$success = true;

}

?>



