<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Página no encontrada</title>
	<link rel="stylesheet" href="styles.css">
</head>
<style>
	/* Variables de color */
	:root {
		--primary-color: #3498db;
		/* Azul claro */
		--secondary-color: #2ecc71;
		/* Verde */
		--background-color: #f0f8ff;
		/* Azul cielo claro */
		--text-color: #333;
	}

	/* Reset básico */
	* {
		margin: 0;
		padding: 0;
		box-sizing: border-box;
	}

	body {
		display: flex;
		justify-content: center;
		align-items: center;
		height: 100vh;
		background-color: var(--background-color);
		font-family: Arial, sans-serif;
		overflow: hidden;
	}

	/* Contenedor de error */
	.error-container {
		text-align: center;
		max-width: 600px;
		padding: 0 20px;
	}

	/* Texto de error */
	.error-message {
		font-size: 2rem;
		color: var(--text-color);
		margin: 10px 0;
		animation: fadeInText 1.5s ease-in-out forwards;
	}

	.error-description {
		font-size: 1.2rem;
		color: var(--text-color);
		margin: 10px 0 20px;
	}

	.btn-home {
		display: inline-block;
		background-color: var(--primary-color);
		color: #fff;
		padding: 12px 24px;
		border-radius: 5px;
		text-decoration: none;
		font-size: 1rem;
		font-weight: bold;
		transition: background-color 0.3s, transform 0.2s;
	}

	.btn-home:hover {
		background-color: var(--secondary-color);
		transform: scale(1.05);
	}

	/* Ilustración de error */
	.illustration {
		position: relative;
		margin-bottom: 20px;
		width: 100%;
		height: 200px;
	}

	/* Animación de globos */
	.balloon {
		position: relative;
		margin: 0 auto;
		width: 80px;
		height: 100px;
		animation: float 3s ease-in-out infinite;
	}

	.balloon-body {
		width: 80px;
		height: 100px;
		background-color: var(--primary-color);
		border-radius: 50%;
		display: flex;
		justify-content: center;
		align-items: center;
		color: #fff;
		font-size: 2rem;
		font-weight: bold;
	}

	.balloon-string {
		width: 2px;
		height: 50px;
		background-color: var(--primary-color);
		position: absolute;
		bottom: -50px;
		left: 50%;
		transform: translateX(-50%);
	}

	/* Nubes animadas */
	.cloud {
		position: absolute;
		width: 120px;
		height: 60px;
		background: #fff;
		border-radius: 50px;
		opacity: 0.8;
	}

	.cloud:before,
	.cloud:after {
		content: '';
		position: absolute;
		background: #fff;
		border-radius: 50%;
	}

	.cloud:before {
		width: 80px;
		height: 80px;
		top: -20px;
		left: 10px;
	}

	.cloud:after {
		width: 50px;
		height: 50px;
		top: -10px;
		right: 10px;
	}

	.cloud1 {
		top: 20px;
		left: 20%;
		animation: moveClouds 15s linear infinite;
	}

	.cloud2 {
		top: 50px;
		left: 60%;
		width: 100px;
		height: 50px;
		animation: moveClouds 20s linear infinite;
	}

	.cloud3 {
		top: 80px;
		left: 80%;
		width: 140px;
		height: 70px;
		animation: moveClouds 25s linear infinite;
	}

	/* Animaciones */
	@keyframes float {

		0%,
		100% {
			transform: translateY(0);
		}

		50% {
			transform: translateY(-10px);
		}
	}

	@keyframes moveClouds {
		0% {
			transform: translateX(0);
		}

		100% {
			transform: translateX(-100vw);
		}
	}

	@keyframes fadeInText {
		0% {
			opacity: 0;
		}

		100% {
			opacity: 1;
		}
	}

	/* Responsividad */
	@media (max-width: 768px) {
		.error-message {
			font-size: 1.8rem;
		}

		.error-description {
			font-size: 1rem;
		}

		.btn-home {
			font-size: 0.9rem;
			padding: 10px 20px;
		}

		.balloon-body {
			font-size: 1.8rem;
			width: 70px;
			height: 90px;
		}
	}

	@media (max-width: 480px) {
		.error-message {
			font-size: 1.5rem;
		}

		.error-description {
			font-size: 0.9rem;
		}

		.btn-home {
			font-size: 0.8rem;
			padding: 8px 16px;
		}

		.balloon-body {
			font-size: 1.5rem;
			width: 60px;
			height: 80px;
		}
	}
</style>

<body>
	<div class="error-container">
		<div class="illustration">
			<div class="cloud cloud1"></div>
			<div class="cloud cloud2"></div>
			<div class="cloud cloud3"></div>
			<div class="balloon">
				<div class="balloon-string"></div>
				<div class="balloon-body">404</div>
			</div>
		</div>
		<div class="error-text">
			<h2 class="error-message">¡Oops! Página no encontrada</h2>
			<p class="error-description">Parece que la página que buscas se ha elevado a las nubes.</p>
			<a href="<?= base_url() ?>login" class="btn-home">Regresar al inicio</a>
		</div>
	</div>
</body>

</html>