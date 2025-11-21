<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portafolio | Angel Gabriel Pérez Marcano</title>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>👨‍💻</text></svg>">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<?php include 'includes/header.php'; ?>

<section id="home" class="hero">
    <div class="container">
        <div class="hero-content">
            <h1>Angel Gabriel Pérez Marcano</h1>
            <h2>"Coche" - Estudiante de Ingeniería de Sistemas</h2>
            <p>Desarrollador apasionado por crear soluciones innovadoras con código limpio y eficiente.</p>
            <a href="#about" class="btn">Conoce más sobre mí</a>
            <div class="quote">
                <p>"Si alguien pudo yo también puedo y si nadie pudo, seré el primero"</p>
            </div>
        </div>
    </div>
</section>

<section id="about" class="section">
    <div class="container">
        <h2 class="section-title">Sobre Mí</h2>
        <div class="about-content">
            <div class="about-text">
                <h3>Mi Historia</h3>
                <p>Hola, soy Angel Gabriel Pérez Marcano, aunque todos me conocen como "Coche". Tengo 21 años y soy originario de la hermosa Isla de Coche, Nueva Esparta, Venezuela.</p>
                <p>Actualmente soy estudiante de Ingeniería de Sistemas, apasionado por la tecnología y el desarrollo de software. Me encanta aprender nuevas tecnologías y enfrentar desafíos que me permitan crecer tanto personal como profesionalmente.</p>
                <p>En mi tiempo libre, disfruto pasar tiempo con mis mascotas, escuchar música de todo tipo y jugar videojuegos, especialmente títulos de Pokémon y juegos de supervivencia/terror.</p>
                
                <h3>Mis Mascotas</h3>
                <ul class="info-list">
                    <li>🐕 Malta - Mi fiel compañera perruna</li>
                    <li>🐕 Donald - El travieso de la casa</li>
                    <li>🐢 Antonia - La morrocoya que lleva su propio ritmo</li>
                </ul>
                
                <h3>Intereses Personales</h3>
                <ul class="info-list">
                    <li>⚽ Fanático del Real Madrid y de Cristiano Ronaldo</li>
                    <li>🎮 Juegos de Pokémon y de supervivencia/terror</li>
                    <li>🎵 Música de todo tipo en mis ratos libres</li>
                </ul>
            </div>
            <div class="about-image">
                <img 
                    src="assets/images/imagen.jpg" 
                    alt="Foto de perfil" 
                    class="profile-img"
                    style="width: 300px; height: 300px; border-radius: 15px; border: 2px solid #3b82f6; object-fit: cover;"
                >
            </div>
        </div>
    </div>
</section>

<section id="skills" class="section skills">
    <div class="container">
        <h2 class="section-title">Habilidades Técnicas</h2>
        <div class="skills-grid">
            <div class="skill-card">
                <h3>Lenguajes de Programación</h3>
                <div class="skill-list">
                    <span class="skill-tag">Dart</span>
                    <span class="skill-tag">Python</span>
                    <span class="skill-tag">JavaScript</span>
                    <span class="skill-tag">C#</span>
                    <span class="skill-tag">HTML</span>
                </div>
            </div>
            
            <div class="skill-card">
                <h3>Desarrollo Móvil</h3>
                <div class="skill-list">
                    <span class="skill-tag">Flutter</span>
                    <span class="skill-tag">Desarrollo de Apps</span>
                </div>
                <p class="skill-description">Mi principal área de interés y especialización.</p>
            </div>
            
            <div class="skill-card">
                <h3>Educación</h3>
                <div class="skill-list">
                    <span class="skill-tag">Ingeniería de Sistemas</span>
                    <span class="skill-tag">Universidad de Margarita</span>
                </div>
                <p class="skill-description">Actualmente cursando mis estudios universitarios.</p>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

</body>
</html>