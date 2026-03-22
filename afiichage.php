<?php
$sql = "SELECT * FROM formulaire";
$stmt = $pdo->query($sql);
$donnees = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>