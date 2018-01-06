<?php 
//error_reporting(0);
  include_once('common.php');
  page_protect();

   $id=$_SESSION['user_id'];
 /* if(!isset($_SESSION['user_id']))
  {
    header("location:logout.php");
  }*/
  $user_session = $_SESSION['user_session'];

  $client = "";
  $wallet_address = "";
  if(_LIVE_)
  {
    $client = new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
    if(isset($client))
    {
       $wallet_address  = $client->getnewaddress($user_session);

    }

  }
   $btcaddress=$_POST['btcaddress'];
   $txtChar=$_POST['txtChar'];
 
        if($user_session){
            $sql="Update withdraw set `address`='$btcaddress',`currency`='$txtChar',`user_id`='$id' where username='$user_session'";
            $query=$mysqli->query($sql);
           if($query){
           ob_start();
           header('Location:withdraw.php?msg=Balance send successfully!');
         }
         }
        /* else{
          $sql="INSERT INTO `withdraw` ( `user_id`, `address`) VALUES ('$id', '$wallet_address');";
           $query=mysqli_query($mysqli,$sql) or die(mysqli_error());
           ob_start();
           header('Location:../withdraw.php?msg='.$wallet_address);

         }*/

        ?>