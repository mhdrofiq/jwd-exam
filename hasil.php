<!-- written by Muhammad Rofiqurrahman Ibnu Disya Ghazali, August 2023 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil pendaftaran beasiswa</title>
    <?php include('includes/htmlhead.php'); ?>
</head>
<body class="bg-light">
    <div class="container bg-white rounded shadow my-3 vh-100">

        <?php include('includes/header.php'); ?>

        <div class="card m-3 bg-light px-3 justify-content-center">
        <h2 class="my-4"><i>Hasil Pendaftaran Beasiswa</i></h2>

        <?php 
            include('includes/dbconnect.php');
            $sql = 'SELECT * FROM beasiswa';
            $result = mysqli_query($conn, $sql);
            $beasiswaarr = mysqli_fetch_all($result, MYSQLI_ASSOC);

            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $sql = "UPDATE beasiswa SET status='Diverifikasi' WHERE id=$id";
                if(mysqli_query($conn, $sql)){
                    header('Location: hasil.php');
                } else {
                    echo 'query error: '. mysqli_error($conn);
                }
            }

            mysqli_free_result($result);    //free result from memory
            mysqli_close($conn);    //close db connection
        ?>

        <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">Nama lengkap</th>
                <th scope="col">Email</th>
                <th scope="col">Nomor handphone</th>
                <th scope="col">Semester saat ini</th>
                <th scope="col">IPK terakhir</th>
                <th scope="col">Pilihan beasiswa</th>
                <th scope="col">Nama berkas syarat</th>
                <th scope="col">Status pendaftaran</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>hardcode</td>
                    <td>hardcode@gmail.com</td>
                    <td>081234567890</td>
                    <td>7</td>
                    <td>3.5</td>
                    <td>Akademik</td>
                    <td>hardcode.pdf</td>
                    <td>Belum Diverifikasi</td>
                    <td>
                        <button class="btn btn-sm btn-success">
                            <a>Approve</a>
                        </button>
                    </td>
                </tr>
                <?php foreach($beasiswaarr as $beasiswa) { ?>
                    <tr>
                    <td><?php echo $beasiswa['name']; ?></td>
                    <td><?php echo $beasiswa['email']; ?></td>
                    <td><?php echo $beasiswa['phone']; ?></td>
                    <td><?php echo $beasiswa['semester']; ?></td>
                    <td><?php echo $beasiswa['gpa']; ?></td>
                    <td><?php echo $beasiswa['type']; ?></td>
                    <td><?php echo $beasiswa['filename']; ?></td>
                    <td><?php echo $beasiswa['status']; ?></td>
                    <td>
                        <a class='btn btn-sm btn-success text-decoration-none' href='hasil.php?id=<?= $beasiswa['id'];?>'>Approve</a>
                    </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>

        
    </div>
</body>
</html>