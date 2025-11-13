<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Optimal School</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/home.css') ?>">
</head>

<body>
    <header>
        <div class="logo">
            <img src="<?php echo base_url('assets/img/logoOptimalSchool-sinFondo.png') ?>" alt="Logo Optimal School">
            <h1>Optimal School</h1>
        </div>

        <div class="nav-actions">
            <nav>
                <ul>
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#funcionalidades">Funcionalidades</a></li>
                    <li><a href="#planes">Planes</a></li>
                    <li><a href="#contacto">Contacto</a></li>
                </ul>
            </nav>
            <div class="auth-buttons">
                <a href="./formulario-inicio-sesion/sesion.html" class="boton-primario boton">Iniciar sesión</a>
            </div>
        </div>
    </header>

    <section class="hero" id="inicio">
        <div class="hero-content">
            <h2>Gestiona tu colegio de forma facil y eficiente</h2>
            <p>Optimal School es la plataforma integral que conecta a estudiantes, docentes y padres en un solo lugar.
            </p>
            <div class="hero-buttons">
                <a href="#funcionalidades" class="btn-secondary">Ver funcionalidades</a>
            </div>
        </div>
        <div class="hero-image">
            <img src="#" alt="Vista previa de Optimal School">
        </div>
    </section>

    <section class="beneficios" id="funcionalidades">
        <div class="contenedor">
            <h2>¿Por qué elegir Optimal School?</h2>
            <div class="beneficios-grid">
                <div class="beneficio">
                    <img src="<?php echo base_url('assets/img/home/notas.png') ?>" alt="Gestion de notas" class="icono">
                    <h3>Gestión de notas fácil</h3>
                    <p>Organiza y consulta calificaciones en tiempo real de manera sencilla</p>
                </div>

                <div class="beneficio">
                    <img src="<?php echo base_url('assets/img/home/instructor.png') ?>" alt="Portal para docentes"
                        class="icono">
                    <h3>Portal para docentes</h3>
                    <p>Facilitia la planificacion y comunicacion entre profesores y estudiantes</p>
                </div>

                <div class="beneficio">
                    <img src="<?php echo base_url('assets/img/home/libro-de-lectura.png') ?>"
                        alt="Seguimiento de estudiantes" class="icono">
                    <h3>Seguimiento de estudiantes</h3>
                    <p>Padres y acudientes pueden hacer un seguimiento claro y transparente</p>
                </div>
            </div>
        </div>
    </section>

    <section class="confianza" aria-labelledby="confianza-title">
        <div class="confianza-contenedor">
            <div class="confianza-texto">
                <h2 id="confianza-titulo">Confianza y proposito</h2>
                <p class="lead">Optimal School nace para simplificar la gestion escolar: menos papeleo, mejor
                    comunicación y mas tiempo para lo que importa - la educación.</p>


                <ul class="valores-list">
                    <li>
                        <strong>Seguridad de datos</strong>
                        <span>Protegemos la informacion de tu colegio con buenas practicas y respaldos
                            periodicos.</span>
                    </li>
                    <li>
                        <strong>Diseñado para colegios</strong>
                        <span>Interfaz amigable para directivos, docentes, padres y estudiantes.</span>
                    </li>
                    <li>
                        <strong>Soporte dedicado</strong>
                        <span>Nuestro equipo de soporte esta disponible para ayudarte en cada paso.</span>
                    </li>
                </ul>

                <div class="confianza-media" aria-hidden="true">
                    <img src="<?php echo base_url('assets/img/home/confianza-persona.png') ?>"
                        alt="persona generando confianza">
                </div>
            </div>
        </div>
    </section>

    <section class="planes" id="planes">
        <div class="planes-contenedor">
            <h2>Planes</h2>
            <p class="lead">Un solo plan, todas las funcionalidades. Sin complicaciones.</p>

            <div class="plan unico">
                <h3>Plan Único</h3>
                <p class="precio">$99.00/mes</p>
                <ul>
                    <li>Estudiantes ilimitados</li>
                    <li>Gestion académica y administrativa</li>
                    <li>Comunicaciones con padres y docentes</li>
                    <li>Reportes</li>
                    <li>Soporte dedicado</li>
                </ul>
                <a href="#contacto" class="btn-adquirir">Adquirir</a>
            </div>
        </div>
    </section>

    <section class="contacto" id="contacto">
        <div class="contacto-contenedor">
            <h2>Contáctenos</h2>
            <p class="lead">¿Quieres adquirir Optimal School o tienes dudas? Dejanos tus datos y nos pondremos en
                contacto?</p>

            <form class="contacto-formulario">
                <div class="campo">
                    <label for="nombre">Nombre completo</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Escribe tu nombre" required>
                </div>

                <div class="campo">
                    <label for="correo">Correo</label>
                    <input type="email" id="correo" name="correo" placeholder="Escribe tu correo electronico">
                </div>

                <div class="campo">
                    <label for="telefono">Telefono</label>
                    <input type="tel" id="telefono" name="telefono" placeholder="Escribe tu numero de telefono">
                </div>

                <div class="campo">
                    <label for="colegio">Nombre del colegio</label>
                    <input type="text" id="colegio" name="colegio" placeholder="Colegio al que perteneces">
                </div>

                <div class="campo">
                    <label for="mensaje">Mensaje</label>
                    <textarea id="mensaje" name="mensaje" rows="5" placeholder="Cuentanos qué necesitas..."></textarea>
                </div>

                <button type="submit" class="btn-enviar">Enviar mensaje</button>
            </form>

            <div class="contacto-whatsapp">
                <p>O si prefieres, cóntactanos directamente por WhatsApp:</p>
                <a href="https://wa.me/573000000000" target="_blank" class="icono-whatsapp" aria-label="Whatsapp">
                    <img src="<?php echo base_url('assets/img/home/logo-whatsapp.png') ?>" alt="Whatsapp">
                </a>

            </div>
        </div>
    </section>



    <footer class="footer">
        <div class="footer-contenedor">
            <div class="footer-info">
                <p>&copy; 2024 Optimal School. Todos los derechos reservados.</p>
                <p>Desarrollado por el Equipo de Optimal School</p>
                <p>Bogotá, Colombia</p>
            </div>

            <div class="footer-contacto">
                <p><i class="fas fa-envelope"></i>persona@optimalschool.com</p>
                <p><i class="fab fa-phone"></i>+57 300 000 0000</p>
            </div>

            <div class="footer-social">
                <a href="mailto:info@optimalschool.com" target="_blank">
                    <img src="<?php echo base_url('assets/img/home/gmail.png') ?>" alt="Gmail">
                </a>
                <a href="https://www.linkedin.com/company/optimal-school" target="_blank">
                    <img src="<?php echo base_url('assets/img/home/logotipo-de-linkedin.png') ?>" alt="LinkedIn">
                </a>
                <a href="https://github.com/optimalschool" target="_blank">
                    <img src="<?php echo base_url('assets/img/home/github.png') ?>" alt="GitHub">
                </a>
            </div>

            <div class="footer-legal">
                <a href="#">Politica de privacidad</a>
                <a href="#">Terminos y condiciones</a>
            </div>
        </div>

    </footer>
</body>

</html>