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
	         <a href='../page/ava' class='avatarA'><div class='photoWallFoot'>�޸�ͷ��</div></a>
	         <div class='briefInfo'>
	              <div class='briefInfoItem'>�ǳ�:<?php echo $user['name'];?></div>
		          <div class='briefInfoItem'>���ڵ�:<?php echo $addr[0].@$addr[1];?></div>
                  <div class='briefInfoItem'>����:<?php echo $user['emotion']; ?></div>
	        </div>
	   </div>
	   <div class='infoDiv'>
	    <div class="infoMain">
	    <div class='detailedInfo'>
	    <div class='detailedHead'><div class='changeInfoBu'>�޸�����</div>����Infomation</div>
	         <div class='detInfoItem'>����:<?php echo $user['birth'];?></div>
			 <div class='detInfoItem'>��ѧ:<?php echo $user['school'];?></div>
			 <div class='detInfoItem'>ְҵ:<?php echo $user['job'];?></div>
			 <div class='detInfoItem'>����:<?php echo $user['love'];?></div>
			 <div class='detInfoItem'>want:<?php echo $user['want'];?></div>
			 <div class='detInfoShare'>Ta���������~(��δ����)</div>
	   </div>
	   	<div class='dtInfoChange'>
		     <div class='dtICHead'><div class='changeCloseBu'>X</div>�����޸�InfoChange</div>
	         <div class='dtICLine'><span class='dtICTag'>�ǳ�</span><span class='introInput'>��10��)</span><input type='text' name="nicky" class='dtICInput' value="<?php echo $user['name'];?>"></div>
			 <div class='dtICLine'><span class='dtICTag'>���ڵ�</span>
			 <select name="province" onChange="getCity()" style="border:none;float:left;margin-left:142px;">
        <option value="����" selected="selected">����</option>
		<option value="�Ϻ�">�Ϻ�</option>
		<option value="���">���</option>
		<option value="����">����</option>
        <option value="�ӱ�">�ӱ�</option>
        <option value="ɽ��">ɽ��</option>
          <option value="���ɹ�">���ɹ�</option>
            <option value="����">����</option>
          <option value="����">����</option>
          <option value="������">������</option>
          <option value="����">����</option>
          <option value="�㽭">�㽭</option>
          <option value="����">���� </option>
        <option value="����">���� </option>
          <option value="����">����</option>
            <option value="ɽ��">ɽ��</option>
          <option value="����">����</option>
          <option value="����">����</option>
          <option value="����">����</option>
          <option value="�㶫">�㶫</option> 
          <option value="����">����</option>
            <option value="����">����</option>
          <option value="�Ĵ�">�Ĵ�</option>
          <option value="����">����</option>
          <option value="����">����</option>
          <option value="����">����</option>
          <option value="����">���� </option>
        <option value="����">���� </option>
          <option value="�ຣ">�ຣ</option>
            <option value="����">����</option>
          <option value="�½�">�½�</option>
          <option value="̨��">̨��</option>   
         </select>
		 <script>
         $("option[value='����']").removeAttr('selected');
		 $("option[value='<?php echo $addr[0];?>']").attr("selected","seleted");
		 </script>
		 <select name="city" style="border:none;float:left;margin-left:5px;">
          <option selected="selected" value="null" >��ѡ�����ڳ���</option>
          </select>
		 </div>
			 <div class='dtICLine'><span class='dtICTag'>����</span><span class='introInput'>��15��)</span><input type='text' name='emotion' class='dtICInput' value="<?php echo $user['emotion'];?>"></div>
			 <div class='dtICLine'><span class='dtICTag'>����</span><select name="year" onchange="getDates()" style="margin-left:160px;border:none;">   
 <script language="javascript" type="text/javascript">        
          var date=new Date();   
          var year=date.getFullYear(); 
//���ؾ��뵱ǰ���100���������ݡ�����   
          for(var i=year;i>=year-100;i--){   
                 document.write("<option value="+i+">"+i+"</option>");   
          }   
             
          //����optionԪ�أ���׷�ӵ�ָ��selectԪ��   
          function  append(o,v){   
              var option=document.createElement("option");   
              option.value=v;   
              option.innerText=v;   
              o.appendChild(option);   
          }   
          //�������µ�ֵ�������գ��ж����·��Ƿ������ꡣ����   
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
			 <div class='dtICLine'><span class='dtICTag'>��ѧ</span><span class='introInput'>��20��)</span><input type='text' name='school' class='dtICInput' value="<?php echo $user['school'];?>"></div>
			 <div class='dtICLine'><span class='dtICTag'>ְҵ</span><span class='introInput'>��15��)</span><input type='text' name='profession' class='dtICInput' value="<?php echo $user['job'];?>"></div>
			 <div class='dtICLine'><span class='dtICTag'>����</span><span class='introInput'>��20��)</span><input type='text' name='love' class='dtICInput' value="<?php echo $user['love'];?>"></div>
			 <div class='dtICLine'><span class='dtICTag'>want</span><span class='introInput'>��30��)</span><input type='text' name='want' class='dtICInput' value="<?php echo $user['want'];?>"></div>
			 <div class='dtICBuLine'><button class='dtICBu'>�ύ</button></div>
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