$("#sort").on('click',function(){
    alert("yeah ya");
    age = document.getElementById("age");
    loc = document.getElementById("loc");
    alert (age.value);
    alert (loc.value);


    //alert()

    // alert(this.getAttribute("data-likee"));
    // alert(this.getAttribute("data-liker"));
    // //alert("booty");
    // var btnblock = document.getElementById("block");
    // //console.log(btnlike);
    // var stat = btnblock.textContent;
    // // alert(btnlike.textContent);
    // // var blocked = 0;
    // if (btnblock.textContent == 'Block') {
    //     btnblock.textContent = 'Unblock';
    //     blocked = 1;
    // }
    // else if (btnblock.textContent == 'Unblock') {
    //     btnblock.textContent = 'Block';
    //     blocked = 0;
    // }

    var hr = new XMLHttpRequest();
    var url = "matches.php";
     hr.open("POST", url, true);
     hr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
     hr.onreadystatechange = function() {
        if(hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            alert(return_data);
            $("#test").html(return_data);
        }
    }
    // user = document.getElementById("name").textContent;
    // var sumn = this.getAttribute("data-likee")
    // var user = this.getAttribute("data-liker");
    ret = "age="+age.value+"&loc="+loc.value;
    // alert(user);
    hr.send(ret);
});