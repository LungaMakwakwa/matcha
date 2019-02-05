$(window).load(function(){

    sorts();

    $("#sort").on('click',function(){

        age1 = document.getElementById("age1");
        age2 = document.getElementById("age2");
        loc = document.getElementById("loc");
        fame = document.getElementById("fame_r");

        var hr = new XMLHttpRequest();
        var url = "sort.php";
         hr.open("POST", url, true);
         hr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
         hr.onreadystatechange = function() {
            if(hr.readyState == 4 && hr.status == 200) {
                var return_data = hr.responseText;
                $("#test").html(return_data);
                //alert(return_data);
            }
        }
        ret = "age1="+age1.value+"&age2="+age2.value+"&loc="+loc.value+"&fame="+fame.value;
        hr.send(ret);
    });
});

function sorts()
{
    var hr = new XMLHttpRequest();
    var url = "sort.php";
     hr.open("POST", url, true);
     hr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
     hr.onreadystatechange = function() {
        if(hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            $("#test").html(return_data);
        }
    }
    ret = "age1=None&age2=None&loc=None&fame=Descending";
    hr.send(ret);
}