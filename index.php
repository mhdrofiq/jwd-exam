<!-- written by Muhammad Rofiqurrahman Ibnu Disya Ghazali, August 2023 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar beasiswa</title>
    <?php include('includes/htmlhead.php'); ?>
</head>
<body class="bg-light">
    <div class="container bg-white rounded shadow my-3 min-vh-100">
        
        <?php 
        include('includes/header.php'); 
        
        function rand_float($st_num,$end_num,$mul){
            if ($st_num>$end_num) return false; //to check correct range
            return mt_rand($st_num*$mul,$end_num*$mul)/$mul; //divide my mul to get num of decimal place
        }
        $randomgpa = rand_float(2,4,10);
        ?>

        <div class="d-flex align-items-center justify-content-center">
        <div class="card m-3 p-3 w-50 bg-light">
            <h2 class="mb-3"><i>Daftar Beasiswa</i></h2>
            <form action="addbeasiswaaction.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Nama lengkap</label>
                <input type="text" class="form-control form-control-sm" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control form-control-sm" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Nomor handphone</label>
                <input type="text" class="form-control form-control-sm" id="phone" name="phone" required>
            </div>
            <div class="mb-3">
                <label for="semester" class="form-label">Semester saat ini</label>
                <select class="form-select form-select-sm" id="semester" name="semester" required>
                    <option value="1">1 (Satu)</option>
                    <option value="2">2 (Dua)</option>
                    <option value="3">3 (Tiga)</option>
                    <option value="4">4 (Empat)</option>
                    <option value="5">5 (Lima)</option>
                    <option value="6">6 (Enam)</option>
                    <option value="7">7 (Tujuh)</option>
                    <option value="8">8 (Delapan)</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="gpa" class="form-label">IPK terakhir</label>
                <input type="text" class="form-control form-control-sm" id="gpa" name="gpa" value="<?php echo $randomgpa ?>" readonly>
            </div>

            <?php if($randomgpa >= 3.0): ?>
            <div class="mb-3">
                <label for="type" class="form-label">Pilihan beasiswa</label>
                <select class="form-select form-select-sm" id="type" name="type" required>
                    <!-- <option selected>Pilih</option> -->
                    <option value="Akademik">Akademik</option>
                    <option value="Non akademik">Non akademik</option>
                </select>
            </div> 
            <div class="mb-3">
                <label for="fileupload" class="form-label">Upload berkas syarat
                </label>
                <input class="form-control form-control-sm" id="fileupload" type="file" name='file' accept='.jpeg, .jpg, .png, .pdf, .zip, .rar' required>
            </div>
            <div class="d-flex gap-2 mt-4">
                <input type="submit" name='save' value='Daftar' class="btn btn-success w-25"></input>
                <input type="reset" name='reset' value='Batal' class="btn btn-danger w-25"></input>
            </div>
            <?php else: ?>
            <div>
                <h6 class="text-danger mt-4">Maaf, anda tidak memenuhi syarat untuk mendaftar beasiswa</h6>
            </div>
            <?php endif; ?>

            </form>
        </div>
        </div>
       
    </div>
</body>
</html>