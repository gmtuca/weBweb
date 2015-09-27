<?PHP
require_once('../includes/session.php');
require_once('../includes/connection.php');
require_once('../includes/functions.php');
confirm_logged_in();
//confirm_privilege_project($_SESSION['username'], get_url());
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<!-- http://jscolor.com/ -->
    <script type="text/javascript" src="jscolor/jscolor.js"></script>

<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.js"></script>
<script type="text/javascript">
function initial()
{
  clickFadeOnFromTo("#basic","#mode","#templates");
  
  clickFadeOnFromTo("#templates","#templates","#mode");
  clickFadeOnFromTo("#template1","#templates","#title");
  clickFadeOnFromTo("#template2","#templates","#title");
  
  clickFadeOnFromTo("#creator","#creator","#mode");
    
  clickFadeOnFromTo("#advanced","#mode","#templatesAd");
  clickFadeOnFromTo("#templatesAd","#templatesAd","#mode");
  
  clickFadeOnFromTo("#title","#title","#templates");
  clickFadeIn("#titletxt");
  clickFadeIn("#type");
  clickFadeIn("#pages");
  
  clickFadeOnFromTo("#okTitle","#title","#shades");
  clickFadeOnFromTo("#shades","#shades","#title");
  clickFadeOnFromTo(".shadeimage","#shades","#background");
}

function clickFadeOnFromTo(idOn,idOut,idIn)
    {
      $(idOn).click(function(){
      $(idOut).fadeOut();
      $(idIn).fadeIn();
    return false;
 });
    }

function clickFadeIn(idIn)
    {
      $(idIn).click(function(){
      $(idIn).fadeIn();
      return false;
 });
    }

function clickFadeOut(idOut)
    {
      $(idOut).click(function(){
      $(idOut).fadeOut();
      return false;
 });
    }
	
function getInFrame(elementID)
{
  return window.frames['basic_creator'].document.getElementById(elementID);
}

function get(elementID)
{
  return document.getElementById(elementID);
} 

function setShade(bodytop,bodybot,headertop,headerbot,contbot,text)
{
  getInFrame('bodybgtop').value = bodytop;
  getInFrame('bodybgbot').value = bodybot;

  getInFrame('headerbgtop').value = headertop;
  getInFrame('headerbgbot').value = headerbot;
  
  getInFrame('linksareabgtop').value = headerbot;
  getInFrame('linksareabgbot').value = contbot;
  
  getInFrame('linksbgtop').value = bodytop;
  getInFrame('linksbgbot').value = bodybot;
  
  getInFrame('contentsbgtop').value = headerbot;
  getInFrame('contentsbgbot').value = contbot;

  getInFrame('headertextcolor').value = text;
  getInFrame('linkstextcolor').value = text;
  getInFrame('contentstextcolor').value = text;

  get('frameDiv').style.display = 'inline';
}

</script>
<link rel="shortcut icon" href="../images/b1.jpg">
<link rel='stylesheet' type='text/css' href='styles.css' />
<link rel='stylesheet' type='text/css' href='choiceButton.css' />
</head>

<body id="body" onload="initial();">

<div id="frameDiv" style="display:none">
<iframe id="basic_creator" src="creator.php?layout=left" width="100%" height="100%"></iframe>
</div>

<div id="mode" class="dim" style="display:inline">  
  <a id="advanced" href="#" class="choiceButton"> Advanced Mode </a>
  <a id="basic" href="#" class="choiceButton"> Basic Mode </a>
</div>

<div id="creator" class="dim">
  <iframe src="creator.php"></iframe>
</div>

<div id="templates" class="dim">
  <img class="arrow" src="arrows/arrow_left.png" align="left"> <img class="arrow" src="arrows/arrow_right.png" align="right" style="visibility:collapse">
  <br><br><br><br><br><br> <span class="mytext"> Layout </span> <br>
  <img class="templateimage" id="template1" src="BwebTemplates/template1.jpg" onclick="get('basic_creator').src = 'creator.php?layout=left';">
  <img class="templateimage" id="template2" src="BwebTemplates/template2.jpg" onclick="get('basic_creator').src = 'creator.php?layout=right'">
</div>

