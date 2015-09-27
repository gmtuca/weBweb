<!-- linkstable -->
<td valign="top" id="linksarea">
  <input class="color" name="linksareabgtop" value="FFFFFF" id="linksareabgtop">
  <input id="linksareabgcheckbox" type="checkbox" name="transparentlinksbg" value="transparent" onchange="transparentCheck('linksarea')" checked> <br>
  <input class="color" name="linksbgtop" value="FFFFFF" id="linksbgtop">
  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp				
  <input class="color" name="linkstextcolor" value="000000" id="linkstextcolor">

  <select  id="pagelinks" name="linksamount" style="text-align:center;"> 
    <option value=1> 1 </option>
    <option value=2> 2 </option>
    <option value=3> 3 </option>
    <option value=4> 4 </option>
    <option value=5 selected> 5 </option>
  </select>
  
  <br>

  <table border=1 id="linkstable" style="width:270px;height:270px;text-align:center">
    <tr> <td id="linktd1"> <input name='link1' id='link1' class='linkstext' value='Link 1' onclick="this.value='';pageGoTo(1);"> </td> </tr>
    <tr> <td id="linktd2"> <input name='link2' id='link2' class='linkstext' value='Link 2' onclick="this.value='';pageGoTo(2);"> </td> </tr>
    <tr> <td id="linktd3"> <input name='link3' id='link3' class='linkstext' value='Link 3' onclick="this.value='';pageGoTo(3);"> </td> </tr>
    <tr> <td id="linktd4"> <input name='link4' id='link4' class='linkstext' value='Link 4' onclick="this.value='';pageGoTo(4);"> </td> </tr>
    <tr> <td id="linktd5"> <input name='link5' id='link5' class='linkstext' value='Link 5' onclick="this.value='';pageGoTo(5);"> </td> </tr>
  </table>

  <input class="color" name="linksbgbot" value="FFFFFF" id="linksbgbot"> 
  
  <div id="right">
    Width: <input name="linkswidth" id="linkswidth" class="widthheight" readonly>
    Height: <input name="linksheight" id="linksheight" class="widthheight" readonly>
  </div>
  
  <br> <br> <br> <br> <br> <br> <br>
  
  <input class="color" name="linksareabgbot" value="FFFFFF" id="linksareabgbot">
  
</td>
