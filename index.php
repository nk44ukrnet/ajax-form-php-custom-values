<?php
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

//$content = trim(file_get_contents("php://input"));
//$decoded = json_decode($content, true);
//
//echo '<pre>';
//echo print_r($decoded);
//echo '</pre>';



if ($contentType === "application/json") {
    echo  'works inside';
    //Receive the RAW post data.
    $content = trim(file_get_contents("php://input"));

    $decoded = json_decode($content, true);

    print_r($decoded);
//    echo $decoded;

    //If json_decode failed, the JSON is invalid.
    if(! is_array($decoded)) {

    } else {
        // Send error back to user.
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ajax form</title>
</head>
<body>

<br><br><br><br><br>
<form name="form-test">
    <input type="text" id="fullname" name="name" placeholder="name" value="nameQ" required>
    <br><br>
    <input type="tel" name="phone" id="phone" placeholder="phone" value="12321" required>
    <br><br>
    <input type="email" name="email" id="email" placeholder="email" value="f@s.com" required>
    <br><br>
    <select name="age" id="age" required>
        <option value="" disabled>Select age</option>
        <option value="3-6" selected>3-6</option>
        <option value="6-10">6-10</option>
        <option value="10-16">10-16</option>
    </select>
    <br><br>
    <select name="school" id="school" required>
        <option value="" disabled>Select School</option>
        <option value="231" selected>School location 1</option>
        <option value="427">School location 2</option>
        <option value="612">School location 3</option>
    </select>
    <br><br>
    <button type="submit">Send</button>
</form>

<script>

    let data = JSON.stringify({
        "from": window.location.href,
        "school_id": school.value,
        "promo_name": "test-promo",
        "data": [
            {"name": fullname.value},
            {"phone": phone.value},
            {"age": age.value},
        ]
    });
    console.log(data)
    document.forms['form-test'].addEventListener('submit', e => {
        e.preventDefault();

        fetch('index.php', {
            method: 'POST',
            mode: "same-origin",
            credentials: "same-origin",
            headers: {
                "Content-Type": "application/json"
            },
            body: data
            // body: JSON.stringify({
            //     "from": window.location.href,
            //     "school_id": school.value,
            //     "promo_name": "test-promo",
            //     "data": [
            //         {"name": name.value},
            //         {"phone": phone.value},
            //         {"age": age.value},
            //     ]
            // })
        })
        .then(res=>res.text())
        .then(res=>console.log(res))
        .catch(err=>console.log(err));
    })
</script>

</body>
</html>