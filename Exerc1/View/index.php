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
#MenuExerc {
    position: fixed;
    top: 20%;
    left: 30%;

    background-color: aliceblue;
    padding: 25px;
    border-radius: 20px;
}

input {
    border-radius: 8px;
    border-color: white;
}

input[type='submit']{
    background-color: #00a6ff;
    color: white;
    width: 60px;

}
</style>
<body>
<h1><?php echo gettext('Exercicio 1')?></h1>

<div>
    <p><?php gettext('Escolha o exercicio:')?></p>
    <select id="ChoosenExerc">
        <option ><?php echo gettext('IMC')?></option>
        <option ><?php echo gettext('Fahrenheit x Celsius')?></option>
        <option ><?php echo gettext('Calculate Discount')?></option>
        <option ><?php echo gettext('Compound Interest')?></option>
    </select>

    <div id="MenuExerc" >
        <div  class="Exerc" id="IMC"> <?php echo include_once './IMCView.php' ?></div>
        <div  class="Exerc hide" id="ConvertTemp"> <?php echo include_once './ConvertView.php' ?></div>
        <div  class="Exerc hide" id="NeedDescont"> <?php echo include_once './NeedDiscontView.php' ?></div>
        <div  class="Exerc hide" id="CompoundInterest"> <?php echo include_once './CompoundInterestView.php' ?></div>
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
            case 'Calculate Discount':
                $('#NeedDescont').removeClass('hide')
                break;
            case 'Compound Interest':
                $('#CompoundInterest').removeClass('hide')
                break;
        }
    })
</script>

