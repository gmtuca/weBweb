<?PHP
require_once('../includes/session.php');
require_once('../includes/connection.php');
require_once('../includes/functions.php');
confirm_logged_in();
//confirm_privilege_project($_SESSION['username'], get_url());
?>

<html>
<head>
<?PHP
if (isset ($_POST["headertext"]))
  $headertext = ($_POST["headertext"]);
else $headertext = 'A';

if (isset ($_POST["headerbgtop"]))
  $headerbgtop = ($_POST["headerbgtop"]);
else $headerbgtop = "FFFFFF";

if (isset ($_POST["headerbgbot"]))
  $headerbgbot = ($_POST["headerbgbot"]);
else $headerbgbot = "FFFFFF";

if (isset ($_POST["contentsbgtop"]))
  $contentsbgtop = ($_POST["contentsbgtop"]);
else $contentsbgtop = "FFFFFF";

if (isset ($_POST["contentsbgbot"]))
  $contentsbgbot = ($_POST["contentsbgbot"]);
else $contentsbgbot = "FFFFFF";

if (isset ($_POST["linksareabgtop"]))
  $linksareabgtop = ($_POST["linksareabgtop"]);
else $linksareabgtop = "FFFFFF";

if (isset ($_POST["linksareabgbot"]))
  $linksareabgbot = ($_POST["linksareabgbot"]);
else $linksareabgbot = "FFFFFF";

if (isset ($_POST["linkstextcolor"]))
  $linkstextcolor = ($_POST["linkstextcolor"]);
else $linkstextcolor = "000000";

if (isset ($_POST["linksbgtop"]))
  $linksbgtop = ($_POST["linksbgtop"]);
else $linksbgtop = "FFFFFF";

if (isset ($_POST["linksbgbot"]))
  $linksbgbot = ($_POST["linksbgbot"]);
else $linksbgbot = "FFFFFF";
  
if (isset ($_POST["linkswidth"]))
  $linkswidth = ($_POST["linkswidth"]);
else $linkswidth = "100px";
  
if (isset ($_POST["linksheight"]))
  $linksheight = ($_POST["linksheight"]);
else $linksheight = "100px";
//////////////////////////////////////////////////////////////
$titleArray = array('');

for($c = 1; $c <= 5; $c++)
  if (isset ($_POST["pagetitletext" . $c]))
    array_push($titleArray, ($_POST["pagetitletext" . $c]));
//////////////////////////////////////////////////////////////
$linksArray = array('');

for($l = 1; $l <= 5; $l++)
  if (isset ($_POST["link" . $l]))
    array_push($linksArray, ($_POST["link" . $l]));

//////////////////////////////////////////////////////////////
if (isset ($_POST["maintablewidth"]))
  $maintablewidth = ($_POST["maintablewidth"]);
else $maintablewidth = "900px";

if (isset ($_POST["linksamount"]))
  $linksamount = ($_POST["linksamount"]);
else $linksamount = 5;

/////////////////////////////////////////////////////////////
$contentsArray = array('');

for($i = 1; $i <= $linksamount; $i++)
  if (isset ($_POST["contentstext" . $i]))
    array_push($contentsArray, ($_POST["contentstext" . $i]));
/////////////////////////////////////////////////////////////

if (isset ($_POST["headerheight"]))
  $headerheight = ($_POST["headerheight"]);
else $headerheight = "100px";

if (isset ($_POST["bodybgtop"]))
  $bodybgtop = ($_POST["bodybgtop"]);
else $bodybgtop = "FFFFFF";

if (isset ($_POST["bodybgbot"]))
  $bodybgbot = ($_POST["bodybgbot"]);
else $bodybgbot = "FFFFFF";

if (isset ($_POST["headertextcolor"]))
  $headertextcolor = ($_POST["headertextcolor"]);
else $headertextcolor = "000000";

if (isset ($_POST["contentstextcolor"]))
  $contentstextcolor = ($_POST["contentstextcolor"]);
else $headertextcolor = "000000";

$okToWrite = false;
//make sure the directory isn't too long and that it does not exist yet
if((strlen($headertext) <= 50) && (strlen($headertext) > 1) && !is_dir("../users/" . $_SESSION['username'] . "/" . $headertext))
{
  mkdir("../users/" . $_SESSION['username'] . "/" . $headertext);
  $okToWrite = true;
}

