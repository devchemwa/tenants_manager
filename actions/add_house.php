<!DOCTYPE html>
<html lang="en">
<?php include '../templates/header.php'; ?>
<body>
    <?php include '../templates/navbar.php'; ?>

<div class="container-fluid">
    <form action="add_house.php" method="post">
        <input type="text" name="house_number" id="house_number" placeholder="House Number"><br><br>
         <select name="pricing" id="pricing">
            <option value=" " disabled>--House Pricing--</option>
            <?php 
            $pricing = array('5000','7000','8000');
            for ($i = 0; $i < count($pricing); $i++){ 
            ?>
            <option value="<?= $pricing[$i] ?>"><?= $pricing[$i] ?></option>
            <?php } ?>
         </select><br><br>
         <label for="description">House Description: </label><br><br>
         <textarea name="house_description" id="house_description" cols="25" rows="10"></textarea><br><br>
         <input type="submit" name="add_house" id="add_house"><br><br>
    </form>
</div>

    <?php include '../templates/footer.php'; ?>
</html>

<?php
include '../backend/db.php';

if(isset($_POST['add_house'])){
    $house_number = htmlspecialchars($_POST['house_number']);
    $pricing = htmlspecialchars($_POST['pricing']);
    $description = htmlspecialchars($_POST['house_description']);
    $query = "insert into houses(house_number,pricing,description) values('$house_number','$pricing','$description')";
    $save = mysqli_query($conn, $query);
    if($save){
        echo "House Added Successfully!" . '<br><br>';
    }else{
        echo "House Not Added!" . '<br><br>';
    }
}

?>