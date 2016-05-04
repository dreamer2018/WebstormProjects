/**
 * Created by zhoupan on 5/3/16.
 */
function on_click() {

    alert("选座成功");
}

function changeImage(s){

    var imgObj = document.getElementById(s.id);
    if(imgObj.getAttribute("src",2)=="image/1.jpg"){
        imgObj.src="image/2.jpg";
    }else{
        imgObj.src="image/1.jpg";
    }
}
