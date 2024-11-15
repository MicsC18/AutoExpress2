<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <?= $_SESSION['username'] ?>
    </a>
    <ul class="dropdown-menu">
        <li class="nav-item p-1"><a class="nav-link" href="<?= $dirBase ?>/cliente/miCuenta.php"><i
                    class="bi bi-person-vcard-fill"></i> Mi cuenta</a></li>
        <li class="nav-item p-1"><a class="nav-link" href="<?= $dirBase ?>/login/logout.php"><i
                    class="bi bi-box-arrow-left"></i> Cerrar sesión</a></li>
    </ul>
</li>