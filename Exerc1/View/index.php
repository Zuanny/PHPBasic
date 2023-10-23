<!doctype html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EXERCICIO 1</title>
</head>
<style>
.hide {
    display: none;
}
.Exerc {

}
</style>
<body>
<h1><?php echo gettext('Exercicio 1')?></h1>

<div>
    <p><?php gettext('Escolha o exercicio:')?></p>
    <select id="ChoosenExerc">
        <option  value="IMC" > <?php echo gettext('IMC')?></option>
        <option id="TEMPERATURA"><?php echo gettext('Fahrenheit x Celsius')?></option>
    </select>

    <div id="MenuExerc" >
        <div  class="Exerc" id="IMC"> <?php echo include_once './IMCView.php' ?></div>
        <div  class="Exerc hide" id="ConvertTemp"> <?php echo include_once './ConvertView.php' ?></div>
    </div>



</div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

    $('#ChoosenExerc').change(()=> {
        let Value = $('#ChoosenExerc').val();

        $('#MenuExerc .Exerc').addClass('hide')
        switch (Value){
            case  'IMC':
                $('#IMC').removeClass('hide')
                break;
            case 'Fahrenheit x Celsius':
                $('#ConvertTemp').removeClass('hide')
                break;

        }
    })
</script>

