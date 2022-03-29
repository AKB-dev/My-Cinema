<?php include ('include/database.php') ?>
<!DOCTYPE html>
<html lang="en">
<?php include('include/header.php')?>

<div class="main">
    <div>
        <div>
            <h2 class="center">Search for Members</h2>
        </div>
        <form action="/members.php" method="POST" class="col s12">
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" name="search">
                    <label for="name">Search for Name</label>
                    <input type="submit" name="submit" class="submit btn " value="search">
                </div>
            </div>
        </form>
    </div>
    <?php 
        if (isset($_POST['submit'])) {
            $name = $_POST['search'];
            ?>
            <table>
            <thead>
                    <tr>
                        <th>FIRST NAME</th>
                        <th>LAST NAME</th>
                        <th>EMAIL</th>  
                    </tr>
                </thead>
                <tbody>
                <?php
                if(isset($name)){
                    $query = $db ->prepare(
                        "SELECT firstname, lastname, email 
                        FROM user
                        WHERE firstname LIKE '%$name%' OR lastname LIKE '%$name%'"
                    );
                }
                    $query->execute();
                    while($col = $query->fetch()){
                    ?>
                        <tr>
                            <td><?PHP print $col['firstname']?></td>  
                            <td><?php print $col['lastname']?></td>
                            <td><?php print $col['email']?></td>
                            <td><button data-target="modal1" type="submit" name="plusInfo" class="tiny material-icons btn-floating modal-trigger">add</button></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <?php
            $plusBtn = $_POST['plusInfo'];
            if(isset($plusBtn)) {
            ?>

            <?php
            }
            ?>
        <?php
        }
        ?>
    
</div>
</html>