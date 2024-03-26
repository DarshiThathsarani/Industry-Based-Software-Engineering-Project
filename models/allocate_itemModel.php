<!-- Add New -->
<div class="modal fade" id="allocate_<?php echo $row['item_id'] ;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Allocate Item</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="./actions/__allocate_itemModel.php">
                            <input type="hidden" class="form-control" maxlength="20" name="item_id"  value="<?php echo $row['item_id'] ;?>">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">CHOOSE DEPARTMENT:</label>
                            </div>
                            <div class="col-sm-10">
                                <!--begin option-->
                                <?php
                                //code for fetching the suppliers' information
                                require_once './db.php';
                                $sql = "SELECT * FROM `department` WHERE  `dept_id` <> '1'";

                                $query = $conn->query($sql);
                                echo "<select class='form-control id='dept_id' name='dept_id'>";
                                while($row = $query->fetch_assoc()){
                                    echo"<option value='".$row['dept_id']."'>".$row['dept_name']."'</option>";
                                }
                                echo"</select>";
                                ?>
                                <!--end-->
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Allocate</a></button>
                    </form>
            </div>

        </div>
    </div>
</div>