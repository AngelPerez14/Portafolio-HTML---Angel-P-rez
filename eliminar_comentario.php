<?php
include 'config/database.php';

$id = $_GET['id'] ?? 0;

if ($id) {
    try {
        $stmt = $pdo->prepare("DELETE FROM comentarios WHERE id = ?");
        $stmt->execute([$id]);
        
        header('Location: comentarios.php?mensaje=Comentario eliminado correctamente&tipo=exito');
        exit;
    } catch(PDOException $e) {
        header('Location: comentarios.php?mensaje=Error al eliminar comentario&tipo=error');
        exit;
    }
} else {
    header('Location: comentarios.php?mensaje=ID de comentario no válido&tipo=error');
    exit;
}
?>