<?php
  if(isset($_POST['Send'])){
    $senderNme = $_POST['senderName'];
    $senderEml = $_POST['senderMail'];
    $receiver = $_POST['BenReceiver'];
    $amount = $_POST['amount'];
    if ($senderEml == $receiver) {
      header('location: users.php?msg=Can not send to self.');
    }
    else {
      include 'conn.php';
      $creditQuery = "update customer set Balance = Balance + $amount where Email = '$receiver';";
      $runCredit = mysqli_query($conn, $creditQuery) or die(mysqli_error());
      if($runCredit){
        $debitQuery = "update customer set Balance = Balance - $amount where Email = '$senderEml';";
        $runDebit = mysqli_query($conn, $debitQuery) or die(mysqli_error());
        if($runDebit){
          $benRec;
          switch ($receiver)
          {
            case "agresh5@gmail.com":
              $benRec = "Agresh Gupta";
            break;
            case "amit@gmail.com":
              $benRec = "Amit Shah";
            break;
            case "Joe@gmail.com":
              $benRec = "Joe Bidan";
            break;
            case "mamta@gmail.com":
              $benRec = "Mamta Didi";
            break;
            case "shashi@gmail.com":
              $benRec = "Shahi Tharoor";
            break;
            case "rahul@gmail.com":
              $benRec = "Rahul Gandhi";
            break;
            case "narendra@gmail.com":
              $benRec = "Nanrendra Modi";
            break;
            case "pmcares@gmail.com":
              $benRec = "PM Cares Fund";
            break;
          }
          $keepRecord = "insert into transfers (From_Sender, To_Receiver, Amount) values ('$senderNme', '$benRec', '$amount');";
          $runRecord = mysqli_query($conn, $keepRecord) or die(mysqli_error());
          if($runRecord){
            header('location: users.php?msg=Transaction Success!');
          }
          else {
            header('location: users.php?msg=Transaction failed!');
          }
        }
      }
    }
  }
?>
