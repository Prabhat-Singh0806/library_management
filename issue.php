<?
include 'dbconfig.php';
require_once('pagestructure.php');
page_header();
$startdate = date('Y-m-d');
$enddate = date('Y-m-d', strtotime($startdate . '+ 30 days'));
$id=$_REQUEST['id'];
$bookname = $_REQUEST['bookname'];
$bookauthor = $_REQUEST['bookauthor'];
$publication = $_REQUEST['bookpublication'];
if (isset($_POST['issued'])) {
  $name = $_REQUEST['name'];
  $email = $_REQUEST['email'];
  $contact = $_REQUEST['contact'];
  $issue = $_REQUEST['issue'];
  $return = $_REQUEST['return'];
$sql="INSERT INTO `issue_book` (`id`, `book_name`, `book_author`, `name`, `email`, `contact`, `issued_date`, `return_date`, `status`) VALUES ('NULL', '$bookname', '$bookauthor', '$name', '$email', '$contact', '$issue', '$return', '1');";
$result = mysqli_query($conn,$sql);
if (!$result) {
  ?>
  <div class="container mt-2">
    <div class="row g-3">
      <div class="col">
        <b><p><center><font color='red'>book issued failed</font></center></p></b>
      </div>
    </div>
  </div>
<?
}
if ($result) {
  $sql = "UPDATE `book` SET `Book_Status` = '1' WHERE `book`.`id` = '$id';";
  $return = mysqli_query($conn, $sql);
  ?>
  <div class="container mt-2">
    <div class="row g-3">
      <div class="col">
        <b><p><center><font color='green'>book issued succesfully</font></center></p></b>
      </div>
    </div>
  </div>
<?
}
}
?>
<form action="" method="post">
  <div class="container mt-2">
    <div class="row g-3">
      <div class="col">
        <input type="text" class="form-control" placeholder="Name" aria-label="First name" name="name" required>
      </div>
      <div class="col">
        <input type="email" class="form-control" placeholder="Email" aria-label="Last name" name="email" required>
      </div>
      <div class="col">
        <input type="number" class="form-control" placeholder="Contact" aria-label="Last name" name="contact" required>
        <input type="hidden" name="bookname" value="<?= $bookname ?>">
        <input type="hidden" name="bookauthor" value="<?= $bookauthor ?>">
        <input type="hidden" name="id" value="<?=$id?>"> 
        <input type="hidden" name="bookpublication" value="<?= $publication ?>">
      </div>
    </div>
  </div>
  <div class="container mt-5">
    <div class="row g-3">
      <div class="col">
        <input type="date" class="form-control" aria-label="issue Date" name="issue" required value="<?=$startdate?>" min="<?=$startdate?>" max="<?=$startdate?>">
      </div>
      <div class="col">
        <input type="date" class="form-control" aria-label="Return Date" name="return" required value="<?=$startdate?>" min="<?=$startdate?>" max="<?=$enddate?>">
      </div>
    </div>
  </div>
  <div class="container mt-5">
    <div class="row g-3">
      <button type="submit" class="btn btn-success btn-lg mt5" style="width:20%" name="issued">Submit</button>
    </div>
  </div>
</form>
<?
page_footer();
?>