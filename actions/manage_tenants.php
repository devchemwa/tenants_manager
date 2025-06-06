<!DOCTYPE html>
<html lang="en">
<?php include '../templates/header.php'; ?>
<body>
<?php include '../templates/navbar.php'; ?>    

<div class="container-fluid">
    <?php
    include '../backend/db.php';
    $sql = "select tenant_id,tenant_name,rent_payment_date,house_number,pricing from houses inner join tenants on tenants.house_id = houses.house_id;";
    $query = mysqli_query($conn, $sql);
    $results = mysqli_fetch_all($query);
    ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Tenant ID</th>
                <th>Tenant Name</th>
                <th>Rent Payment Date</th>
                <th>House Name</th>
                <th>Pricing</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i=0; $i < count($results); $i++) {  ?>
            <tr>
                <td><?= $results[$i][0]; ?></td>
                <td><?= $results[$i][1]; ?></td>
                <td><?= $results[$i][2]; ?></td>
                <td><?= $results[$i][3]; ?></td>
                <td><?= $results[$i][4]; ?></td>
                <td>
                    <form action="manage_tenants.php" method="post">
                        <input type="number" name="tenant_id" id="tenant_id" value="<?=$results[$i][0];?>" hidden>
                        <input type="submit" name="delete_tenant" id="delete_tenant" value="Delete" onclick="">
                    </form>
                      <?php
                        if(isset($_POST['delete_tenant'])){
                            include '../backend/db.php';
                            $tenant_id= $_POST['tenant_id'];
                            $sql = "delete from tenants where tenant_id= '$tenant_id'";
                            $query = mysqli_query($conn, $sql);

                        }
                        ?>
                </td>
            </tr>
         <?php } ?>
        </tbody>
</table>
</div>

<?php include '../templates/footer.php'; ?>
</body>
</html>