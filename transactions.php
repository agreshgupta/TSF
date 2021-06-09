<?php
  include 'conn.php';
  $data = "select * from transfers;";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>TSF Transactions</title>
    <link rel="shortcut icon" type="image/jpg" href="favicon.jpg">
    <link rel="stylesheet" href="main.css">
    <style media="screen">
      .box{
        left: auto;
        overflow-y: scroll;
      }
      .box table{
        text-align: center;
        line-height: 35px;
      }
      .box table thead{
        background-color: #36abd3;
        color: #fff;
        font-size: 1.1rem;
      }
      .box table tbody tr{
        background-color: #ececec;
      }
      .box table tbody tr:nth-child(odd){
        background-color: #fff;
      }
    </style>
  </head>
  <header>
    <h1>TSF Bank</h1>
    <nav class="navigation">
      <a href="index.html">Home</a>
      <a href="users.php">Users</a>
      <a href="transactions.php">Transactions</a>
      <a href="about.html">About Us</a>
    </nav>
  </header>
  <body>
    <div class="box">
      <?php
        $runData = mysqli_query($conn, $data) or die(mysqli_error());
        if($runData)
          {
      ?>
      <table>
        <thead>
          <th>TransferId</th>
          <th>Sender</th>
          <th>Amount</th>
          <th>Receiver</th>
        </thead>
        <tbody>
          <?php
          while ($row = mysqli_fetch_assoc($runData)) {
            echo "<tr><td>{$row['TransferId']}</td><td>{$row['From_Sender']}</td><td>{$row['Amount']}</td><td>{$row['To_Receiver']}</td></tr>\n";
          }
          ?>
        </tbody>
      </table>
      <?php
        }
      ?>
    </div>
  </body>
  <footer>
    <p>Copyright & copy TSF Bank - 2021 | Developed by Agresh Gupta</p>
  </footer>
</html>
