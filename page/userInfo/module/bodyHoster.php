<?php 
@session_start();
  require_once 'userInfo/module/serv/getUserInfo.php';
  require_once 'public/contFmt.php';
  require_once 'public/SqlHelper.php';
     $id = $_GET['uid'];
	 $db = new sqlhelper();
	 $db->db_link();
	 $user = getUserInfo::getInfo($id,$db);
	 if($user==0)
	 return;
	 $addr = explode("&amp;",$user['address']);
	 $year = explode("-",$user['birth']);
?>
	   <div class='photoWall'>
	        <img src='<?php 
			if($user['avatar']=="jpg"||$user['avatar']=="gif"||$user['avatar']=="png"||$user['avatar']=="jpeg")
                  echo "userInfo/user/".$_SESSION['id']."/avatar_200.".$user['avatar'];
				   else
				   echo  "userInfo/default_200.jpg";?>' />
	         <a href='../page/ava' class='avatarA'><div class='photoWallFoot'>修改头像</div></a>
	         <div class='briefInfo'>
	              <div class='briefInfoItem'>昵称:<?php echo $user['name'];?></div>
		          <div class='briefInfoItem'>所在地:<?php echo $addr[0].@$addr[1];?></div>
                  <div class='briefInfoItem'>感情:<?php echo $user['emotion']; ?></div>
	        </div>
	   </div>
	   <div class='infoDiv'>
	    <div class="infoMain">
	    <div class='detailedInfo'>
	    <div class='detailedHead'><div class='changeInfoBu'>修改资料</div>资料Infomation</div>
	         <div class='detInfoItem'>生日:<?php echo $user['birth'];?></div>
			 <div class='detInfoItem'>大学:<?php echo $user['school'];?></div>
			 <div class='detInfoItem'>职业:<?php echo $user['job'];?></div>
			 <div class='detInfoItem'>爱好:<?php echo $user['love'];?></div>
			 <div class='detInfoItem'>want:<?php echo $user['want'];?></div>
			 <div class='detInfoShare'>Ta曾分享过的~(暂未开放)</div>
	   </div>
	   	<div class='dtInfoChange'>
		     <div class='dtICHead'><div class='changeCloseBu'>X</div>资料修改InfoChange</div>
	         <div class='dtICLine'><span class='dtICTag'>昵称</span><span class='introInput'>（10字)</span><input type='text' name="nicky" class='dtICInput' value="<?php echo $user['name'];?>"></div>
			 <div class='dtICLine'><span class='dtICTag'>所在地</span>
			 <select name="province" onChange="getCity()" style="border:none;float:left;margin-left:142px;">
        <option value="北京" selected="selected">北京</option>
		<option value="上海">上海</option>
		<option value="天津">天津</option>
		<option value="重庆">重庆</option>
        <option value="河北">河北</option>
        <option value="山西">山西</option>
          <option value="内蒙古">内蒙古</option>
            <option value="辽宁">辽宁</option>
          <option value="吉林">吉林</option>
          <option value="黑龙江">黑龙江</option>
          <option value="江苏">江苏</option>
          <option value="浙江">浙江</option>
          <option value="安徽">安徽 </option>
        <option value="福建">福建 </option>
          <option value="江西">江西</option>
            <option value="山东">山东</option>
          <option value="河南">河南</option>
          <option value="湖北">湖北</option>
          <option value="湖南">湖南</option>
          <option value="广东">广东</option> 
          <option value="广西">广西</option>
            <option value="海南">海南</option>
          <option value="四川">四川</option>
          <option value="贵州">贵州</option>
          <option value="云南">云南</option>
          <option value="西藏">西藏</option>
          <option value="陕西">陕西 </option>
        <option value="甘肃">甘肃 </option>
          <option value="青海">青海</option>
            <option value="宁夏">宁夏</option>
          <option value="新疆">新疆</option>
          <option value="台湾">台湾</option>   
         </select>
		 <script>
         $("option[value='北京']").removeAttr('selected');
		 $("option[value='<?php echo $addr[0];?>']").attr("selected","seleted");
		 </script>
		 <select name="city" style="border:none;float:left;margin-left:5px;">
          <option selected="selected" value="null" >请选择所在城市</option>
          </select>
		 </div>
			 <div class='dtICLine'><span class='dtICTag'>感情</span><span class='introInput'>（15字)</span><input type='text' name='emotion' class='dtICInput' value="<?php echo $user['emotion'];?>"></div>
			 <div class='dtICLine'><span class='dtICTag'>生日</span><select name="year" onchange="getDates()" style="margin-left:160px;border:none;">   
 <script language="javascript" type="text/javascript">        
          var date=new Date();   
          var year=date.getFullYear(); 
