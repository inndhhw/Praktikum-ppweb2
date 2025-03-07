<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi IT Club Data Science</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<style>
    .bg-pink {
        background-color:pink
    }
</style>
</head>
<body class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
    <div class="bg-pink p-5 rounded shadow-lg w-100" style="max-width: 600px;">
        <h2 class="text-center mb-4">Form Registrasi IT Club Data Science</h2>
        
        <?php
        // Check if the form was submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Collect form data
            $nim = $_POST['nim'];
            $nama = $_POST['nama'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $program_studi = $_POST['program_studi'];
            $skills = isset($_POST['skills']) ? $_POST['skills'] : [];
            $domisili = $_POST['domisili'];
            $email = $_POST['email'];

            // Calculate the total skill score
            $total_score = 0;
            foreach ($skills as $skill) {
                $total_score += $skill;
            }

            // Create a comma-separated string for the selected skills
            $skills_list = implode(", ", array_keys(array_flip($skills)));

            // Output the results
            echo "<h3>Hasil Registrasi</h3>";
            echo "<p><strong>NIM:</strong> $nim</p>";
            echo "<p><strong>Nama:</strong> $nama</p>";
            echo "<p><strong>Jenis Kelamin:</strong> " . ($jenis_kelamin == 'laki-laki' ? 'Laki-Laki' : 'Perempuan') . "</p>";
            echo "<p><strong>Program Studi:</strong> $program_studi</p>";
            echo "<p><strong>Skill:</strong> $skills_list</p>";
            echo "<p><strong>Skor Skill:</strong> $total_score</p>";
            echo "<p><strong>Email:</strong> $email</p>";
        } else {
        ?>

        <!-- Form to submit -->
        <form method="POST">
            <div class="mb-3">
                <label class="form-label" for="nim">NIM</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
                    <input class="form-control" type="text" id="nim" name="nim" required>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="nama">Nama Lengkap</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input class="form-control" type="text" id="nama" name="nama" required>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="laki-laki" name="jenis_kelamin" value="laki-laki" required>
                    <label class="form-check-label" for="laki-laki">Laki-Laki</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="perempuan" name="jenis_kelamin" value="perempuan" required>
                    <label class="form-check-label" for="perempuan">Perempuan</label>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="program_studi">Program Studi</label>
                <select class="form-select" id="program_studi" name="program_studi" required>
                    <?php
                    $program_studi = ["SI" => "Sistem Informasi", "TI" => "Teknik Informatika", "BD" => "Bisnis Digital"];
                    foreach ($program_studi as $key => $value) {
                        echo "<option value=\"$key\">$value</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Skill Web & Programming</label>
                <div class="d-flex flex-wrap">
                    <?php
                    $skills_data = [
                        "HTML" => 10,
                        "CSS" => 10,
                        "JavaScript" => 20,
                        "RWD Bootstrap" => 20,
                        "PHP" => 30,
                        "Python" => 30,
                        "Java" => 50
                    ];
                    foreach ($skills_data as $skill => $score) {
                        echo "<div class=\"form-check me-4\">
                                <input class=\"form-check-input\" type=\"checkbox\" id=\"$skill\" name=\"skills[]\" value=\"$score\">
                                <label class=\"form-check-label\" for=\"$skill\">$skill</label>
                              </div>";
                    }
                    ?>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="domisili">Tempat Domisili</label>
                <select class="form-select" id="domisili" name="domisili" required>
                    <?php
                    $domisili = ["Jakarta", "Depok", "Bogor", "Tanggerang", "Bekasi", "Lainnya"];
                    foreach ($domisili as $city) {
                        echo "<option value=\"$city\">$city</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="email">Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <input class="form-control" type="email" id="email" name="email" required>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>

        <?php
        }
        ?>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
