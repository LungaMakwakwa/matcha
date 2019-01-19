$('document').ready(function () {
    console.log("hi");

    $(".like_btn").on('click',function(){
        alert(this.getAttribute("data-likee"));
        alert(this.getAttribute("data-liker"));

        var btnlike = document.getElementById("like");
        //console.log(btnlike);
        var stat = btnlike.textContent;
        alert(btnlike.textContent);
        var liked = 0;
        if (btnlike.textContent == 'Like') {
            btnlike.textContent = 'Unlike';
            liked = 1;
        }
        else if (btnlike.textContent == 'Like back') {
            btnlike.textContent = 'Unlike';
            liked = 1;
        }
        else{
            btnlike.textContent = 'Like';
            liked = 0;
        }

        var hr = new XMLHttpRequest();
        var url = "like.php";
         hr.open("POST", url, true);
         hr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
         hr.onreadystatechange = function() {
            if(hr.readyState == 4 && hr.status == 200) {
                var return_data = hr.responseText;
                alert(return_data);
            }
        }
        //user = document.getElementById("name").textContent;
        var sumn = this.getAttribute("data-likee")
        var user = this.getAttribute("data-liker");
        ret = "liked="+liked+"&user="+user+"&uid="+sumn+"&stat="+stat;
        alert(user);
        hr.send(ret);
    });
});