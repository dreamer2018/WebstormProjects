/**
 * Created by zhoupan on 5/3/16.
 */

 var count=0;
 var seat = new Array(80);

function on_click() {
	var str="";
	for (var i =0; i < count; i++) {
		str=str+seat[i]+",";
	}
	if(count==0){
		alert("你没有选择任何座位！");	
	}else{
    	alert("你成功选择了"+count+"个座位，位置如下：\n"+str+"\n验证码已发送到你的手机上，请通过手机号码及验证码取票！");
    }
}

function changeImage(s){

    var imgObj = document.getElementById(s.id);
    if(imgObj.getAttribute("src",2)=="image_seat/1.jpg"){
        imgObj.src="image_seat/2.jpg";
        count++;
        var str=s.id.toString();
        seat[count-1]=str.substring(3);
    }else{
        imgObj.src="image_seat/1.jpg";
        count--;
    }

}

function aa(){
	var flag=1;//标志位，1代表通过
	var bb = document.getElementById("hehe");
	if(bb.value=="" || bb.value.length < 11){//如果是空则结束循环，标志位置0
	   	flag=0;
	}
    if(flag==1){//如果标识位是1，则按钮可用
          document.getElementById("button").disabled=false;
    }
 }
