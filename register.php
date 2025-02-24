<?php
$host = "localhost";
$dbname = "nom_de_ta_base";
$username = "ton_utilisateur";
$password = "ton_mot_de_passe";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nom = trim($_POST["nom"]);
        $prenom = trim($_POST["prenom"]);
        $email = trim($_POST["email"]);
        $password = password_hash(trim($_POST["password"]), PASSWORD_BCRYPT);

        $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE email = :email");
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "Cet email est déjà utilisé. <a href='indexregistration.html'>Réessayer</a>";
        } else {
            $stmt = $pdo->prepare("INSERT INTO utilisateurs (nom, prenom, email, password) VALUES (:nom, :prenom, :email, :password)");
            $stmt->bindParam(":nom", $nom);
            $stmt->bindParam(":prenom", $prenom);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":password", $password);
            $stmt->execute();

            header("Location: success.html");
            exit();
        }
    }
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}
?>