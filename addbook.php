<?
include 'dbconfig.php';
require_once('pagestructure.php');
page_header();
if (isset($_POST['Add_book'])) {
  $bookname = $_REQUEST['bookname'];
  $bookauthor = $_REQUEST['book_author'];
  $publication = $_REQUEST['publication'];
  $sql = "INSERT INTO `book` (`id`, `Book_Name`, `Book_Author`, `Publication`, `Book_Status`) VALUES ('NULL', '$bookname', '$bookauthor', '$publication', '0');";
  $result = mysqli_query($conn, $sql);
  if (!$result) {
    ?>
    <div class="container mt-2">
      <div class="row g-3">
        <div class="col">
          <b><p><center><font color='red'>book did not added</font></center></p></b>
        </div>
      </div>
    </div>
  <?
  }
  if ($result) {
    ?>
    <div class="container mt-2">
      <div class="row g-3">
        <div class="col">
          <b><p><center><font color='green'>book Added succesfully</font></center></p></b>
        </div>
      </div>
    </div>
  <?
  }
}
?>
<form action="<?echo $_SERVER['PHP_SELF'];?>" method="post">
  <div class="container mt-2">
    <div class="row g-3">
      <div class="col">
        <input type="text" class="form-control" placeholder="Book Name" aria-label="First name" name="bookname"
          required>
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="Book Author" aria-label="First name" name="book_author"
          required>
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="publication" aria-label="First name" name="publication"
          required>
      </div>
    </div>
  </div>
  <div class="container mt-5">
    <div class="row g-3">
      <button type="submit" class="btn btn-success btn-lg mt5" style="width:20%" name="Add_book">Submit</button>
    </div>
  </div>
</form>
<?
page_footer();
?>