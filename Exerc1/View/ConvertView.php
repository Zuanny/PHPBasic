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
<h2><?php echo gettext('TEMP Convert') ?></h2>

        <form id="FormTemp" onsubmit="convertTemp()">
            <input type="hidden" id="Action" name="Action" value="ConvertTemp">

            <input type="text" name="Fahrenheit" id="Fahrenheit" placeholder="<?php echo gettext('Fahrenheit') ?>">
            <input onclick="convertTemp()" type="submit" >
            <input type="text" name="Celsius" id="Celsius" placeholder="<?php echo gettext('Celsius') ?>">

        </form>

</div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
   function changeTemps (Result) {
       let result = document.getElementById(Result[0]);
       result.value = Result[1];
   }

    let FORMTEMP = document.getElementById('FormTemp');
   FORMTEMP.addEventListener('click', (Event) => Event.preventDefault());

function convertTemp() {
    let Data = $('#FormTemp').serializeArray();

    $.post('../Controller/Process.php', Data, function () {
    }).done((response) => {
        changeTemps(response)
    })
};



</script>