<div id="templatesAd" class="dim">
  <img class="arrow" src="arrows/arrow_left.png" align="left"> <img class="arrow" src="arrows/arrow_right.png" align="right" style="visibility:collapse">
  <br><br><br><br><br><br> <span class="mytext"> Layout </span> <br>
    <form method="get" action="creator.php" id="formTemp1Ad">
    <input name="layout" type="hidden" value="left">
    </form>
	
    <form method="get" action="creator.php" id="formTemp2Ad">
    <input name="layout" type="hidden" value="right">
    </form>
	
	<input class="templateimage" id="templateAd1" type="image" src="BwebTemplates/template1.jpg" onclick="get('formTemp1Ad').submit();">
	<input class="templateimage" id="templateAd2" type="image" src="BwebTemplates/template2.jpg" onclick="get('formTemp2Ad').submit();">
</div>

  <div id="title" class="dim">
  <img class="arrow" src="arrows/arrow_left.png" align="left"> <img class="arrow" src="arrows/arrow_right.png" align="right" style="visibility:collapse">

  <span class="mytext"> Website Title: </span> <input type="text" id="titletxt" value="Bweb" onclick="this.value=''"> <br>
  <span class="mytext"> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp About: </span>

<select id="type">
<option value="anything"> Anything </option>
<option value="animals"> Animals </option>
<option value="animes"> Animes </option>
<option value="art"> Art </option>
<option value="books"> Books </option>
<option value="business&services"> Business & Services </option>
<option value="cartoons"> Cartoons </option>
<option value="charity"> Celebrities </option>
<option value="charity"> Charity </option>
<option value="clothing"> Clothing </option>
<option value="education"> Education </option>
<option value="food&drinks"> Food & Drinks </option>
<option value="gaming"> Gaming </option>
<option value="hardware&computers"> Hardware & Computers </option>
<option value="health&fitness"> Health & Fitness </option>
<option value="movies"> Movies </option>
<option value="music"> Music </option>
<option value="religion"> Religion </option>
<option value="review"> Review </option>
<option value="restaurant"> Restaurant </option>
<option value="photography"> Photography </option>
<option value="social"> Social </option>
<option value="software&coding"> Software & Coding </option>
<option value="sports"> Sports </option>
<option value="travel"> Travel </option>
<option value="tvshows"> TV Shows </option>
  </select> <br> <br>
  
  <span class="mytext"> Amount of pages: </span>
  <select id="pages" onchange="getInFrame('pagelinks').value = this.value;">
  <option value=1> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 1 </option>
  <option value=2> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 2 </option>
  <option value=3> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 3 </option>
  <option value=4> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 4 </option>
  <option value=5 selected> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 5 </option>

  </select>
  &nbsp &nbsp &nbsp
  &nbsp &nbsp &nbsp
  &nbsp &nbsp
  <br>
  <img id="okTitle" style="margin-left:850px" src="ok.png" onclick="getInFrame('headertext').value = get('titletxt').value;"> </a>
</div>

<div id="shades" class="dim">
  <img class="arrow" src="arrows/arrow_left.png" align="left"> <img class="arrow" src="arrows/arrow_right.png" align="right" style="visibility:collapse">
  <br><br> <span class="mytext"> Shades </span> <br>
  <img class="shadeimage" id="gray" src="shades/gray.png" onclick="setShade('FFFFFF','000000','E3E3E3','262626','D1D1D1','FFFFFF');">
  <img class="shadeimage" id="red" src="shades/red.png" onclick="setShade('FFFFFF','C90000','FFDBDB','CC0000','FFD3CC','FFFFFF');"> 
  <img class="shadeimage" id="green" src="shades/green.png" onclick="setShade('DEFFDE','0F7800','CEF5CB','139100','D8F7D4','000000');">
  <img class="shadeimage" id="pink" src="shades/pink.png" onclick="setShade('FFF2FE','FF70D9','FFE0FC','FF7DEE','FFE3FC','000000');">
  <br>
  <img class="shadeimage" id="yellow" src="shades/yellow.png" onclick="setShade('FFFFD4','F0F000','FEFFEB','FFEF12','FFF7C4','000000');">
  <img class="shadeimage" id="blue" src="shades/blue.png" onclick="setShade('B8F5FF','0000FF','A1FFE6','0712AD','A8F3FF','FFFFFF');">
  <img class="shadeimage" id="purple" src="shades/purple.png" onclick="setShade('FFE3F4','660047','F5CBE4','59003E','F2C9E2','FFFFFF');">
  <img class="shadeimage" id="brown" src="shades/brown.png" onclick="setShade('DEB75B','573D1F','D9B359','704F28','D9B359','FFFFFF');">
</div>

</body>
</html>
