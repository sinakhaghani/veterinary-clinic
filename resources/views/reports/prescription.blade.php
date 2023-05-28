<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page Title</title>
    <style>
        body {
            font-family: 'vazir';
            direction: rtl;
        }
        table, th, td {
            border:1px solid black;
            border-collapse: collapse;
        }
        th, td {
            border-color: #96D4D4;
        }
        .text-center {
            text-align: center;
        }
        .bold{
            font-weight: bold;
            font-size: 16px;
        }
    </style>

</head>

<body>
<table style="width:100%">
    <thead style="color: #FFFFFF;text-align: center">
    <tr>
        <th class="text-center bold"></th>
        <th class="text-center bold">نام مالک</th>
        <th class="text-center bold">توضیحات</th>
        <th class="text-center bold">تاریخ ثبت</th>
    </tr>
    </thead>
    <tbody style="background-color: #FFFFFF;text-align: center">
    @foreach($data as $index => $items)
        <tr>
            <td class="text-center"><h5>{{ $index + 1 }}</h5></td>
            <td class="text-center"><h5>{{ $items['livestock']['name'] ?? "" }}</h5></td>
            <td class="text-center">{{ $items['description'] }}</td>
            <td class="text-center">{{ $items['date'] }}</td>
        </tr>
    @endforeach

    </tbody>
</table>
</body>

</html>
