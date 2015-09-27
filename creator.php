<?PHP
require_once('../includes/session.php');
require_once('../includes/connection.php');
require_once('../includes/functions.php');
confirm_logged_in();
//confirm_privilege_project($_SESSION['username'], get_url());
?>

<!DOCTYPE html>
<html>
<head> 
<title> weBweb </title>
    <!-- jquery -->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css" />
	
	<script type="text/javascript">
    $(function() {
        $( "#maintable" ).resizable();
		  $( "#maintable" ).resizable( "option", "minWidth", 615 );
		  $( "#maintable" ).resizable( "option", "minHeight", 600 );
		$( "#linkstable" ).resizable();
	      $( "#linkstable" ).resizable( "option", "minWidth", 230 );
		  $( "#linkstable" ).resizable( "option", "maxWidth", 340 );
		  $( "#linkstable" ).resizable( "option", "minHeight", 230 );
		  $( "#linkstable" ).resizable( "option", "maxHeight", 400 );
		$( "#headerbg" ).resizable();
		  $( "#headerbg" ).resizable( "option", "minHeight", 135 );
		  $( "#headerbg" ).resizable( "option", "maxHeight", 255 );
    });
    </script>

<link rel='stylesheet' type='text/css' href='choiceButton.css' />
<style type="text/css">
body
{
  font-weight: bold;
  font-family: arial;
}
.color, .widthheight
{
  text-align: center;
  width: 60px;
}

.widthheight
{
  background: #CFC4C8;
}

#right
{
  text-align:right;
}

table
{
  border-collapse: collapse;
  overflow:auto;
  padding: 0.5em; 
  padding:10px 40px; 
}

.contentstext, .pagetitletext
{
  background-color: transparent;
}

.linkstext
{
  font-size: 20px;
  text-align: center; 
  font-weight: bold;
  background-color: transparent;
}

#headertext
{
  font-size: 40px;
  text-align: center;
  font-weight: bold;
  background-color: transparent;
  width: 550px;
}

.pagetitletext
{
  font-size: 30px;
  text-align: center;
  font-weight: bold;
}

.contentstext
{
  font-size: 18px;
  width: 80%;
  height: 300px;
  font-family: Arial;
}

.arrow_icon
{
  width: 64px;
  height: 64px;
}

.pageArrow
{
  width: 50px;
  height: 50px;
  opacity: 1;
}

.pageArrow:hover
{
  cursor: pointer;
}

</style>

<!-- http://jscolor.com/ -->
<script type="text/javascript" src="jscolor/jscolor.js"></script>

<script type="text/javascript">
window.setInterval(function()
{
  if(get('fileNameInput').value == "")
    gradient('body','bodybgtop','bodybgbot');
  
  if(get('headerbgcheckbox').checked)
    gradient('headerbg','headerbgtop','headerbgbot');
	
  if(get('contentsbgcheckbox').checked)
    gradient('contentstable','contentsbgtop','contentsbgbot');

  if(get('linksareabgcheckbox').checked)
    gradient('linksarea','linksareabgtop','linksareabgbot');
  
  for(var i = 1; i <= 5; i++)
  {
    gradient('linktd' + i,'linksbgtop','linksbgbot');
    fontcolor('link' + i,'linkstextcolor');
	
	get('pagetitletext' + i).value = get('link' + i).value;
	
    fontcolor('contentstext' + i,'contentstextcolor');
    fontcolor('pagetitletext' + i,'contentstextcolor');
  }

  fontcolor('headertext','headertextcolor');

  resizeToInput('maintable','tablewidth','tableheight');
  get('headerwidth').value = get('tablewidth').value;
  get('headerheight').value = get('headerbg').style.height;
  resizeToInput('linkstable','linkswidth','linksheight');
  
  for(var i = 5; i > get('pagelinks').value; i--) get('linktd' + i).style.visibility = 'collapse';
  for(var i = 1; i <= get('pagelinks').value; i++) get('linktd' + i).style.visibility = 'visible';
  
 }, 120);

function get(elementID)
{
  return document.getElementById(elementID);
} 
 
function resizeToInput(elementID,widthinput,heightinput)
{
  get(widthinput).value = get(elementID).style.width;
  get(heightinput).value = get(elementID).style.height;
}