//加载距离当前年份100年的所有年份。。。   
          for(var i=year;i>=year-100;i--){   
                 document.write("<option value="+i+">"+i+"</option>");   
          }   
             
          //创建option元素，并追加到指定select元素   
          function  append(o,v){   
              var option=document.createElement("option");   
              option.value=v;   
              option.innerText=v;   
              o.appendChild(option);   
          }   
          //根据年月的值来加载日，判断了月份是否是闰年。。。   
          function  getDates(){   
                  
               var y=document.getElementsByName("year")[0].value;   
               var m=document.getElementsByName("month")[0].value;   
                  
               var day=document.getElementsByName("day")[0];   
               day.innerHTML="";   
                  
               if(m==1 || m==3 || m==5 || m==7 || m==8 || m==10 || m==12){   
                    for(var j=1;j<=31;j++){   
                            append(day,j);   
                    }   
               }   
               else if(m==4 || m==6 || m==9 || m==11){   
                    for(var j=1;j<=30;j++){   
                            append(day,j);   
                    }   
               }   
               else if(m==2){   
                    var flag=true;   
                    flag=y%4==0&&y%100!=0||y%400==0;   
                    if(flag){   
                         for(var j=1;j<=29;j++){   
                           append(day,j);   
                         }   
                    }   
                    else{   
                         for(var j=1;j<=28;j++){   
                            append(day,j);   
                         }   
                    }   
               }   
                  
          }   
</script>   
                        </select>   
               
                        <select name="month" onchange="getDates()" style="border:none;">   
                            <script language="javascript" type="text/javascript">   
             
          for(var i=1;i<=12;i++){   
                document.write("<option value="+i+">"+i+"</option>");   
          }   
</script>   
                        </select>   
                   
                        <select name="day" style="border:none;">   
                            <script language="javascript" type="text/javascript">   
             
          for(var i=1;i<=31;i++){   
                document.write("<option value="+i+">"+i+"</option>");   
          }   
</script>   
                        </select>
						</div>
			 <div class='dtICLine'><span class='dtICTag'>大学</span><span class='introInput'>（20字)</span><input type='text' name='school' class='dtICInput' value="<?php echo $user['school'];?>"></div>
			 <div class='dtICLine'><span class='dtICTag'>职业</span><span class='introInput'>（15字)</span><input type='text' name='profession' class='dtICInput' value="<?php echo $user['job'];?>"></div>
			 <div class='dtICLine'><span class='dtICTag'>爱好</span><span class='introInput'>（20字)</span><input type='text' name='love' class='dtICInput' value="<?php echo $user['love'];?>"></div>
			 <div class='dtICLine'><span class='dtICTag'>want</span><span class='introInput'>（30字)</span><input type='text' name='want' class='dtICInput' value="<?php echo $user['want'];?>"></div>
			 <div class='dtICBuLine'><button class='dtICBu'>提交</button></div>
	     </div>
	  </div>
	  </div>
<script src='userInfo/source/js/ProCity.js'></script>
  <script>

    getCity();
   	$("select[name='city']").val('<?php echo $addr[1];?>');
	$("select[name='year']").val('<?php echo $year[0];?>');
	$("select[name='month']").val('<?php echo $year[1];?>');
	$("select[name='day']").val('<?php echo $year[2];?>');
	$("option[value='<?php echo $addr[1];?>']").attr('selected','seleted');

  </script>