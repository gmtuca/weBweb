<?PHP
require_once('../includes/session.php');
require_once('../includes/connection.php');
require_once('../includes/functions.php');
confirm_logged_in();
//confirm_privilege_project($_SESSION['username'], get_url());
?>
<?PHP
  if(isset($_POST['destinationChange']))
    $destinationChange = $_POST['destinationChange'];
	
  if(isset($_POST['fileNameInput']))
    $previousFile = $_POST['fileNameInput'];

  if($previousFile != "")
    unlink($previousFile); //delete the previous file if the user uploads a new one
	
  $imgName = basename($_FILES['image_file']['name']);  // get file name 
  $fileExtension = pathinfo($imgName, PATHINFO_EXTENSION); // get file extentension
  
  //make sure it's an IMAGE file
  if((($fileExtension == "jpg")||($fileExtension == "png")||($fileExtension == "bmp")||($fileExtension == "gif"))&& filesize('uploaded/' . $imgName) <= 900000)
  {
    @move_uploaded_file($_FILES['image_file']['tmp_name'], "../users/" . $_SESSION['username'] . "/" . $imgName); // upload file to server
    ?>
    <script type="text/javascript">
    parent.fileNameToInput('<?PHP echo "../users/" . $_SESSION['username'] . "/" . $imgName; ?>');
	parent.imageNameToInput('<?PHP echo $imgName; ?>');
    </script>
    <?PHP
  }
?>
