<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comentarios | Portafolio CocheDev</title>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>👨‍💻</text></svg>">
    <link rel="stylesheet" href="css/styles.css">
    <style>
        .comentarios-section { padding: 100px 0 80px; }
        
        .form-comentario {
            background: var(--azul-claro);
            padding: 40px;
            border-radius: 15px;
            margin-bottom: 50px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        
        .form-group { margin-bottom: 25px; }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--azul-oscuro);
        }
        
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid var(--azul-medio);
            border-radius: 8px;
            font-size: 1rem;
        }
        
        .lista-comentarios { display: grid; gap: 25px; }
        
        .comentario-card {
            background: var(--blanco);
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.1);
            border-left: 4px solid var(--azul-medio);
        }
        
        .comentario-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
            flex-wrap: wrap;
            gap: 10px;
        }
        
        .comentario-info h4 { color: var(--azul-oscuro); margin-bottom: 5px; }
        .comentario-email { color: var(--azul-medio); font-size: 0.9rem; }
        .comentario-fecha { color: #666; font-size: 0.9rem; }
        .comentario-texto { line-height: 1.6; margin-bottom: 15px; }
        .comentario-actions { display: flex; gap: 10px; }
        
        .btn-editar, .btn-eliminar {
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9rem;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-editar { background: var(--azul-medio); color: var(--blanco); }
        .btn-eliminar { background: #dc2626; color: var(--blanco); }
        
        .mensaje {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: 600;
        }
        
        .mensaje.exito { background: #d1fae5; color: #065f46; }
        .mensaje.error { background: #fee2e2; color: #991b1b; }
    </style>
</head>
<body>

<?php include 'includes/header.php'; ?>

<section class="comentarios-section">
    <div class="container">
        <h2 class="section-title">Comentarios y Notas</h2>
        
        <?php
        if (isset($_GET['mensaje'])) {
            $tipo = $_GET['tipo'] ?? 'exito';
            $mensaje = htmlspecialchars($_GET['mensaje']);
            echo "<div class='mensaje $tipo'>$mensaje</div>";
        }
        ?>
        
        <div class="form-comentario">
            <h3 style="margin-bottom: 25px; color: var(--azul-oscuro);">Deja tu comentario</h3>
            <form action="procesar_comentario.php" method="POST">
                <div class="form-group">
                    <label for="nombreyapellido">Nombre y Apellido *</label>
                    <input type="text" id="nombreyapellido" name="nombreyapellido" required>
                </div>
                
                <div class="form-group">
                    <label for="usuario">Usuario (opcional)</label>
                    <input type="text" id="usuario" name="usuario">
                </div>
                
                <div class="form-group">
                    <label for="email">Correo Electrónico *</label>
                    <input type="email" id="email" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="nota">Tu comentario o nota *</label>
                    <textarea id="nota" name="nota" rows="5" required maxlength="1000"></textarea>
                </div>
                
                <button type="submit" class="btn">Enviar Comentario</button>
            </form>
        </div>
        
        <div class="lista-comentarios">
            <h3 style="margin-bottom: 30px; color: var(--azul-oscuro);">Comentarios anteriores</h3>
            
            <?php
            include 'config/database.php';
            
            try {
                $stmt = $pdo->query("SELECT * FROM comentarios ORDER BY id DESC");
                $comentarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                if (count($comentarios) > 0) {
                    foreach ($comentarios as $comentario) {
                        echo "
                        <div class='comentario-card'>
                            <div class='comentario-header'>
                                <div class='comentario-info'>
                                    <h4>{$comentario['nombreyapellido']}" . 
                                    ($comentario['usuario'] ? " (@{$comentario['usuario']})" : "") . "</h4>
                                    <div class='comentario-email'>{$comentario['email']}</div>
                                </div>
                                <div class='comentario-fecha'>{$comentario['fechanota']}</div>
                            </div>
                            <div class='comentario-texto'>{$comentario['nota']}</div>
                            <div class='comentario-actions'>
                                <a href='editar_comentario.php?id={$comentario['id']}' class='btn-editar'>Editar</a>
                                <a href='eliminar_comentario.php?id={$comentario['id']}' class='btn-eliminar' onclick='return confirm(\"¿Estás seguro de eliminar este comentario?\")'>Eliminar</a>
                            </div>
                        </div>
                        ";
                    }
                } else {
                    echo "<p style='text-align: center; color: #666;'>No hay comentarios aún. ¡Sé el primero en comentar!</p>";
                }
            } catch(PDOException $e) {
                echo "<p style='text-align: center; color: #dc2626;'>Error al cargar los comentarios.</p>";
            }
            ?>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

</body>
</html>