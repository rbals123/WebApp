function isAlpha(char) {
  return /^[A-Z]$/i.text(char);
}

function functionLoad() {
  document.getElementByID("bigger").onclick = () => { setInterval("bigger()", 500)};
  document.getElementByID("bling").onclick = bling;
  document.getElementByID("snoopify").onclick = snoopify;
  document.getElementByID("igpay").onclick = igpay;
  document.getElementByID("malkovich").onclick = malkovich;

}

function bigger() {
  if(!$("text").style.fontSize) {
    $("text").style.fontSize = "12pt";//"24pt";
  }
  else {
    $("text").style.fontSize = parseInt($("text").style.fontsize) + 2 + "pt";
  }
}

function bling() {
  if($("bling").checked) {
    $("page").style.backgroundImage = "url(http://selab.hanyang.ac.kr/courses/cse326/2017/labs/images/8/hundred.jpg)";
    $("text").style.fontWeight = "bold";
    $("text").style.color = "green";
    $("text").style.textDecoration = "underline";
  }
  else {
    $("page").style.backgroundImage = "none";
    $("text").style.fontWeight = "normal";
    $("text").style.color = "black";
    $("text").style.textDecoration = "none";
  }
}

function snoopify() {
  $("text").value = $("text").value.toUpperCase();
  $("text").value = (($("text").value).split(".")).join("-izzle.");
}

function pig_latin(word) {
  var consonant = ['B', 'C', 'D', 'F', 'G', 'H', 'J', 'K', 'L', 'M', 'N', 'P', 'Q', 'R', 'S', 'T', 'V', 'W', 'X', 'Y', 'Z'];
  var i, tail = '';
  for (i = 0;i<word.length;i++) {
    if(consonant.includes(sord[i]) || consonant.includes(word[i].toUpperCase())) {
      tail += word[i];
    }else {
      break;
    }
  }return word.slice(i) + tail + 'ay';
}

function igpay() {
  var str = $("text").value;
  var result = str;
  var i, j;
  for(i=0; i<str.length; i++) {
    if(isAlpha(str[i])) {
      for(j = i; (j<str.length) && isAlpha(str[j]); j++)
      result = result.replace(str.slice(i,j), pig_latin(str.slice(i,j)));
      i = j;
    }
  }$("text").value = result;
}

function malkovich() {
  var str=$("text").value;
  var result = str;
  var i, j;
  for(i=0;i<str.length;i++) {
    if(isAlpha(str[i])) {
      for(j=i; (j<str.length) && isAlpha(str[j]); j++);
      if (j-i) >= 5 {
        result = result.replace(str.slice(i,j), 'Malkovich');
      }
    }i = j;
  }$("text").value = result;
}

window.onload = functionLoad;
