<?
include 'dbconfig.php';
require_once('pagestructure.php');
page_header();
if (isset($_POST['return'])) {
    $id = $_REQUEST['id'];
    $sql = "UPDATE `issue_book` SET `status` = '0' WHERE `issue_book`.`id` = '$id';";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo "-10";
    }
    if ($result) {
        $sql = "UPDATE `book` SET `Book_Status` = '0' WHERE `book`.`id` = '$id';";
        $return = mysqli_query($conn, $sql);
        if ($return) {
            ?>
            <div class="container mt-2">
                <div class="row g-3">
                    <div class="col">
                        <b>
                            <p>
                                <center><font color='green'>Returned succesfully</font>
                                </center>
                            </p>
                        </b>
                    </div>
                </div>
            </div>
            <?
        }
    }
}
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Book name</th>
            <th scope="col">Author</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Contact</th>
            <th scope="col">Issued On</th>
            <th scope="col">Return Date</th>
            <th scope="col">Status</th>
            <th scope="col">Return</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        <?php
        $sql = "SELECT * FROM issue_book";
        $result = mysqli_query($conn, $sql);
        while ($s = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <th scope="row">
                    <?= $s['id'] ?>
                </th>
                <td>
                    <?= $s['book_name'] ?>
                </td>
                <td>
                    <?= $s['book_author'] ?>
                </td>
                <td>
                    <?= $s['name'] ?>
                </td>
                <td>
                    <?= $s['email'] ?>
                </td>
                <td>
                    <?= $s['contact'] ?>
                </td>
                <td>
                    <?= $s['issued_date'] ?>
                </td>
                <td>
                    <?= $s['return_date'] ?>
                </td>
                <td>
                    <? if ($s['status'] == '0') {
                        echo "<font color='green'><b>Returned</b></font>";
                    } else {
                        echo "<font color='red'><b>Not Returned</b></font>";
                    } ?>
                </td>
                <td>
                    <form action="<? echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <input type="hidden" name="id" value="<?= $s['id'] ?>">
                        <button type="submit" class="btn btn-outline-danger btn-sm" name="return" 
                        <?if ($s['status'] == '0') {
                        echo "disabled";}?>>Return</button>
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