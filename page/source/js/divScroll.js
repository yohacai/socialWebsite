function menuFixed(id){
var obj = document.getElementById(id);
var obj1 = document.getElementById('bodyMain');
var _getHeight = obj.offsetTop+obj1.offsetTop+40;

window.onscroll = function(){
changePos(id,_getHeight);
}
}
function changePos(id,height){
var obj = document.getElementById(id);
var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;;
if(scrollTop < height){
obj.style.position = 'relative';
document.getElementById('contNav').style.position = 'absolute';
}else{
obj.style.position = 'fixed';
document.getElementById('contNav').style.position = 'fixed';
}
}
window.onload = function(){
menuFixed('aboutHoster');
}
