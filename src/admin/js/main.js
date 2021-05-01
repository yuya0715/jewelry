'use strict';

function ibent(i){
  let names = 'numberLogin' + i;
  let passes = 'numberLoginpass' + i;
  let ids = 'id' + i;
  let name = document.getElementById(names).value;
  let pass = document.getElementById(passes).value;
  let id = document.getElementById(ids).value;
  let text = document.getElementById("text");
  text.textContent=`NAME: ${name}    PASSWORD:${pass}`;
  const delname = document.getElementById("delname");
  const delpass = document.getElementById("delpass");
  const delid = document.getElementById("delid");
  delname.value = name;
  delpass.value = pass;
  delid.value = id;
  // text.textContent = 'Name:' + id + ' Password:' + number;
}

function upibent(i){
  let names = 'upnumberLogin' + i;
  let passes = 'upnumberLoginpass' + i;
  let ids = 'upid' + i;
  let name = document.getElementById(names).value;
  let pass = document.getElementById(passes).value;
  let id = document.getElementById(ids).value;
  let text = document.getElementById("uptext");
  text.textContent=`NAME: ${name}   現在のパスワード:${pass}`;
  let uplid = document.getElementById("updateid");
  uplid.value = id;
  // text.textContent = 'Name:' + id + ' Password:' + number;
}


function postibent(i){
  let ids = 'id' + i;
  let id = document.getElementById(ids).value;
  const delid = document.getElementById("pastdelid");
  delid.value = id;
  // text.textContent = 'Name:' + id + ' Password:' + number;
}


function userdelitibent(i){
  let ids = 'id' + i;
  let id = document.getElementById(ids).value;
  const delid = document.getElementById("delid");
  delid.value = id;
  // text.textContent = 'Name:' + id + ' Password:' + number;
}


function userupibent(i){
  let ids = 'upid' + i;
  let names = 'upname' + i;
  let years = 'upyear' + i;
  let months = 'upmonth' + i;
  let days = "upday" + i;
  let genders = "upgender" + i;
  let mails = "upmail" + i;
  let usernames = "upusername" + i;
  let passwords = "uppassword" + i;

  let id = document.getElementById(ids).value;
  let name = document.getElementById(names).value;
  let year = document.getElementById(years).value;
  let month = document.getElementById(months).value;
  let day = document.getElementById(days).value;
  let gender = document.getElementById(genders).value;
  let mail = document.getElementById(mails).value;
  let username = document.getElementById(usernames).value;
  let password = document.getElementById(passwords).value;
 
  let text = document.getElementById("updatetext");
  text.textContent= id ;

  let updateid = document.getElementById("updateid");
  updateid.value = id ;

  let updatename = document.getElementById("updatename");
  updatename.value = name;

  let updateyear = document.getElementById("updateyear");
  updateyear.value = year;

  let updatemonth = document.getElementById("updatemonth");
  updatemonth.value = month;

  let updateday = document.getElementById("updateday");
  updateday.value = day;

  let updategender = document.getElementById("updategender");
  updategender.value = gender;

  let updatemail = document.getElementById("updatemail");
  updatemail.value = mail;

  let updateusername = document.getElementById("updateusername");
  updateusername.value = username;

  let updatepassword = document.getElementById("updatepassword");
  updatepassword.value = password;
}




function deleteFunc(){
  let delidCount = document.getElementById("delidCount");
  console.log(delidCount.value);
  if(delidCount.value == "1"){
    alert('削除できません');
    return false;
  }else{
    return true;
  }
}


var remove = 0;

function radioDeselection(already, numeric) {
  if(remove == numeric) {
    already.checked = false;
    remove = 0;
  } else {
    remove = numeric;
  }
}


function postibent(){
  let delidCount = document.getElementById("delidCount").value;
  for(let i=1;i<=delidCount;i++){
    let ids = 'dele' + i;
    let id = document.getElementById(ids);
    let Alldelids = 'Alldelid' + i;
    let Alldelid = document.getElementById(Alldelids);
    if(id.checked){
      Alldelid.value=id.value;
    }
  }
}


function selectibent(){
  let delidCount = document.getElementById("delidCount").value;
  for(let i=1;i<=delidCount;i++){
    let ids = 'dele' + i;
    let id = document.getElementById(ids);
    if(id.checked == false){
      id.checked=true;
    }else{
      id.checked=false;
    }

   
  }

}