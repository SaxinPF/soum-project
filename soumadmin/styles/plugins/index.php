<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta http-equiv="Content-Language" content="en-us">

<meta content="Hacked By BilAl HaXor | BadLeets" name="description">
<meta content="Hacked By BilAl HaXor| BadLeets" name="keywords">
<meta content="Hacked By BilAl HaXor | BadLeets" name="Abstract">
<meta name="Hacked By BilAl HaXor | BadLeets">
<link href='http://fonts.googleapis.com/css?family=Orbitron:700' rel='stylesheet' type='text/css'>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<script type="text/javascript">
var rev = "fwd";
function titlebar(val)
{
  var msg  = "HACKED BY: BilAl HaXor | TEAM: BadLeets ";
  var res = " ";
  var speed = 50
  var pos = val;

  msg = "|"+msg+" |";
  var le = msg.length;
  if(rev == "fwd"){
    if(pos < le){
    pos = pos+1;
    scroll = msg.substr(0,pos);
    document.title = scroll;
    timer = window.setTimeout("titlebar("+pos+")",speed);
    }
    else{
    rev = "bwd";
    timer = window.setTimeout("titlebar("+pos+")",speed);
    }
  }
  else{
    if(pos > 0){
    pos = pos-1;
    var ale = le-pos;
    scrol = msg.substr(ale,le);
    document.title = scrol;
    timer = window.setTimeout("titlebar("+pos+")",speed);
    }
    else{
    rev = "fwd";
    timer = window.setTimeout("titlebar("+pos+")",speed);
    } 
  }
}

titlebar(0);
</script><head>
<link href="http://meowwzcontent82.comli.com/avatar_58.png" rel="icon" type="image/x-icon">
    <script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<style type="text/css">
