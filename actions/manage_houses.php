<!DOCTYPE html>
<html lang="en">
<?php include '../templates/header.php'; ?>
<body>
<?php include '../templates/navbar.php'; ?>    
<?php
include '../backend/db.php';
$sql = 'select * from houses';
$query = mysqli_query($conn, $sql);
$houses = mysqli_fetch_all($query);
?>
<div class="container-fluid">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>House Name</th>
                <th>Pricing</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php for($i = 0; $i < count($houses); $i++){ ?>
            <tr>
                <td><?= $houses[$i][1]; ?></td>
                <td><?= $houses[$i][2]; ?></td>
                <td><?= $houses[$i][3]; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include '../templates/footer.php'; ?>
</html>