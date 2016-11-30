<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
// put your code here
require './db-config.php';
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script>

            // Convert JSON String to JavaScript Object
            var JSONString = '[{"name":"Jonathan Suh","gender":"male"},{"name":"William Philbin","gender":"male"},{"name":"Allison McKinnery","gender":"female"}]';
//
//            var JSONObject = JSON.parse(JSONString);
//            console.log(JSONObject);      // Dump all data of the Object in the console
//            alert(JSONObject[0]["name"]); // Access Object data
//            
            function showHint(str) {
                if (str.length == 0) {
                    document.getElementById("txtHint").innerHTML = "";
                    return;
                } else {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                            var city = document.getElementById("city");
//                            var myArray = JSON.parse(this.responseText);
                            document.getElementById("txtHint").innerHTML = this.responseText;
                            var option = document.createElement('option');
//                            if(myArray.length > 0){
//                                for(var i=0;i< myArray.length ; i++){
//                                    console.log(myArray[i]["id"] + myArray[i]["city"] );
//                                    option.value = myArray[i]["id"];
//                                    option.text = myArray[i]["city"];
//                                    city.appendChild(option);
//                                }
                            city.innerHTML = this.responseText;
                        } else {
//                                city.removeChild();
                        }
                    };
                    xmlhttp.open("GET", "gethint.php?q=" + str, true);
                    xmlhttp.send();
                }
            }
        </script>
    </head>
    <body>
        <div>
            <div>

            </div>
        </div>
        <div>
            <form>
                <select id="country" onchange="showHint(this.value)">
                    <option value="">Select Country</option>
                    <?php
                    $result = $conn->query("SELECT * FROM `countries`");
                    if ($result->num_rows > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <option value='<?= $row['id'] ?>'><?= $row['country'] ?></option>
                            <?php
                        }
                    } else {
                        echo 'Problemmmmmmmmmmm';
                    }
                    ?>
                </select>

                <select id="city"></select>
            </form>
        </div>
        <div>
            <div id="txtHint"></div>
        </div>
    </body>
</html>
