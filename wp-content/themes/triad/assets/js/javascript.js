
//====STICKY==========
window.onscroll = function() {scrollFunction()};
var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

//====BACK-TO-TOP==========
mybutton = document.getElementById("myBtn");
window.onscroll = function() {scrollFunction()};
function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
//====STICKY-------
if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }	
//====End-STICKY-----		
}
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
} 

//====mobilemenu==========
function myFunction2() {
  var element = document.getElementById("myDIV");
  element.classList.toggle("open");
} 