if($okToWrite)///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
{
//Add the Bweb to a MySql database  - CLAUDIU
$column = $headertext;
$username = $_SESSION['username'];
$query = "ALTER TABLE `" . $username . "` ";
$query .= "ADD `{$column}` ";
$query .= "INT (2) NOT NULL";
$result = mysql_query($query, $connection);  
//--------------------------------------------
?>
<meta HTTP-EQUIV="REFRESH" content="0; url=<?PHP echo "../users/" . $_SESSION['username'] . "/" . $headertext . "/index.php"?>">
</head>
<body>
<?PHP
$errorScript = "<b style='color:red'> NON HTML scripts are not allowed (including PHP and Javascript) </b>";
$contentsString = "if (isset ($"."_GET['page']) && ($"."_GET['page'] >= 1) && ($"."_GET['page'] <= " . $linksamount . "))
			    {
                  $"."page = 'contents' . $"."_GET['page']; 
		
                  if ($"."page=='' or $"."page=='contents')
	                include 'contents1..php';
                  else
	                include $"."page . '.php';
                }
                else
                  include 'contents1.php';";
				  
if(isset($_POST['layout']))
  $layout = $_POST['layout'];
else
  $layout = 'left';

$index = fopen("../users/" . $_SESSION['username'] . "/" . $headertext . "/index.php", 'w');
fwrite($index,
"
<?PHP
require_once('../../../includes/session.php');
require_once('../../../includes/connection.php');
require_once('../../../includes/functions.php');
confirm_logged_in();
confirm_privilege_project($"."_SESSION['username'], get_url());
?>
<html>
<head>
<title> " . $headertext . " </title>
<link rel='stylesheet' type='text/css' href='styles.css' />
</head>
<body>
<table align='center' id='maintable' style='width: " .  $maintablewidth .  ";'>
  <tr>
    <?PHP
      include 'header.php';
    ?>
  </tr>
  <tr>
    <td>
	  <table style='width: " .  $maintablewidth .  ";'>
	    <tr>
          <?PHP
		  "
		    . ($layout == 'left' ? "include 'links.php'; $contentsString" : "$contentsString include 'links.php';") . "
          ?>	
	    </tr>
      </table>
  </tr>
</table>
</body>
</html>
"
);
fclose($index);

$header = fopen("../users/" . $_SESSION['username'] . "/" . $headertext . "/header.php", 'w');
fwrite($header,
"
<td id='headerbg'>
  <center id='headertext'>
    <a href='index.php?page=1'>" . $headertext . "</a>
  </center>	 
</td>
"
);
fclose($header);

$linksString = "";
for($i = 1; $i <= $linksamount; $i++)
{
  if(stripos($linksArray[$i],'<?') === false && stripos($linksArray[$i],'<script') === false) 
    $linksString .= '
    <tr> <td class="linkstext">
         <a href=index.php?page=' . $i . '>' . $linksArray[$i] . '</a>
    </td> </tr>';
}

$links = fopen("../users/" . $_SESSION['username'] . "/" . $headertext . "/links.php", 'w');
fwrite($links,
"
<?PHP
require_once('../../../includes/session.php');
require_once('../../../includes/connection.php');
require_once('../../../includes/functions.php');
confirm_logged_in();
confirm_privilege_project($"."_SESSION['username'], get_url());
?>
<td valign='top' id='linksarea'>
    <table border=0 id='linkstable' style='width:" . $linkswidth . ";height:" . $linksheight . "' >
	  " . $linksString . "
    </table>
</td>
"
);
fclose($links);

$writePageArray = array('','','','','','');

for($x = 1; $x < count($contentsArray); $x++)
{
  $writePageArray[$x] = fopen("../users/" . $_SESSION['username'] . "/" . $headertext . "/contents" . $x . ".php", 'w');
  
  if(stripos($contentsArray[$x],'<?') === false
     && stripos($contentsArray[$x],'<script') === false
	 && stripos($titleArray[$x],'<?') === false
	 && stripos($titleArray[$x],'<script') === false)
  {
    fwrite($writePageArray[$x],
    "
	<?PHP
    require_once('../../../includes/session.php');
    require_once('../../../includes/connection.php');
    require_once('../../../includes/functions.php');
    confirm_logged_in();
    confirm_privilege_project($"."_SESSION['username'], get_url());
    ?>
    <td valign='top'  id='contentstable' width='650px'>
      <br>
      <center>
       <span class='pagetitletext' id='pagetitletext" . $x . "'>" . $titleArray[$x] . " </span>
       <br> <br>
       <div id='contentstext'>" . $contentsArray[$x] . "</div>
      </center>
      <br>
    </td>
    "
    );   
  }
  else
  {
    fwrite($writePageArray[$x],"<td valign='top'  id='contentstable' width='650px'> " . $errorScript ."	</td>");
  }

  fclose($writePageArray[$x]);
}

$css = fopen("../users/" . $_SESSION['username'] . "/" . $headertext . "/styles.css", 'w');
fwrite($css,
"
#maintable
{
  border: 0px;
}

a
{
  display: block;
  text-decoration: none;
  font-weight: bold;
}

.linkstext a
{
  color: " . $linkstextcolor . ";
  width:100%;
  height:100%;
  padding-top:15px;
}

.linkstext
{
  font-size: 20px;
  text-align: center; 
  font-weight: bold;
  
  background: -webkit-linear-gradient(top, #" . $linksbgtop . ", #" . $linksbgbot . ");
  background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#" . $linksbgtop . "), to(#" . $linksbgbot  . "));
  background: -moz-linear-gradient(top, #" . $linksbgtop . ", #" . $linksbgbot  . ");
  background: -ms-linear-gradient(top, #" . $linksbgtop . ", #" . $linksbgbot  . ");
  background: -o-linear-gradient(top, #" . $linksbgtop . ", #" . $linksbgbot  . ");
}

.linkstext :hover
{
  background: -webkit-linear-gradient(top, #" . $linksbgbot . ", #" . $linksbgtop . ");
  background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#" . $linksbgbot . "), to(#" . $linksbgtop . "));
  background: -moz-linear-gradient(top, #" . $linksbgbot . ", #" . $linksbgtop  . ");
  background: -ms-linear-gradient(top, #" . $linksbgbot . ", #" . $linksbgtop  . ");
  background: -o-linear-gradient(top, #" . $linksbgbot . ", #" . $linksbgtop  . ");
}

#headertext a
{
  color: #" . $headertextcolor . ";
}

#headertext
{
  font-size: 40px;
  text-align: center;
  font-weight: bold;
}

.pagetitletext
{
  font-size: 30px;
  text-align: center;
  font-weight: bold;
  color: #" . $contentstextcolor . ";
}

#contentstext
{
  font-size: 14px;
  font-family: Arial;
  font-weight: bold;
  text-align:justify;
  color: #" . $contentstextcolor . ";
}
"
);

fclose($css);

$css = fopen("../users/" . $_SESSION['username'] . "/" . $headertext . "/styles.css", 'a');

$imageName = '';
if(isset($_POST["imageName"]) && ($_POST["imageName"]) != '')
{
  $imageName = ($_POST["imageName"]);
  fwrite($css,
  "
body
{
  background-image:url('../" . $imageName . "');
  font-family: arial;
}
"
  );
}
else
{
  fwrite($css,
  "
  body
  {
    background: -webkit-linear-gradient(top, #" . $bodybgtop . ", #" . $bodybgbot . ");
    background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#" . $bodybgtop . "), to(#" . $bodybgbot  . "));
    background: -moz-linear-gradient(top, #" . $bodybgtop . ", #" . $bodybgbot  . ");
    background: -ms-linear-gradient(top, #" . $bodybgtop . ", #" . $bodybgbot  . ");
    background: -o-linear-gradient(top, #" . $bodybgtop . ", #" . $bodybgbot  . ");
	
    font-family: arial;
  }
  "
  );
}

fclose($css);

$css = fopen("../users/" . $_SESSION['username'] . "/" . $headertext . "/styles.css", 'a');

if(!isset ($_POST["transparentheaderbg"]))
{
  fwrite($css,
  "
  #headerbg
  {
    background: transparent;
 
    height: " . $headerheight . ";
  }
  "
  );
}
else
{
  fwrite($css,
  "
  #headerbg
  {
    background: -webkit-linear-gradient(top, #" . $headerbgtop . ", #" . $headerbgbot . ");
    background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#" . $headerbgtop . "), to(#" . $headerbgbot  . "));
    background: -moz-linear-gradient(top, #" . $headerbgtop . ", #" . $headerbgbot  . ");
    background: -ms-linear-gradient(top, #" . $headerbgtop . ", #" . $headerbgbot  . ");
    background: -o-linear-gradient(top, #" . $headerbgtop . ", #" . $headerbgbot  . ");
  
    height: " . $headerheight . ";
  }
  "
  );
}
fclose($css);

$css = fopen("../users/" . $_SESSION['username'] . "/" . $headertext . "/styles.css", 'a');

if(!isset ($_POST["transparentcontentsbg"]))
{
  fwrite($css,
  "
  #contentstable
  {
    background: transparent;
  }
  "
  );
}
else
{
  fwrite($css,
  "
  #contentstable
  {
    background: -webkit-linear-gradient(top, #" . $contentsbgtop . ", #" . $contentsbgbot . ");
    background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#" . $contentsbgtop . "), to(#" . $contentsbgbot  . "));
    background: -moz-linear-gradient(top, #" . $contentsbgtop . ", #" . $contentsbgbot  . ");
    background: -ms-linear-gradient(top, #" . $contentsbgtop . ", #" . $contentsbgbot  . ");
    background: -o-linear-gradient(top, #" . $contentsbgtop . ", #" . $contentsbgbot  . ");
  }
  "
  );
}
fclose($css);

$css = fopen("../users/" . $_SESSION['username'] . "/" . $headertext . "/styles.css", 'a');

if(!isset ($_POST["transparentlinksbg"]))
{
  fwrite($css,
  "
  #linksarea
  {
    background: transparent;
  }
  "
  );
}
else
{
  fwrite($css,
  "
  #linksarea
  {
   background: -webkit-linear-gradient(top, #" . $linksareabgtop . ", #" . $linksareabgbot . ");
    background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#" . $linksareabgtop . "), to(#" . $linksareabgbot  . "));
    background: -moz-linear-gradient(top, #" . $linksareabgtop . ", #" . $linksareabgbot  . ");
    background: -ms-linear-gradient(top, #" . $linksareabgtop . ", #" . $linksareabgbot  . ");
    background: -o-linear-gradient(top, #" . $linksareabgtop . ", #" . $linksareabgbot  . ");
  }
  "
  );
}
fclose($css);

}//if okToWrite ////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
</body>
</html>