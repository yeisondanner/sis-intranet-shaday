<?= header_template($data) ?>

<div class="main-content">
    <header>
        <!-- Botón de Toggle para mostrar/ocultar la Sidebar -->
        <button id="toggle-btn" class="toggle-btn">&#9776;</button>
        <h1>Bienvenido,
            <?= $_SESSION['user_type'] . ": " . $_SESSION['user_info']['nombre'] . " " . $_SESSION['user_info']['apellido'] ?>
        </h1>
        <p>Accede a la información importante desde tu panel.</p>
    </header>
    <section class="content-dashboard">
        <div class="card" onclick="openModal('Modulo I', 'Computación e Informática', 'path-to-image1.jpg')">
            <img src="path-to-image1.jpg" alt="Imagen Modulo I" class="card-img">
            <h3>Modulo I</h3>
            <p>Computación e Informática</p>
        </div>
        <div class="card" onclick="openModal('Modulo II', 'Computación e Informática', 'path-to-image2.jpg')">
            <img src="path-to-image2.jpg" alt="Imagen Modulo II" class="card-img">
            <h3>Modulo II</h3>
            <p>Computación e Informática</p>
        </div>
        <div class="card" onclick="openModal('Modulo III', 'Computación e Informática', 'path-to-image3.jpg')">
            <img src="path-to-image3.jpg" alt="Imagen Modulo III" class="card-img">
            <h3>Modulo III</h3>
            <p>Computación e Informática</p>
        </div>
    </section>

    <!-- Modal -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <img id="modal-img" src="" alt="Modal Image">
            <h3 id="modal-title"></h3>
            <p id="modal-text"></p>
        </div>
    </div>

</div>
<script>
    function openModal(title, text, imageUrl) {
        document.getElementById('modal').style.display = 'flex';
        document.getElementById('modal-title').textContent = title;
        document.getElementById('modal-text').textContent = text;
        document.getElementById('modal-img').src = imageUrl;
    }

    function closeModal() {
        document.getElementById('modal').style.display = 'none';
    }
</script>
<?= footer_template($data) ?>