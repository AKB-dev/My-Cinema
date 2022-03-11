<?php 

require ('include/database.php') ?>
<!DOCTYPE html>
<html lang="en">
    <?php include('include/header.php')?>
<div class="main">
    <div id="content">
        <div id="search">
            <h2 class="center">Search for movie</h2>
            <form action="movies.php" method="POST">
                <div class="row">
                <div class="">
                    <input type="text" name="title" class="validate" placeholder="Search By Title, Genre or Distributor"/>
                </div>
                </div>
                            
                <input type="submit" name="submit" class="submit btn" value="search">
            </form>
        </div>

        <?php
            if (isset($_POST['submit'])) {
                $title = $_POST['title'];
                $genre = $_POST['genre'];
                $dist = $_POST['distributor'];
            ?>
            <table>
                <thead>
                    <tr>
                        <th>TITLE</th>
                        <th>GENRE</th>
                        <th>DISTRIBUTOR</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $query = $db->prepare("SELECT title FROM movie WHERE title LIKE '%$title%' LIMIT 10");
                        $query->execute();
                        while($col = $query->fetch()){
                        ?>
                        <tr>
                            <td><?PHP echo $col['title']?></td>
<!--                             <td><?PHP// echo $col['title']?></td>-->
<!--                             <td><?PHP// echo $col['title']?></td>-->                        
                        </tr>
                        <?php
                        }
                        ?>
                </tbody>
            </table>
            <?php
            }
            ?>
    </div>
</div>
</html>







