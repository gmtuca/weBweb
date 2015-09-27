<script type="text/javascript">
var currentPage = 1;

function pageBack()
{
  if(currentPage > 1)
  {
    get('contentstext' + currentPage).style.display = 'none';
    get('contentstext' + (currentPage - 1)).style.display = 'inline';

    get('pagetitletext' + currentPage).style.display = 'none';
    get('pagetitletext' + (currentPage - 1)).style.display = 'inline'; 

    currentPage -= 1; 
  }
} 

function pageFront()
{
  if(currentPage < 5)
  {
    get('contentstext' + currentPage).style.display = 'none';
    get('contentstext' + (currentPage + 1)).style.display = 'inline';

    get('pagetitletext' + currentPage).style.display = 'none';
    get('pagetitletext' + (currentPage + 1)).style.display = 'inline'; 

    currentPage += 1; 
  }
} 

function pageGoTo(givenPageN)
{
  if(givenPageN >= 1 && givenPageN <= 5)
  {
    get('contentstext' + currentPage).style.display = 'none';
    get('contentstext' + givenPageN).style.display = 'inline';

    get('pagetitletext' + currentPage).style.display = 'none';
    get('pagetitletext' + givenPageN).style.display = 'inline'; 

    currentPage = givenPageN; 
  }
} 

function addTextToContents(stringText)
{
  for(var i=1; i<=5 ; i++)
    if(get('contentstext' + i).style.display != 'none')
      get('contentstext' + i).value += stringText;
}
</script>

<!-- contents -->
<td valign="top"  id="contentstable" width="650px">

  <input class="color" name="contentsbgtop" value="FFFFFF" id="contentsbgtop">
  <input id="contentsbgcheckbox" type="checkbox" name="transparentcontentsbg" value="transparent" onchange="transparentCheck('contentstable')" checked> <br>
  <br>
  <center>
  <img class="pageArrow" src="arrows/arrow_black_left.png" align="left" style="margin-left:50px" onclick="pageBack()">
  <img class="pageArrow" src="arrows/arrow_black_right.png" align="right" style="margin-right:50px" onclick="pageFront()">

    <input class="pagetitletext" name="pagetitletext1" value="Link 1" id="pagetitletext1" onclick="this.value='';">
	<input class="pagetitletext" name="pagetitletext2" value="Link 2" id="pagetitletext2" onclick="this.value='';" style="display:none">
	<input class="pagetitletext" name="pagetitletext3" value="Link 3" id="pagetitletext3" onclick="this.value='';" style="display:none">
	<input class="pagetitletext" name="pagetitletext4" value="Link 4" id="pagetitletext4" onclick="this.value='';" style="display:none">
	<input class="pagetitletext" name="pagetitletext5" value="Link 5" id="pagetitletext5" onclick="this.value='';" style="display:none">
	<br> 
	
	<input class="color" name="contentstextcolor" value="000000" id="contentstextcolor">

	<img alt="Insert video link" src="images/video.png" width="50px" height="50px" align="right" style="margin-right:15px"
	     onclick="addTextToContents('<iframe width=560 height=315 src=\'http://www.youtube.com/embed/ABC123\'></iframe><br>')">

	<img alt="Insert image link" src="images/photo.png" width="50x" height="50px" align="right" style="margin-right:15px"
	     onclick="addTextToContents('<img src=\'http://www.website/image.png\'><br>')">
		 
	<img alt="Insert internet link" src="images/www.png" width="50px" height="50px" align="right" style="margin-right:15px"
	     onclick="addTextToContents('<a href=\'http://www.link.com\'> Link </a>')">

	<br>
	<textarea class="contentstext" name="contentstext1" id="contentstext1"></textarea>
	<textarea class="contentstext" name="contentstext2" id="contentstext2" style="display:none"></textarea>
	<textarea class="contentstext" name="contentstext3" id="contentstext3" style="display:none"></textarea>
	<textarea class="contentstext" name="contentstext4" id="contentstext4" style="display:none"></textarea>
	<textarea class="contentstext" name="contentstext5" id="contentstext5" style="display:none"></textarea>

  </center>
  <br><br><br>
  <input class="color" name="contentsbgbot" value="FFFFFF" id="contentsbgbot">

</td>