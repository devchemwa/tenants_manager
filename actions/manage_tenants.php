<!DOCTYPE html>
<html lang="en">
<?php include '../templates/header.php'; ?>
<body>
<?php include '../templates/navbar.php'; ?>    

<div class="container-fluid">
    <?php
    include '../backend/db.php';
    $sql = "select tenant_name,rent_payment_date,house_number,pricing from houses inner join tenants on tenants.house_id = houses.house_id;";
    $query = mysqli_query($conn, $sql);
    $results = mysqli_fetch_all($query);
    ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Tenant Name</th>
                <th>Rent Payment Date</th>
                <th>House Name</th>
                <th>Pricing</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php for ($i=0; $i < count($results); $i++) {  ?>
                <td><?= $results[$i][0]; ?></td>
                <td><?= $results[$i][1]; ?></td>
                <td><?= $results[$i][2]; ?></td>
                <td><?= $results[$i][3]; ?></td>
                <td>
                    <form action="manage_tenants.php" method="post">
                        <input type="submit" name="delete_tenant" id="delete_tenant" value="Delete">
                        <?php
                        if(isset($_POST['delete_tenant'])){
                            include '../backend/db.php';
                            $sql = "delete from tenants where tenant_id = ''";
                        }
                        ?>
                    </form>
                </td>
                <?php } ?>
            </tr>
        </tbody>
</table>
</div>

<?php include '../templates/footer.php'; ?>
</body>
</html>