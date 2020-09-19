<!DOCTYPE>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Orden de Compra</title>
<style type="text/css">
   body {
    font-family: Arial, sans-serif; 
    font-size: 14px;
}
#datos{
    float: left;
    margin-top: 0%;
    margin-left: 2%;
    margin-right: 2%;
}

#encabezado{
    text-align: center;
    margin-left: 35%;
    margin-right: 35%;
    font-size: 15px;
}

#empresa{
    text-align: center;
    margin-left: 35%;
    margin-right: 35%;
}

#fact{
    /*position: relative;*/
    float: right;
    margin-top: 2%;
    margin-left: 2%;
    margin-right: 2%;
    font-size: 15px;
}

section{
    clear: left;
}

#cliente{
    text-align: left;
}

#facliente{
    width: 40%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 15px;
}

#fac, #fv, #fa{
    color: #000;
    font-size: 15px;
}

#facliente thead{
    padding: 20px;
    background:#1bdbe0;
    text-align: left;
    border-bottom: 1px solid #FFFFFF;  
}

#facvendedor{
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 15px;
}

#facvendedor thead{
    padding: 20px;
    background: #1bdbe0;
    text-align: center;
    border-bottom: 1px solid #FFFFFF;  
}

#facproducto{
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 15px;
}

#facproducto thead{
    padding: 20px;
    background: #1bdbe0;
    text-align: center;
    border-bottom: 1px solid #FFFFFF;  
}
</style>
<body>
    <header>
        <div >
            <center><h1><b>Softpae</b></span></center>
        </div>
        <div>
            <table id="datos">
                <tbody>
                    <tr>
                        <th>
                            <p id="proveedor">
                                PROVEEDOR: {{$compra->nombre}}<br>                         
                                FECHA: {{$compra->fecha}}
                            </p>
                        </th> 
                    </tr>
                </tbody>
            </table>
        </div><br>
        <div>
            <p id="fact">
             <b>FACTURA DE COMPRA N° {{$compra->id}} </b>               
            </p>
        </div>
    </header>
    <section>
        <div>
            <table id="facproducto">
                <thead>
                    <tr id="fa">
                        <th>PRODUCTO</th>
                        <th>CANTIDAD</th>
                        <th>PRECIO U</th>
                        <th>SUBTOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detalles as $det)
                    <tr>
                        <td><center>{{$det->producto}}</center></td>
                        <td><center>{{$det->cantidad}}</center></td>
                        <td><center>$ {{$det->precio}}</center></td>
                        <td><center>$ {{number_format($det->cantidad*$det->preci )}}</center></td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot> 
                    <tr>
                        <th colspan="5">------------------------------------------------------------------------------------------------------------------------------------------------------</th>
                    </tr>                
                    <tr>
                        <th  colspan="4"><p align="right">TOTAL PAGAR:</p></th>
                        <th><p align="center"> $ {{number_format($compra->total_venta,2)}}</p></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>
    <br>
    <br>
    <footer>
        <div id="datos">
            <p id="encabezado">
                <b>
            </p>
        </div>
    </footer>
</body>
</html>