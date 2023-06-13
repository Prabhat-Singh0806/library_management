<?
include 'dbconfig.php';
require_once('pagestructure.php');
page_header();
$seid = $_REQUEST['book_name_searched'];
if (isset($_POST['remove'])) {
    $id = $_REQUEST['id'];
    $sql = "DELETE FROM `book` WHERE `book`.`id` = '$id'";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo "-10";
    }
    if ($result) {
        ?>
            <div class="container mt-2">
                <div class="row g-3">
                    <div class="col">
                        <b>
                            <p>
                                <center><font color='green'>book Removed succesfully</font></center>
                            </p>
                        </b>
                    </div>
                </div>
            </div>
        <?
    }
}
?>
<table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Book name</th>
            <th scope="col">Author</th>
            <th scope="col">publication</th>
            <th scope="col">status</th>
            <th scope="col">Issue</th>
            <th scope="col">Remove</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          <?php
          $sql = "SELECT * FROM book WHERE Book_Name = '$seid'";
          $result = mysqli_query($conn,$sql);
          while ($s = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
            <th scope="row"><?=$s['id']?></th>
            <td><?=$s['Book_Name']?></td>
            <td><?=$s['Book_Author']?></td>
            <td><?=$s['Publication']?></td>
            <td>
              <?if($s['Book_Status']=='0')
              {echo "<font color='green'>Available</font>";}
              else {
              echo "<font color='red'>issued</font>";
               }?>
            </td>
            <td>
               <form action="issue.php" method="post">
                <input type="hidden" name="bookname" value="<?=$s['Book_Name']?>"> 
                <input type="hidden" name="id" value="<?=$s['id']?>"> 
                <input type="hidden" name="bookauthor" value="<?=$s['Book_Author']?>"> 
                <input type="hidden" name="bookpublication" value="<?=$s['Publication']?>"> 
               <button type="submit" class="btn btn-outline-primary btn-sm" <?if($s['Book_Status']=='1')
              {echo "disabled";}?>>issue</button>
               </form>
            </td>
            <td>
            <form action="" method="post">
                <input type="hidden" name="id" value="<?=$s['id']?>">
               <button type="submit" class="btn btn-outline-danger btn-sm" name="remove">Remove</button>
               </form>
            </td>
          </tr>
            <?
          }
          ?>
          
          
          
        </tbody>
      </table>
<?
page_footer();
?>