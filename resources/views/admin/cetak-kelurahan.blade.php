<!DOCTYPE html>
<html lang="en">
<head>
    <title>Koordinator</title>
    <style>
        @media print {
            @page {
                size: legal;
            }
        }
    </style>
</head>
<body style="margin: 15mm 5mm 25mm 5mm;">
<table border="0" align="center" width="1000">
    <tr>
        <td><img src="{{ asset('upload\post\1588539656.png') }}" width="60" height="70"></td>
        <td>
            <center>
                <font size="5">LAPORAN DATA KELURAHAN {{ $nama_kel }}</font><br>
                <font size="4"><b>TIM PEMENANGAN KMS. H.M UMAR HALIM</b></font><br>
                <font size="2"><i>CALEG DPR RI DAPIL SUMSEL 1</i></font><br>
                <font size="2"><i>(2024-2029)</i></font><br>
            </center>
        </td>
        <td><img src="{{ asset('upload\post\15906538096.jpg') }}" width="60" height="70"></td>
    </tr>
    <tr>
        <td colspan="3"><hr></td>
    </tr>
</table>
<br>
<table align="center" width="1000">

</table>
@foreach($kelurahan as $kelu)
<table align="center" width="1000">
    <tr>
        <td width="200">Kelurahan</td>
        <td width="20">:</td>
        <td colspan="3">
            {{ $kelu->kelurahan }}
        </td>
    </tr>
</table>
<table align="center" border="1" width="1000">
    <thead>
        <th width="5%">TPS</th>
        <th width="5%">Total</th>
    </thead>
    <tbody>
    @foreach($kel as $d)
        @if($kelu->kelurahan == $d->kelurahan)
        <tr>
            <td>{{ $d->tps }}</td>
            <td>{{ $d->total }}</td>
        </tr>
        @endif
    @endforeach
    </tbody>
</table>
<br>
@endforeach
</body>
</html>