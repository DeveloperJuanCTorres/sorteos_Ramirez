<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Tickets</title>

<style>
body{
    font-family: Arial;
}

.grid{
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 10px;
}

.ticket{
    border: 2px dashed #000;
    padding: 10px;
    height: 80px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.ticket h3{
    margin: 0;
    font-size: 18px;
}

.ticket small{
    font-size: 14px;
}

@media print {
    body { margin: 0; }
}
</style>

</head>

<body onload="window.print()">

<div class="grid">

@foreach($tickets as $t)
    @for($i = 0; $i < $t->cantidad; $i++)
    <div class="ticket">
        <div>
            <h3>{{ $t->sorteo->name }} </h3>
            <h3>{{ $t->nombres }} {{ $t->apellidos }}</h3>
            <small>DNI: {{ $t->dni }}</small>
        </div>

        <div>
            <strong>#{{ $t->id }} - {{ $i + 1 }}</strong>
        </div>
    </div>
    @endfor
@endforeach

</div>

</body>
</html>