<!DOCTYPE html>
<html lang="en">
<?php include '../templates/header.php'; ?>
<body>
<?php include '../templates/navbar.php'; ?>    
<div class="container-fluid">
    <form action="new_tenant.php" method="post">
        <input type="text" name="tenant_name" id="tenant_name" placeholder="Tenant Name"><br><br>
        <label for="rent_payment_date">Rent Payment Date: </label><br><br>
        <input type="date" name="rent_payment_date" id="rent_payment_date"><br><br>
        <?php
        include '../backend/db.php';
        $sql = 'select house_id, house_number from houses';
        $query = mysqli_query($conn, $sql);
        $results = mysqli_fetch_all($query);
        ?>
        <select name="house_id" id="house_id"> 
            <?php         for ($i=0; $i < count($results) ; $i++) {  ?>
            <option value=" " disabled>--House ID--</option>
            <option value="<?= $results[$i][0]; ?>"><?= $results[$i][0]; ?></option>
            <option value="" disabled><?= $results[$i][1]; ?></option>
            <?php } ?>
        </select><br><br>
        <input type="submit" name="add_tenant" id="add_tenant" placeholder="Add Tenant"><br><br>
    </form>
</div>
<?php include '../templates/footer.php'; ?>
</body>
</html>

<?php
        include '../backend/db.php';
if(isset($_POST['add_tenant'])){
    $name = htmlspecialchars($_POST['tenant_name']);
    $date = htmlspecialchars($_POST['rent_payment_date']);
    $house_id = htmlspecialchars($_POST['house_id']);
    $save = mysqli_query($conn,  "insert into tenants(tenant_name,rent_payment_date, house_id) values('$name', '$date', '$house_id')");
    if(!$save){
        echo 'Tenant Not Added!';
    }else{
        echo 'Tenant Added Successfully';
    }
}

?>