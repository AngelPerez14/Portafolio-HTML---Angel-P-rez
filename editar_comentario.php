<?php
include 'config/database.php';

$id = $_GET['id'] ?? 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombreyapellido = htmlspecialchars($_POST['nombreyapellido']);
    $usuario = htmlspecialchars($_POST['usuario'] ?? '');
    $email = htmlspecialchars($_POST['email']);
    $nota = htmlspecialchars($_POST['nota']);
    
    try {
        $stmt = $pdo->prepare("UPDATE comentarios SET nombreyapellido = ?, usuario = ?, email = ?, nota = ? WHERE id = ?");
        $stmt->execute([$nombreyapellido, $usuario, $email, $nota, $id]);
        
        header('Location: comentarios.php?mensaje=Comentario actualizado correctamente&tipo=exito');
        exit;
    } catch(PDOException $e) {
        header('Location: comentarios.php?mensaje=Error al actualizar comentario&tipo=error');
        exit;
    }
}

// Obtener comentario actual
try {
    $stmt = $pdo->prepare("SELECT * FROM comentarios WHERE id = ?");
    $stmt->execute([$id]);
    $comentario = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$comentario) {
        header('Location: comentarios.php?mensaje=Comentario no encontrado&tipo=error');
        exit;
    }
} catch(PDOException $e) {
    header('Location: comentarios.php?mensaje=Error al cargar comentario&tipo=error');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Comentario | Portafolio CocheDev</title>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>👨‍💻</text></svg>">
    <link rel="stylesheet" href="css/styles.css">
    <style>
        .editar-section { padding: 100px 0 80px; }
        .form-comentario {
            background: var(--azul-claro);
            padding: 40px;
            border-radius: 15px;
            max-width: 800px;
            margin: 0 auto;
        }
        .form-group { margin-bottom: 25px; }
        .form-group label { display: block; margin-bottom: 8px; font-weight: 600; }
        .form-group input, .form-group textarea { width: 100%; padding: 12px 15px; border: 2px solid var(--azul-medio); border-radius: 8px; }
        .btn-volver { display: inline-block; margin-right: 15px; padding: 12px 25px; background: #6b7280; color: white; border-radius: 8px; text-decoration: none; }
    </style>
</head>
<body>

<?php include 'includes/header.php'; ?>

<section class="editar-section">
    <div class="container">
        <h2 class="section-title">Editar Comentario</h2>
        
        <div class="form-comentario">
            <form method="POST">
                <div class="form-group">
                    <label for="nombreyapellido">Nombre y Apellido *</label>
                    <input type="text" id="nombreyapellido" name="nombreyapellido" value="<?= $comentario['nombreyapellido'] ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="usuario">Usuario (opcional)</label>
                    <input type="text" id="usuario" name="usuario" value="<?= $comentario['usuario'] ?>">
                </div>
                
                <div class="form-group">
                    <label for="email">Correo Electrónico *</label>
                    <input type="email" id="email" name="email" value="<?= $comentario['email'] ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="nota">Tu comentario o nota *</label>
                    <textarea id="nota" name="nota" rows="5" required maxlength="1000"><?= $comentario['nota'] ?></textarea>
                </div>
                
                <a href="comentarios.php" class="btn-volver">Cancelar</a>
                <button type="submit" class="btn">Actualizar Comentario</button>
            </form>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

</body>
</html>