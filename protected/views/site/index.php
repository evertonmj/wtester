<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Testador de Web Services</h1>
<hr />
<?php
    //criar client soap
    $client = new SoapClient("http://localhost/wsoap/index.php?r=webService/soapservice/");
?>
<p>Testar Hello World em Webservice SOAP:</p>
<a href="#" id="helloWorldSoap">Fazer Chamada</a>
<br/><br/>
<p>Resultado:</p>
<div id="resultHelloWorldSoap">
    <?php
        echo $client->helloWorld();
    ?>
</div>
<hr/>
<p>Testar Calculadora em Webservice SOAP:</p>
<a href="#" id="calculatorSoap">Fazer Chamada</a>
<br/><br/>
<p>Resultado:</p>
<div id="resultCalculatorSoap">
    <?php
        echo $client->calculator("SUM", 2, 5);
    ?>
</div>
<hr/>
<p>Testar HelloWorld em Webservice REST:</p>
<a href="#" id="helloWorldRest">Fazer Chamada</a>
<br/><br/>
<p>Resultado:</p>
<div id="resultHelloWorldSoap">
    <script>$(document).ready(function() { helloWorldRest();});</script>
</div>
<hr/>
<p>Testar Calculadora em Webservice REST:</p>
<a href="#" id="calculatorRest">Fazer Chamada</a>
<br/><br/>
<p>Resultado:</p>
<div id="resultCalculatorRest">
    <script>$(document).ready(function() {calculatorRest();});</script>
</div>
<hr/>

<script type="text/javascript">
    function helloWorldRest() {
        $.ajax({
            url:'http://localhost/wrest/webService/helloWorld',
            type:"GET",
            success:function(data) {
                $('#resultHelloWorldSoap').html(data);
              console.log(data);
            },
            error:function (xhr, ajaxOptions, thrownError){
              console.log(xhr.responseText);
            }
        });
    }

    function calculatorRest()    {
        var calcData = {"operation":"SUM", "num1":3, "num2":3};
        $.ajax({
            url:'http://localhost/wrest/webService/calculator',
            type:"GET",
            data: calcData,
            success:function(data) {
                $('#resultCalculatorRest').html(data);
                console.log(data);
            },
            error:function (xhr, ajaxOptions, thrownError){
              console.log(xhr.responseText);
            }
        });
    }
</script>
