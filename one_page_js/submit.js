$("#bio_post").on('click',function(){
    bio_val = $('#bio').text();
    
    var hr = new XMLHttpRequest();
    var url = "bio.php";
     hr.open("POST", url, true);
     hr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
     hr.onreadystatechange = function() {
        if(hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            alert(return_data);
        }
    }
    ret = "bio="+bio_val;
    hr.send(ret);
});