function gradient(elementID,color1,color2)
{
  /* Safari 5.1, Chrome 10+ */
  get(elementID).style.background = '-webkit-linear-gradient(top, #' + get(color1).value + ', #' + get(color2).value + ')';
  
  /* Safari 4-5, Chrome 1-9 */
  get(elementID).style.background = '-webkit-gradient(linear, 0% 0%, 0% 100%, from(#' + get(color1).value + '), to(#' + get(color2).value + '))';
  
  /* Firefox 3.6+ */
  get(elementID).style.background = '-moz-linear-gradient(top, #' + get(color1).value + ', #' + get(color2).value + ')';
  
  /* IE 10 */
  get(elementID).style.background =  '-ms-linear-gradient(top, #' + get(color1).value + ', #' + get(color2).value + ')';
  
  /* Opera 11.10+ */
  get(elementID).style.background = '-o-linear-gradient(top, #' + get(color1).value + ', #' + get(color2).value + ')';
}

function fontcolor(elementID,color)
{
  get(elementID).style.color = '#' + get(color).value;
}

function transparentCheck(elementID)
{
  get(elementID).style.background = 'transparent';
}


function isFile(str){
    var O= AJ();
    if(!O) return false;
    try
    {
        O.open("HEAD", str, false);
        O.send(null);
        return (O.status==200) ? true : false;
    }
    catch(er)
    {
        return false;
    }
}
function AJ()
{
    var obj;
    if (window.XMLHttpRequest)
    {
        obj= new XMLHttpRequest();
    }
    else if (window.ActiveXObject) 
    {
        try
        {
            obj= new ActiveXObject('MSXML2.XMLHTTP.3.0');
        }
        catch(er)
        {
            obj=false;
        }
    }
    return obj;
}


function checkLegal()
{
  var ok = true;

  if(isFile("../users/" + '<?PHP echo $_SESSION['username']?>' + "/" + get('headertext').value))
  {
    alert('You already have a Bweb named ' + get('headertext').value + '. Please change the title if you wish to create a new project.');
    ok = false;
  }
  
  if(get('headertext').value.length > 50)
  {
    alert('The header is too long (max 50 characters)');
	ok = false;
  }
	
  for(var i=1; i<=5; i++)
    if(get('link' + i).value.length > 50)
	{
	  alert('The Link ' + i + ' is too long (max 50 characters)');
	  ok = false;
	}
	else if(get('link' + i).value == '')
	{
	  alert('You must set the value of Link ' + i + ' or remove it');
	  ok = false;
	}

  for(var i=1; i<=5; i++)
    if(get('contentstext' + i).value.toLowerCase().indexOf("<script") != -1)
    {
	  alert('You cannot include non HTML scripts or PHP codes on your website (page ' + i + ' may contain it)');
	  ok = false;
	}
  
  if(ok)
    get('generate').submit();
}
</script>
</head>

<body id="body">
<!---------- image upload - START -------->
<script type="text/javascript">
function fileNameToInput(givenName)
{
  get('fileNameInput').value = givenName;
  get('body').style.backgroundImage = 'url(' + givenName + ')';
}
function imageNameToInput(givenName)
{
  get('imageName').value = givenName;
}
</script>

<form method="post" action="upload_file.php" enctype="multipart/form-data" target="hidden_upload">
Background-image: <input type="file" name="image_file" id="image_file" accept="image/*">
<input type="submit" value="Upload">
<input type="button" value="Remove" onclick="get(fileNameInput.value = '')">
   
<input name="destinationChange" type="hidden" value="body">
   
</form>
<iframe id="hidden_upload" name="hidden_upload" style="display:none" ></iframe>
<!---------- image upload - END -------->

<form id="generate" method="post" action="confirm.php">
<input id="fileNameInput" name="fileNameInput" type="hidden">
<input id="imageName" name="imageName" type="hidden">

Background-color: <input class="color" name="bodybgtop" value="FFFFFF" id="bodybgtop"> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
Width: <input name="maintablewidth" id="tablewidth" class="widthheight" readonly>
Height: <input name="maintableheight" id="tableheight" class="widthheight" readonly> <br>
<br>

<table border=2 align="center" id="maintable" style="width:900px;height:450px">
  <tr> 
    <?PHP
      include "header.php";
    ?>
  </tr>
  <tr>
    <td>
	  <table>
	    <tr>
          <?PHP
		    if(isset($_GET['layout'])) $layout = $_GET['layout']; else $layout = 'left';
			
			if($layout == 'left')
			{ include "links.php"; include "contents.php"; }
			else
			{ include "contents.php"; include "links.php"; }
          ?>	
	    </tr>
      </table>
  </tr>
</table>
<?PHP
    echo "<input name='layout' type='hidden' value='$layout'>"
?>
<input class="color" name="bodybgbot" value="FFFFFF" id="bodybgbot">
<center>
<input type="button" class="choiceButton" style="margin-top:0px;" onclick="checkLegal();" value="Generate">
</center>
</form>
</body>
</html>