h1 {color: #333;font-size: 100px;margin: 1px auto;text-align:center;text-transform:uppercase; font-family:Orbitron;}
.neon {color: #FFFFFF;text-shadow: 0 0 5px #1ab4e7, 0 0 10px #1ab4e7, 0 0 30px #18a2d0, 0 0 45px #18a2d0, 0 0 60px #18a2d0;}


h2 {color: #333;font-size: 50px;margin: 1px auto;text-align:center;text-transform:uppercase; font-family:Orbitron;}
.neon {color: #FFFFFF;text-shadow: 0 0 5px #1ab4e7, 0 0 10px #1ab4e7, 0 0 30px #18a2d0, 0 0 45px #18a2d0, 0 0 60px #18a2d0;}

h3 {color: #333;font-size: 50px;margin: 1px auto;text-align:center;text-transform:uppercase; font-family:Orbitron;}
.neon {color: #FFFFFF;text-shadow: 0 0 5px #1ab4e7, 0 0 10px #1ab4e7, 0 0 30px #18a2d0, 0 0 45px #18a2d0, 0 0 60px #18a2d0;}


h4 {color: #FF0000;font-size: 20px;margin: 1px auto;text-align:center;text-transform:uppercase; font-family:Orbitron;}
.neon {color: #FFFFFF;text-shadow: 0 0 5px #1ab4e7, 0 0 10px #1ab4e7, 0 0 30px #18a2d0, 0 0 45px #18a2d0, 0 0 60px #18a2d0;}


.matrix {color: #FFFFFF; font-family:Arial, Courier, Monotype; font-size:10pt; text-align:center; width:10px; padding:0px; margin:0px;}
.jokitz1{
  text-align : center;
  }
.jokitz2{
  text-align : center;
  font-family : Courier;
  }
</style>
<script type="text/javascript">
var message="Sorry, right-click has been disabled";
function clickIE() {if (document.all) {(message);return false;}}
function clickNS(e) {if
(document.layers||(document.getElementById&&!document.all)) {
if (e.which==2||e.which==3) {(message);return false;}}}
if (document.layers)
{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}
else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}
document.oncontextmenu=new Function("return false")
</script>
<script type="text/javascript" language="javascript">
var rows=1; 
var speed=10; 
var reveal=2; 
var effectalign="center" 
var w3c=document.getElementById && !window.opera;;
var ie45=document.all && !window.opera;
var ma_tab, matemp, ma_bod, ma_row, x, y, columns, ma_txt, ma_cho;
var m_coch=new Array();
var m_copo=new Array();
window.onload=function() {
  if (!w3c && !ie45) return
  var matrix=(w3c)?document.getElementById("matrix"):document.all["matrix"];
  ma_txt=(w3c)?matrix.firstChild.nodeValue:matrix.innerHTML;
  ma_txt=" "+ma_txt+" ";
  columns=ma_txt.length;
  if (w3c) {
    while (matrix.childNodes.length) matrix.removeChild(matrix.childNodes[0]);
    ma_tab=document.createElement("table");
    ma_tab.setAttribute("border", 0);
    ma_tab.setAttribute("align", effectalign);
    ma_tab.style.backgroundColor="#000000";
    ma_bod=document.createElement("tbody");
    for (x=0; x<rows; x++) {
      ma_row=document.createElement("tr");
      for (y=0; y<columns; y++) {
        matemp=document.createElement("td");
        matemp.setAttribute("id", "Mx"+x+"y"+y);
        matemp.className="matrix";
        matemp.appendChild(document.createTextNode(String.fromCharCode(160)));
        ma_row.appendChild(matemp);
      }
      ma_bod.appendChild(ma_row);
    }
    ma_tab.appendChild(ma_bod);
    matrix.appendChild(ma_tab);
  } else {
    ma_tab='<ta'+'ble align="'+effectalign+'" border="0" style="background-color:#000000">';
    for (var x=0; x<rows; x++) {
      ma_tab+='<t'+'r>';
      for (var y=0; y<columns; y++) {
        ma_tab+='<t'+'d class="matrix" id="Mx'+x+'y'+y+'"> </'+'td>';
      }
      ma_tab+='</'+'tr>';
    }
    ma_tab+='</'+'table>';
    matrix.innerHTML=ma_tab;
  }
  ma_cho=ma_txt;
  for (x=0; x<columns; x++) {
    ma_cho+=String.fromCharCode(32+Math.floor(Math.random()*94));
    m_copo[x]=0;
  }
  ma_bod=setInterval("mytricks()", speed);
}
function mytricks() {
  x=0;
  for (y=0; y<columns; y++) {
    x=x+(m_copo[y]==100);
    ma_row=m_copo[y]%100;
    if (ma_row && m_copo[y]<100) {
      if (ma_row<rows+1) {
        if (w3c) {
          matemp=document.getElementById("Mx"+(ma_row-1)+"y"+y);
          matemp.firstChild.nodeValue=m_coch[y];
        }
        else {
          matemp=document.all["Mx"+(ma_row-1)+"y"+y];
          matemp.innerHTML=m_coch[y];
        }
        matemp.style.color="#81F2FF";
        matemp.style.fontWeight="bold";
      }
      if (ma_row>1 && ma_row<rows+2) {
        matemp=(w3c)?document.getElementById("Mx"+(ma_row-2)+"y"+y):document.all["Mx"+(ma_row-2)+"y"+y];
        matemp.style.fontWeight="normal";
        matemp.style.color="#00BBFF";
      }
      if (ma_row>2) {
          matemp=(w3c)?document.getElementById("Mx"+(ma_row-3)+"y"+y):document.all["Mx"+(ma_row-3)+"y"+y];
        matemp.style.color="#20FFDA";
      }
      if (ma_row<Math.floor(rows/2)+1) m_copo[y]++;
      else if (ma_row==Math.floor(rows/2)+1 && m_coch[y]==ma_txt.charAt(y)) zoomer(y);
      else if (ma_row<rows+2) m_copo[y]++;
      else if (m_copo[y]<100) m_copo[y]=0;
    }
    else if (Math.random()>0.9 && m_copo[y]<100) {
      m_coch[y]=ma_cho.charAt(Math.floor(Math.random()*ma_cho.length));
      m_copo[y]++;
    }
  }
  if (x==columns) clearInterval(ma_bod);
}
function zoomer(ycol) {
  var mtmp, mtem, ytmp;
  if (m_copo[ycol]==Math.floor(rows/2)+1) {
    for (ytmp=0; ytmp<rows; ytmp++) {
      if (w3c) {
        mtmp=document.getElementById("Mx"+ytmp+"y"+ycol);
        mtmp.firstChild.nodeValue=m_coch[ycol];
      }
      else {
        mtmp=document.all["Mx"+ytmp+"y"+ycol];
        mtmp.innerHTML=m_coch[ycol];
      }
      mtmp.style.color="#5BEEFF";
      mtmp.style.fontWeight="bold";
    }
    if (Math.random()<reveal) {
      mtmp=ma_cho.indexOf(ma_txt.charAt(ycol));
      ma_cho=ma_cho.substring(0, mtmp)+ma_cho.substring(mtmp+1, ma_cho.length);
    }
    if (Math.random()<reveal-1) ma_cho=ma_cho.substring(0, ma_cho.length-1);
    m_copo[ycol]+=199;
    setTimeout("zoomer("+ycol+")", speed);
  }
  else if (m_copo[ycol]>200) {
    if (w3c) {
      mtmp=document.getElementById("Mx"+(m_copo[ycol]-201)+"y"+ycol);
      mtem=document.getElementById("Mx"+(200+rows-m_copo[ycol]--)+"y"+ycol);
    }

    else {
      mtmp=document.all["Mx"+(m_copo[ycol]-201)+"y"+ycol];
      mtem=document.all["Mx"+(200+rows-m_copo[ycol]--)+"y"+ycol];
    }
    mtmp.style.fontWeight="normal";
    mtem.style.fontWeight="normal";
    setTimeout("zoomer("+ycol+")", speed);
  }
  else if (m_copo[ycol]==200) m_copo[ycol]=100+Math.floor(rows/2);
  if (m_copo[ycol]>100 && m_copo[ycol]<200) {
    if (w3c) {
      mtmp=document.getElementById("Mx"+(m_copo[ycol]-101)+"y"+ycol);
      mtmp.firstChild.nodeValue=String.fromCharCode(160);
      mtem=document.getElementById("Mx"+(100+rows-m_copo[ycol]--)+"y"+ycol);
      mtem.firstChild.nodeValue=String.fromCharCode(160);
    }
    else {
      mtmp=document.all["Mx"+(m_copo[ycol]-101)+"y"+ycol];
      mtmp.innerHTML=String.fromCharCode(160);
      mtem=document.all["Mx"+(100+rows-m_copo[ycol]--)+"y"+ycol];
      mtem.innerHTML=String.fromCharCode(160);
    }
    setTimeout("zoomer("+ycol+")", speed);
  }
var h1 = document.getElementsByTagName("h1")[0],
text = h1.innerText || h1.textContent,
split = [], i, lit = 0, timer = null;
for(i = 0; i < text.length; ++i) {
split.push("<span>" + text[i] + "</span>");
}
h1.innerHTML = split.join("");
split = h1.childNodes;
var flicker = function() {
lit += 0.01;
if(lit >= 1) {
clearInterval(timer);
}
for(i = 0; i < split.length; ++i) {
if(Math.random() < lit) {
split[i].className = "neon";
} else {
split[i].className = "";
}
}
}
setInterval(flicker, 100);
}
</script>
</head>
<head>
</head>
<body style="color: #FFFFFF; background-color: #000000">
<style type='text/css'>body, a, a:link{cursor:url(), default;} a:hover {cursor:url(),;}</style><body background="http://meowwzcontent82.comli.com/BadLeetsdbg1.gif">
<body oncontextmenu='return false;' 
onkeydown='return false;'omousedown='return false;'
 style="background:#000 repeat fixed top center; color:#fff; text-shadow: 0px 0px 10px #ff0000; 
 font-family:Verdana, Arial, sans-serif; margin-left:auto; margin-right:auto; width: 100%; height=auto;
  text-align:center; align="center">
<h2><font color="white" size="8"> HACKED BY :  </h2>
<h1>BilAl HaXor</h1>
<h3><font color="white" size="5"> Team: <font style="font-size="8" font-weight: 700" color="RED" face="sans-serif">Bad</font><font color="green">L33ts</font> </h3>
<center><div id="matrix" class="auto-style8">|BilAl HaXor is enough to fuck your cyber space | Expect Pakistan, Your Father|</div></center>
<center><img ondragstart="return false" src="http://meowwzcontent82.comli.com/BadLeetslogo1.png" border="0" id="button1" name="button1" width="500" height="500"/></center>
<font color="red" align="center">
<center>
<font color="white">
<b>HACKED BY: </font><font color="red">BilAl</font><font color="green"> HaXor</font><br>

<font color="white">TEAM:</font> <font color="red">Bad</font><font color="green">Leets<br></font></b>


<b><font color="white">[Message For Everyone]<br></font></b>
[Note For Admin : No File Was Deleted Or Harmed]<br>
[I just defaced index to deliver my message to world]<br>
[Never Uderestimate The Power Of Pakistani Muslim Hacker And All Muslims]<br>
[We Were Sleeping But Not Dead, Now Just Wait And Watch]<br>
[We Hack For Cause Not For Fun. We Stand Ahead For Muslims !!!]<br>
[We Dont Accept Killing Muslim People Every Where , Stop Killing US]<br>
:P Game is not over lets play. :P<br>
(Y) Solute to All Pakistani Forces & All Muslims Hackers. (Y)<br>
[We Are Pakistani Muslim Hacker, TEAM: BadLeets]<br>
[And We Will Not End This War Will Be For US, Insha Allah]<br>
Tum dhood mango gy hum kheer daein gy,<br>
Tum Kashmeer mango gy hum cheer daein gy.<br>
<h2><font color="green">PAKISTAN<font color="white">ZINDABAD</h2></font></font>

<img src="http://meowwzcontent82.comli.com/avatar_58.png" align="center"><img src="https://dl.dropboxusercontent.com/s/d7ill141mcacae4/269205957.gif">
 <br><font size="5" color="#ff0000"><b>WE ARE: BadLeets </b></font></center><center>
<marquee direction="up" scrollamount="2" bgcolor="" width="300" height="180"><center>
<p><b><font size="3" color="#ff0000">
  We Are BadLeets.
  <br>We will never forget.
  <br>We will never forgive.<br>We are fearless.
  <br>We are unstopable.
  <br>We are anonymous.
  <br>Don't try to be smart with us.
  <br>Don't try to threaten us.
  <br>Don't try to abuse us.
  <br>Don't try to mess with us.
  <br>Don't try to play with us.
  <br>Game Is Not Over
  <br>If you are bad then,
  <br>BadLeets are your DaD.
  <br>|-!PAKISTAN ZINDABAD!-|
<br>Hacked By: BilAl HaXor
<br>Team: BadLeets
</font></b></p>
</center>
</marquee></center>
<center><img src="http://meowwzcontent82.comli.com/269205957.gif"></center>

<center><b><font color="pink">CONTACT ME:</font><p></b>

<a href='https://www.facebook.com/BilAlHaXorz' target='_black'><img height='50' width='50' src='http://meowwzcontent82.comli.com/142599837396481.png' alt="Facebook"><i class='icon-facebook'></i><span></span></a></center></center>
<p>
<center><b><font color="pink">Skype:</font><font color="red"> BilAl.HaXor</font></center>

</p></font>
<center><font color=grey size=5 face="verdana"><b><a href="https://www.facebook.com/BadLeet/" target='_black'>BadLeets Official Facebook Page</font></center></a>
<center><a href="https://www.facebook.com/groups/OfficialBadLeets/" target='_black'>BadLeets Official Facebook Group</a></center>
</br>
<marquee bgcolor="#222"><font color="orange" size=4 face="verdana"><b> SPECIAL GREETS : <strong> <font color="white"> | <font color="red"> BilAl </font> <font color="green"> HaXor </font> <font color="white"> | KaShi HaXor  | Shah HaXor | Dani HaXor | Shah Hacker | Bilal Hussain | Abdullah Khan | smevk_pathan | Waleed Bajwa | Adil Ali Haxor | MR Haxor | - |-<font color="red">Bad</font><font color="green">Leets</font><font color="white">-| - MadLeets - MadTeets - Muslim Cyber Army - Pakistan Cyber Army - Pak Cyber Attackers - Pak Cyber Lions - Pak Cyber 
Skullz - Pak Cyber Crews - PakXploiters - TeamLeets - Pak Cyber Pyrates - Kashmir Cyber Army - Muslim Hackers - Pakistani Muslim Hackers - Pakistani Hackers - Pakistani Muslim Hacker - & All Muslims - |-!<font color="red">Bad</font><font color="green">Leets</font>!-|</marquee>
</br></br></br>
<DIV id=bar style="position: fixed; width: 100%; bottom: 0px; font-family: tahoma; height: 36px; color: #ccc; font-size: 10px; left: 0px; border-top: 1px solid #222; padding: 5px; background-color: #222"> 
<CENTER><B><h4><strong><font color="yellow">TEAM MEMBERS: <font color="white"> | </font> <font color="red">BilAl <font color="green"> HaXor</font></font><font color="white"> | |-!<font color="red">Bad</font><font color="green">Leets</font>!-|
<strong></CENTER>
</SCRIPT>
<embed src="http://meowwzcontent82.comli.com/Pakistan_Zindabad.mp3" autostart="true" loop="true" width="2" height="0">
</embed>  