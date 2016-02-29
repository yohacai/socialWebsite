$(".photoWall > img").click(
function(){
  if($(this).css('width')!= "250px")
	   $(this).animate({width:'+250px'},100);
  else
       $(this).animate({width:'+200px'},100);
}
);
$('.changeInfoBu').click(
function()
{
   $(".infoMain").animate({marginLeft: '-650px'},500);
}
);
$(".changeCloseBu").click(
function()
{
  $(".infoMain").animate({marginLeft: '0px'},500);
}
);
function inputCheck(name,length)
{
  var obj = "input[name='"+name+"']";
  var nicky = $(obj).val();
	  nicky = nicky.replace(/(\s*)|(\s*)/g,"");
       nicky = jm(nicky,length);
	   $(obj).val(nicky);
	return nicky;
}
$('.dtICBuLine').click(
  function ()
  {
     var nicky = inputCheck('nicky',20);
	 var pro = $("select[name='province']").val();
	 var city = $("select[name='city']").val();
	 var addr = pro+"&"+city;   //地址
	 var emotion = inputCheck('emotion',30);
	 var year = $("select[name='year']").val();
	 var month = $("select[name='month']").val();
	 var day = $("select[name='day']").val();
	   var date = year+"-"+month+"-"+day;
	 var school = inputCheck('school',40);
	 var profession = inputCheck('profession',30);
	 var love = inputCheck('love',40);
	 var want = inputCheck('want',60);
	 var infoArray = new Array();
	 infoArray[0] = nicky+"&yoha.menicky";   //nicky为值 ，&yoha.me后面为name
	 infoArray[1] = addr+"&yoha.meaddr";;
	 infoArray[2] = emotion+"&yoha.meemotion";
	 infoArray[3] = date+"&yoha.medate";
	 infoArray[4] = school+"&yoha.meschool";
	 infoArray[5] = profession+"&yoha.meprofession";
	 infoArray[6] = love+"&yoha.melove";
	 infoArray[7] = want+"&yoha.mewant";
	   sendInfoChange(infoArray);
  }
);
$("input[name='nicky']").blur(
     function()
	 {inputCheck('nicky',20);
	 $(this).prev(".introInput").hide();
	 }
);
$("input[name='nicky']").focus(
function()
{
	 $(this).prev(".introInput").show();
}
);
$("input[name='emotion']").blur(
     function()
	 {inputCheck('emotion',30);
	 $(this).prev(".introInput").hide();
	 }
);
$("input[name='emotion']").focus(
function()
{
	 $(this).prev(".introInput").show();
}
);
$("input[name='love']").blur(
     function()
	 {inputCheck('love',40);
	 $(this).prev(".introInput").hide();
	 }
);
$("input[name='love']").focus(
function()
{
	 $(this).prev(".introInput").show();
}
);
$("input[name='want']").blur(
     function()
	 {inputCheck('want',60);
	 $(this).prev(".introInput").hide();
	 }
);
$("input[name='want']").focus(
function()
{
	 $(this).prev(".introInput").show();
}
);
$("input[name='profession']").blur(
     function()
	 {inputCheck('profession',30);
	 $(this).prev(".introInput").hide();
	 }
);
$("input[name='profession']").focus(
function()
{
	 $(this).prev(".introInput").show();
}
);
$("input[name='school']").blur(
     function()
	 {inputCheck('school',40);
	 $(this).prev(".introInput").hide();
	 }
);
$("input[name='school']").focus(
function()
{
	 $(this).prev(".introInput").show();
}
);