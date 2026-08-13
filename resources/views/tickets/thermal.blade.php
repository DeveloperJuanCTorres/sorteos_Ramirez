<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Ticketera 80mm</title>

<style>

body{

    margin:0;
    padding:0;
    font-family:Arial;
    width:80mm;
}

.ticket{

    width:76mm;

    border:2px dashed #000;

    margin:2mm auto;

    padding:3mm;

    page-break-after:always;

    text-align:center;

}

.ticket h2{

    margin:0;

    font-size:20px;

}

.ticket h3{

    margin:5px 0;

    font-size:18px;

}

.ticket p{

    margin:4px 0;

    font-size:15px;

}

.numero{

    font-size:18px;

    font-weight:bold;

}

@media print{

    @page{

        size:80mm auto;
        margin:0;

    }

    body{

        margin:0;

    }

}

</style>

</head>

<body onload="window.print()">

@foreach($tickets as $t)

    @for($i=0;$i<$t->cantidad;$i++)

        <div class="ticket">

            <h2>{{ $t->sorteo->name }}</h2>

            <hr>

            <h3>

                {{ $t->nombres }}

                {{ $t->apellidos }}

            </h3>

            <p>DNI: {{ $t->dni }}</p>

            <hr>

            <div class="numero">

                TICKET #{{ $t->id }} - {{ $i+1 }}

            </div>

        </div>

    @endfor

@endforeach

</body>

</html>