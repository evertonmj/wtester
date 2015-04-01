<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Testador de Web Services</h1>
<hr />

<p>Testar Hello World em Webservice SOAP:</p>
<p>Resultado:</p>
<div id="resultHelloWorldSoap">
</div>
<hr/>
<p>Testar Calculadora em Webservice SOAP:</p>
<p>Resultado:</p>
<div id="resultCalculatorSoap">
</div>
<hr/>
<p>Testar HelloWorld em Webservice REST:</p>

<p>Resultado:</p>
<div id="resultHelloWorldRest">
</div>
<hr/>
<p>Testar Calculadora em Webservice REST:</p>

<p>Resultado:</p>
<div id="resultCalculatorRest">
</div>
<hr/>

<script type="text/javascript">
    $(document).ready(function(){
        $.soap({
            url: 'http://localhost/wsoap/webService/soapservice?ws=1',
            method: 'helloWorld',

            data: {
            },

            success: function (soapResponse) {
                $('#resultHelloWorldSoap').text(soapResponse);
            },
            error: function (SOAPResponse) {
                // show error
            }
        });

        $.soap({
            url: 'http://localhost/wsoap/webService/soapservice?ws=1',
            method: 'calculator',

            data: {
                'operation': 'SUM',
                'num1': 3,
                'num2': 4
            },

            success: function (soapResponse) {
                $('#resultCalculatorSoap').text(soapResponse);
            },
            error: function (SOAPResponse) {
                // show error
            }
        });

        $.ajax({
            url:'http://localhost/wrest/webService/helloWorld',
            type:"GET",
            success:function(data) {
                $('#resultHelloWorldRest').html(data);
              console.log(data);
            },
            error:function (xhr, ajaxOptions, thrownError){
              console.log(xhr.responseText);
            }
        });

        $.ajax({
            url:'http://localhost/wrest/webService/calculator',
            type:"GET",
            data: {"operation":"SUM", "num1":3, "num2":3},
            success:function(data) {
                $('#resultCalculatorRest').html(data);
                console.log(data);
            },
            error:function (xhr, ajaxOptions, thrownError){
              console.log(xhr.responseText);
            }
        });
    });
</script>
