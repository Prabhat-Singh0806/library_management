<?
function page_header()
{
    try {
        ?>
            <?php
include 'dbconfig.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/bootstrap.bundle.min.js"></script>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    .containerx {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-content: flex-start;
      width: 100%;
      height: 100vh;
      overflow: scroll;
    }

    .flexc {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: center;
    }

    nav {
      width: 100%;
      height: 15vh;
      background-color: black;
      color: white;
    }

    .headcontainer {
      width: 90%;
      height: 15vh;
      border-bottom: 1px solid;
    }

    .search {
      width: 100%;
      height: 15vh;
    }
    .search button{
      margin-left: 10px;
      /* height:30px; */
    }
    .action {
      width: 100%;
      height: 6vh;
      justify-content: space-evenly;
    }
    .viewbook{
      width: 90%;
      height: fit-content;
      margin-top: 5vh;
    }
    form{
  width: 100%
}
.footer{
      width: 100%;
      height: 25vh;
      background-color: black;
      color: white;
      
    }

  </style>
</head>

<body>
  <div class="containerx">

    <nav class="flexc">
      <div class="navtext flexc">
        Library Management system
      </div>
    </nav>
    <div class="headcontainer flexc">
      <label for="admin">Admin Dashboard</label>
    </div>
    <div class="search flexc">
      <form action="searched.php" method="post" class="search flexc">
        <input type="text" name="book_name_searched" placeholder="Search book"><button type="submit" class="btn btn-outline-success btn-sm">Search</button>
      </form>
    </div>
    <div class="action flexc ">
    <a class="btn btn-primary" href="addbook.php" role="button">Add book</a>
    <a class="btn btn-primary" href="viewbooks.php" role="button">View books</a>
      <a class="btn btn-primary" href="viewissue.php"role="button">view Issued Book</a>
    </div>
    <div class="viewbook flexc">
        <?
    } catch (Exception $e) {
        
    }
}

function page_footer()
{
   try {
        ?>
         </div>
  </div>
  <div class="footer flexc">
  <p>PHP micro Project on library system by team members</p>
  <ul style="width:100%">
    <li>Shreyas</li>
    <li>Shashikant</li>
    <li>Prabhat</li>
    <li>Altaf</li>
  </ul>
</div>
</body>

</html>
        <?
   } catch (Exception $e) {
    
   } 
}

?>