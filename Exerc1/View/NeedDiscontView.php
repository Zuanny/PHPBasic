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
<h2><?php echo gettext('Calculate') ?></h2>

        <form id="FormDiscount" onsubmit="calculateDiscount()">
            <input type="hidden" id="Action" name="Action" value="calculateDiscount">


            <input type="text" name="DesireValue"  placeholder="<?php echo gettext('R$ Valor Desejado') ?>" value="">


            <input type="text" name="ProductValue"  placeholder="<?php echo gettext('R$ Valor do Produto') ?>" value="">
            <input onclick="calculateDiscount()" type="submit">
        </form>


    <h3><?php echo gettext('Percentual de Desconto: ') ?><span id="resultDiscount" >0</span>%</h3>
</div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
   function changeResult (Result) {
       let Element = document.getElementById('resultDiscount');
       console.log(Element)
       console.log(Result)
       Element.textContent = Result.toString();
   }

    let FormDiscount = document.getElementById('FormDiscount');
   FormDiscount.addEventListener('click', (Event) => Event.preventDefault());

function calculateDiscount() {
    let Data = $('#FormDiscount').serializeArray();

    $.post('../Controller/Process.php', Data, function () {
    }).done((response) => {
       changeResult(response)
    })
};
</script>