<?php
include 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombreyapellido = htmlspecialchars($_POST['nombreyapellido']);
    $usuario = htmlspecialchars($_POST['usuario'] ?? '');
    $email = htmlspecialchars($_POST['email']);
    $nota = htmlspecialchars($_POST['nota']);
    $fechanota = date('d/m/Y H:i:s');
    
    try {
        $stmt = $pdo->prepare("INSERT INTO comentarios (nombreyapellido, usuario, email, nota, fechanota) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$nombreyapellido, $usuario, $email, $nota, $fechanota]);
        
        header('Location: comentarios.php?mensaje=Comentario agregado correctamente&tipo=exito');
        exit;
    } catch(PDOException $e) {
        header('Location: comentarios.php?mensaje=Error al agregar comentario&tipo=error');
        exit;
    }
} else {
    header('Location: comentarios.php');
    exit;
}
?>