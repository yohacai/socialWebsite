 function dateInit()
 {
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
 }