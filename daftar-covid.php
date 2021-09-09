<?php 
include ("konek.php");
$sql= "SELECT * FROM covid";
$covid= mysqli_query($db,$sql);

?>
 <div class="table-responsive ">
        <table id="table-datables " class="table table-paginate" border="1">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Provinsi</th>
                    <th>Meninggal</th>
                    <th>Dirawat</th>
                    <th>Sembuh</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
            <?php

            

            while($member= mysqli_fetch_array($query)){
                echo "<tr>";

                echo "<td>".$no++. "</td>";
                echo "<td>".$member['provinsi']."</td>";
                echo "<td>".$member['meninggal']."</td>";
                echo "<td>".$member['perawatan']."</td>";
                echo "<td>".$member['sembuh']."</td>";

                echo "<td>";
                echo "<a href='form-edit.php?id=".$member['id']."'>edit</a> | ";
                echo '<a href="hapus.php?id='.$member['id'].'" onclick="return confirm(\'yakin ingin menghapus?\')". >hapus</a> |';
                echo "</td>";
                echo "</tr>";

            }
            ?>

            </tbody>
        </table>
    
    
    </div>
            <p>Total : <?php echo mysqli_num_rows($query) ?></p>
    </div>
            </div>
        </div>