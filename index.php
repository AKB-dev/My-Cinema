<?php 

require ('include/database.php') ?>
<!DOCTYPE html>
<html lang="en">
    <?php include('include/header.php')?>
<div class="main">
    <div id="content">
        <div id="search">
            <h2 class="center">Search for movie</h2>
            <form action="index.php" method="POST">
                <div class="row">
                <div class="">
                    <input type="text" name="search" class="validate" placeholder="Search By Title, Genre or Distributor"/>
                </div>
                </div>
                            
                <input type="submit" name="submit" class="submit btn" value="search">
            </form>
        </div>

        <?php
            if (isset($_POST['submit'])) {
                $search = $_POST['search'];
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
                        // $requete = <<<END
                        // SELECT movie.title, genre.name 
                        // FROM movie 
                        // INNER JOIN movie_genre 
                        // ON movie.id = movie_genre.id_movie
                        // INNER JOIN genre 
                        // ON movie_genre.id_genre = genre.id
                        // WHERE movie.title LIKE '%$search%' OR genre.name LIKE '%$search%' LIMIT 10
                        // END;
                        $query = $db->prepare(
                        "SELECT movie.title, genre.name 
                        FROM movie 
                        INNER JOIN movie_genre 
                        ON movie.id = movie_genre.id_movie
                        INNER JOIN genre 
                        ON movie_genre.id_genre = genre.id
                        WHERE movie.title LIKE '%$search%' OR genre.name LIKE '%$search%'");
                        $query->execute();
                        while($col = $query->fetch()){
                        ?>
                        <tr>
                            <td><?PHP print $col['title']?></td>  
                            <td><?php print $col['genre']?></td>
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







