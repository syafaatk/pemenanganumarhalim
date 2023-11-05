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
                <font size="5">LAPORAN DATA MATAPILIH</font><br>
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
    <tr>
        <td colspan="3">{{ date('j F Y', strtotime($start))}} - {{ date('j F Y', strtotime($end)) }}</td>
    </tr>
</table>
<br>
<table align="center" width="1000">
    <tr>
        <td width="200">Koordinator</td>
        <td width="20">:</td>
        <td colspan="3">{{ $koordinator->name }}</td>
    </tr>
    <tr>
        <td>Nomor HP</td>
        <td>:</td>
        <td colspan="3">{{ $koordinator->nohp }}</td>
    </tr>
</table>
@foreach($kelurahan as $kel)
<table align="center" width="1000">
    <tr>
        <td width="200">Kecamatan / Kelurahan</td>
        <td width="20">:</td>
        <td colspan="3">
            {{ $kel->kecamatan }} / {{ $kel->kelurahan }}
        </td>
    </tr>
</table>
<table align="center" border="1" width="1000">
    <thead>
        <th width="2%">No</th>
        <th width="20%">Nama</th>
        <th width="15%">NIK</th>
        <th width="5%">RT</th>
        <th width="5%">RW</th>
        <th width="5%">TPS</th>
        <th width="10%">Nomor HP</th>
        <th width="10%">Paraf</th>
    </thead>
    <tbody>
        @foreach($data as $d)
        @if($kel->kelurahan == $d->kelurahan)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $d->nama }}</td>
            <td>{{ $d->nik }}</td>
            <td>{{ $d->rt }}</td>
            <td>{{ $d->rw }}</td>
            <td>{{ $d->tps }}</td>
            <td>{{ $d->nohp }}</td>
            <td></td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>
<br>
@endforeach
</body>
</html>