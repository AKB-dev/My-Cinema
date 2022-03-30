<?php require ('include/database.php') ?>
<!DOCTYPE html>
<html lang="en">
<?php include('include/header.php')?>

<div>
    <div>
        <h2 class="center">Search for Date</h2>
    </div>
    <form action="/Schedule.php" method="POST">
        <div class="row">
            <div class="input-field col s3">
                <input type="date" name="date">
                <input type="submit" name="submit" class="submit btn" value="search">
            </div>
            <div class="col s9">
                <?php 
                    if(isset($_POST['submit'])) {
                        $date = $_POST['date'];
                        $p = date('Y-m-d', strtotime($date. '+1 days'));

                            $query = $db->prepare(
                                "SELECT movie.title, movie_schedule.date_begin 
                                FROM movie 
                                INNER JOIN movie_schedule on movie.id = movie_schedule.id_movie 
                                WHERE date_begin BETWEEN '$date' AND '$p'"
                            );
                ?>
                <table>
                    <thead>
                        <tr>
                            <th>TITLE</th>
                            <th>Date de Projection</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php 
                    $query->execute();
                    while ($dates = $query->fetch()) {
                ?>
                        <tr>
                            <td><?php print $dates['title']?></td>
                            <td><?php print $dates['date_begin']?></td>
                        </tr>
                <?php
                }
                ?>
                    </tbody>
                </table>

            </div>
            <?php
            } 
            ?>
        </div>
    </form>
</div>