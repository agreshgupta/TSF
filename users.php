<?php
  if(isset($_GET['msg'])){
    $alert=$_GET['msg'];
    echo ("<script>alert('$alert')</script>");
  }
  include 'conn.php';
  $usersdata = "select * from customer;";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>TSF Users</title>
    <link rel="shortcut icon" type="image/jpg" href="favicon.jpg">
    <link rel="stylesheet" href="main.css">
  </head>
  <style media="screen">
  .box{
    border: none;
  }
  .box table{
    text-align: center;
    line-height: 35px;
    margin: auto;
    width: 100%;
  }
  .box table thead{
    background-color: #000000ad;
    color: #fff;
    font-size: 1.1rem;
  }
  .box table tbody tr{
    background-color: #fff;
  }
  .box table tbody tr td button{
    cursor: pointer;
    background-color: #35ade1b3;
  }
  .frm{
    display: grid;
    justify-content: center;
    border: 2px solid;
    height: 85%;
    margin: auto;
    width: 400px;
    background-color: #f8f8f8;
  }
  .frm h3{
    margin: auto;
    font-size: 1.6rem;
    margin-top: 3px;
    margin-bottom: 20px;
    background-color: #161616ad;
    color: #fff;
    display: flex;
    justify-content: center;
    border-radius: 10px;
    align-items: center;
    width: 100%;
  }
  .frm input, .frm select{
    display: block;
    height: 30px;
    width: 300px;
    padding-left: 5px;
    font-size: 1.1rem;
    outline: none;
  }
  .btns{
    display: flex;
    justify-content: space-between;
  }
  .btns input{
    width: 120px;
    font-size: .8rem;
    background-color: #35ade1b3;
    cursor: pointer;
  }
 
  </style>
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
        $runUsersData = mysqli_query($conn, $usersdata) or die(mysqli_error());
        if($runUsersData)
          {
      ?>
      <table>
        <thead>
          <td>S.No.</td>
          <td>Customer Name</td>
          <td>Customer Email</td>
          <td>Current Balance (Rs)</td>
          <td>Operation</td>
        </thead>
        <tbody>
          <?php
          while ($row = mysqli_fetch_assoc($runUsersData)) {
            echo "<tr><td>{$row['SNo']}</td><td>{$row['Name']}</td><td>{$row['Email']}</td><td>{$row['Balance']}</td><td><button onclick = f{$row['SNo']}()>&nbsp Transact &nbsp</button></td></tr>\n";
          }
          ?>
        </tbody>
      </table>
      <?php
        }
      ?>
    </div>
    <div class="box">
      <form class="frm" action="action.php" method="post">
        <h3>Transaction Window</h3>
        <input id="sname" type="text" name="senderName" readonly placeholder="Sender' Name">
        <input id="smail" type="email" name="senderMail" readonly placeholder="Sender's Email">
        <select class="options" name="BenReceiver" id="BenReceiver" size="1">
          <option disabled selected>Select Receiver</option>
          <option value="agresh@gmail.com">Agresh Gupta</option>
          <option value="amit@gmail.com">Amit Shah</option>
          <option value="Joe@gmail.com">Joe Bidan</option>
          <option value="mamta@gmail.com">Mamta Didi</option>
          <option value="shashi@gmail.com">Shashi Tharoor</option>
          <option value="rahul@gmail.com">Rahul Gandhi</option>
          <option value="narendra@gmail.com">Narendra Modi</option>
          <option value="pmcares@gmail.com">PM Cares Fund</option>
        </select>
        <input required id="amount" type="number" min="1" name="amount" placeholder="Amount">
        <div class="btns">
          <input type="submit" name="Send" value="Make Transaction">
          <input type="reset" name="Reset" value="Reset">
        </div>
      </form>
    </div>
    <script src="main.js" type="text/javascript"></script>
  </body>
  <footer id="copyright">
    <p>Copyright & copy TSF Bank - 2021 | Developed by Agresh Gupta</p>
  </footer>
</html>
