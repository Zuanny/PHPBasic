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
<h2><?php echo gettext('Calculate Compound Interest') ?></h2>

        <form id="FormCompound" onsubmit="calculateCompoundInterest()">
            <input type="hidden" id="Action" name="Action" value="calculateCompoundInterest">


            <input type="text" name="Capital"  placeholder="<?php echo gettext('R$ Valor De Capital') ?>" value="">
            <input type="text" name="Meses"  placeholder="<?php echo gettext('Quantidade de Meses') ?>" value="">


            <input type="text" name="Juros"  placeholder="<?php echo gettext('Juros ao Mes %') ?>" value="">
            <input onclick="calculateCompoundInterest()" type="submit">
        </form>


    <h3><?php echo gettext('Resultado: ') ?><span id="resultCompound" >0</span></h3>
</div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
   function changeCompound (Result) {
       let Element = document.getElementById('resultCompound');
       Element.textContent = Result.toString();
   }

    let FormCompound = document.getElementById('FormCompound');
   FormCompound.addEventListener('click', (Event) => Event.preventDefault());

function calculateCompoundInterest() {
    let Data = $('#FormCompound').serializeArray();

    $.post('../Controller/Process.php', Data, function () {
    }).done((response) => {
        changeCompound(response)
    })
};
</script>