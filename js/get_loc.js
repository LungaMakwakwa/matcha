// $(document).ready(function () {

//     $("#locSearch").keyup(function (e) {
//     $("select").html('');
//     e.preventDefault();
//     searchVal = e.target.value;
//     url = "https://maps.googleapis.com/maps/api/place/autocomplete/json?input="+searchVal+"&types=(cities)&language=en_ZA&key=AIzaSyAsfNvWU_CkDFroZY_UwQcqqrKarpwp_vI";

//     $.post(url, function (response) {
//         console.log(response.predictions);
//         var count = Object.keys(response.predictions).length;
//         //for (let index = 0; index < count; index++) {
//             console.log(response.predictions[index]['description']);
//             var opt = document.createElement('option');
//             opt.value = response.predictions[index]['description'];
//             opt.innerHTML = response.predictions[index]['description'] ;
//             select.appendChild(opt);
//             $("select").append(opt);
//        // }

//     });

//     });

// });