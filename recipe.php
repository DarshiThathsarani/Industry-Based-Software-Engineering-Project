<?php
require_once './includes/header.php';
//if not logged in return him to login page
LogInCheck();
require_once './includes/admin_nav.php';
?>
<!--exp1-->

    <div class="col-sm-10 col-sm-offset-1">
    <div class="row">
    <!--place for error message flashing-->
        <?php
        //this will display any kind of error message as
        flash();
        ?>
    </div>
    <div class="row">
        <?php
        if($_SESSION['role']== 'admin')
            {
            echo'<a href="#addnew" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> New</a>';
            }
        ?>
    </div>
    <div class="" style="height: 10px;">
    </div>
    <div class="row">

    <marquie><h3 class="text-muted text-center">ALL RECIPIES</h3></marquie>
       <table id="myTable" class="table table-hover table-bordered table-striped table-responsive">
            
            <?php
			include_once('db.php');
			//sql according to role
            $item_current_dept_id = $_SESSION['dept_id'];
			
            $sql = ($_SESSION['role']=='admin') ? "SELECT * FROM recipe"  :
                                                    "SELECT * FROM recipe";

            if($_SESSION['role'] == 'admin')
            {
			//echo for admin
            echo '<thead>
            <tr>
            <th>#</th>
            <th>RECIPE NAME</th>
            <th>ITEM 1</th>
            <th>QUANTITY</th>
            <th>ITEM 2</th>
            <th>QUANTITY</th>
            <th>ITEM 3</th>
            <th>QUANTITY</th>
            <th>ACTION</th>
            </tr>
            </thead>
            <tbody>';

			$query = $conn->query($sql);
			$i = 1;
			while($row = $query->fetch_assoc())
            {
			echo"<tr>
                    <td>".$i."</td>
					<td>".$row['name']."</td>
					<td>".$row['item1']."</td>
					<td>".$row['q1']."</td>			
					<td>".$row['item2']."</td>
					<td>".$row['q2']."</td>
					<td>".$row['item3']."</td>
                    <td>".$row['q3']."</td>
					<td><a href='#edit_".$row['id']."' class='btn btn-success btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Edit</a>
					<a href='#delete_".$row['id']."' class='btn btn-danger btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span> Delete</a>
					</td>
				</tr>";
			    $i++;
				include('models/edit_delete_recipeModel.php') ;
			}
			?>
            </tbody>
       </table>
        <hr>
    <?php
        //add required models
        require_once 'models/add_recipeModel.php';
    ?>
</div>
</div>
    <?php
                //end of admin check
            }

    //begin for non admin view


        if($_SESSION['role'] == 'dept') {
            //echo for admin
            echo '<thead>
            <tr>
            <th>#</th>
            <th>RECIPE NAME</th>
            <th>ITEM 1</th>
            <th>QUANTITY</th>
            <th>ITEM 2 </th>
            <th>QUANTITY</th>
            <th>ITEM 3</th>
            <th>QUANTITY</th>
            </tr>
            </thead>
            <tbody>';


            $query = $conn->query($sql);
            $i = 1;
            while ($row = $query->fetch_assoc()) {
                echo"<tr>
                    <td>".$i."</td>
					<td>".$row['name']."</td>
					<td>".$row['item1']."</td>
					<td>".$row['q1']."</td>			
					<td>".$row['item2']."</td>
					<td>".$row['q2']."</td>
					<td>".$row['item3']."</td>
                    <td>".$row['q3']."</td>
				</tr>";
			    $i++;
            }
        }
            ?>
            </tbody>
            </table>
            <hr>
            </div>
            </div>



<?php require_once './includes/footer.php'; ?>