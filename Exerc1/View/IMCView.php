<?php ?>
<!doctype html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teste</title>
</head>

<body>
<div class="center">
<h2><?php echo gettext('IMC') ?></h2>

        <form id="FormIMC" onsubmit="calculateImc()">
            <input type="hidden" id="Action" name="Action" value="CalculateIMC">


                <input type="text" name="Height" id="Height" placeholder="<?php echo gettext('Height (cm)') ?>">


            <input type="text" name="Weight" id="Weight" placeholder="<?php echo gettext('Weight (kg)') ?>">
            <input onclick="calculateImc()" type="submit" name="Height" id="Height">
        </form>


    <h3><?php echo gettext('Result: ') ?><span id="resultIMC" >0.0</span></h3>
</div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
   function changeIMC (Result) {
       console.log(Result)
       let RESULT = document.getElementById('resultIMC');
       console.log(RESULT)
       RESULT.textContent = Result.toString();
   }

    let FORM = document.getElementById('FormIMC');
    FORM.addEventListener('click', (Event) => Event.preventDefault());

function calculateImc() {
    let Data = $('#FormIMC').serializeArray();

    $.post('../Controller/Process.php', Data, function () {
    }).done((Response) => {
        alert(Response)
        changeIMC(Response)
    })
};
</script>