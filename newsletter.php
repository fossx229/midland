<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  
</head>

<body>

<script language="Javascript" type="text/javascript">

function checkform() {
  for (i=0;i<fieldstocheck.length;i++) {
    if (eval("document.subscribeform.elements['"+fieldstocheck[i]+"'].type") == "checkbox") {
      if (document.subscribeform.elements[fieldstocheck[i]].checked) {
      } else {
        alert("Please enter your "+fieldnames[i]);
        eval("document.subscribeform.elements['"+fieldstocheck[i]+"'].focus()");
        return false;
      }
    }
    else {
      if (eval("document.subscribeform.elements['"+fieldstocheck[i]+"'].value") == "") {
        alert("Please enter your "+fieldnames[i]);
        eval("document.subscribeform.elements['"+fieldstocheck[i]+"'].focus()");
        return false;
      }
    }
  }
  for (i=0;i<groupstocheck.length;i++) {
    if (!checkGroup(groupstocheck[i],groupnames[i])) {
      return false;
    }
  }

  if(! compareEmail())
  {
    alert("Email Addresses you entered do not match");
    return false;
  }
  return true;
}

var fieldstocheck = new Array();
var fieldnames = new Array();
function addFieldToCheck(value,name) {
  fieldstocheck[fieldstocheck.length] = value;
  fieldnames[fieldnames.length] = name;
}
var groupstocheck = new Array();
var groupnames = new Array();
function addGroupToCheck(value,name) {
  groupstocheck[groupstocheck.length] = value;
  groupnames[groupnames.length] = name;
}

function compareEmail()
{
  return (document.subscribeform.elements["email"].value == document.subscribeform.elements["emailconfirm"].value);
}
function checkGroup(name,value) {
  option = -1;
  for (i=0;i<document.subscribeform.elements[name].length;i++) {
    if (document.subscribeform.elements[name][i].checked) {
      option = i;
    }
  }
  if (option == -1) {
    alert ("Please enter your "+value);
    return false;
  }
  return true;
}

</script>

<form  method="post" action="http://www.midlandnursery.com/lists/?p=subscribe"  name="subscribeform">

<div>

Newsletter Not Working at the Moment <br /><br />

Email: <br />
<input type=text name=email value="" size="30">
  <script language="Javascript" type="text/javascript">addFieldToCheck("email","Email");</script><br />

<br />

Confirm Email Address:<br />
<input type=text name=emailconfirm value="" size="30">
  <script language="Javascript" type="text/javascript">addFieldToCheck("emailconfirm","Confirm your email address");</script><input type=hidden name="htmlemail" value="1"><br />

<br />

Name:<br />
<input type=text name="attribute1"  class="attributeinput" size="30" value=""><script language="Javascript" type="text/javascript">addFieldToCheck("attribute1","Name");</script><br />

<br />

<input type="hidden" name="list[1]" value="signup" checked>
<input type="hidden" name="listname[1]" value="Newsletter"/>

<div style="display: none;">
<input type="text" name="VerificationCodeX" value="" size="20">
</div>

<input type=submit name="subscribe" value="Subscribe" onClick="return checkform();">

</div>

</form>

</body>

</html>