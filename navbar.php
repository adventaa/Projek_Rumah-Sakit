<script type="module" src="https://cdn.jsdelivr.net/npm/@iconify-icon/web-awesome@1.7.0/dist/web-awesome.js"></script>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="home.php">
            <img src="RS-icon.png" alt="Logo Rumah Sakit" style="height:50px;">
            <span class="ms-2">Rumah Sakit ABC</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <!-- <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="data_pasien.php">Data Peserta</a>
                </li> -->
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li> -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Master Data
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="data_pasien.php">Data Pasien</a></li>
                        <li><a class="dropdown-item" href="#">Data Dokter</a></li>
                        <li><a class="dropdown-item" href="#">Data Ruangan</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="logout.php"><button class="btn font-weight-bold">Logout</button></a>
                </li>
            </ul>
        </div>
    </div>
</nav>