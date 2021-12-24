<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Amalan</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap");

        body{
            background-color: #ebebeb;
            margin: 1rem;
            width: 70%;
            margin: auto;
            font-family: "Poppins", sans-serif;
            background: #f6f6f6;
            color: #38524A;
        }

        .container {
            box-sizing: border-box;
            background: #fff;
            padding: 1.5rem;
            border-radius: 8px;
        }

        .ket-container{
            box-sizing: border-box;
            background: #fff;
            padding: 0.5rem;
            border-radius: 8px;
            display: flex;
            flex-direction: row;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        th {
            font-weight: normal;
        }

        .dot {
            height: 30px;
            width: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
        }

        .haid{
            background-image:url('detail-amalan/haid.svg');
            background-repeat: no-repeat;
            background-size: auto;
        }

        .today-false{
            background-image:url('detail-amalan/today-false.svg');
        }

        .today-true{
            background-image:url('detail-amalan/today-true.svg');
            background-repeat: no-repeat;
            background-size: auto;
        }

        .no-value{
            background-image:url('detail-amalan/no-value.svg');
        }

        .past-false{
            background-image:url('detail-amalan/past-false.svg');
        }

        .past-true{
            background-image:url('detail-amalan/past-true.svg');
        }

        .parent {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            grid-template-rows: repeat(5, 1fr);
            grid-column-gap: 2rem;
        }

        .div1 { grid-area: 1 / 1 / 2 / 2; }
        .div2 { grid-area: 1 / 2 / 3 / 3; }
        .div3 { grid-area: 2 / 1 / 3 / 2; }
        .div4 { grid-area: 3 / 1 / 4 / 2; }
        .div5 { grid-area: 3 / 2 / 4 / 3; }
    </style>
</head>
<body>
    <div class="title-detail-amalan">
        <h3>Detail Amalan</h3>
        <p>22 Nov - 28 Nov 2021</p>
    </div>
    <div class="ket-container">
        <p style="font-weight: bold;">Keterangan</p>
    
    </div>
    <div class="parent">
        <div class="div1">
            <h3>Shalat Wajib</h3>
            <div class="container">
                <table>
                <tr>
                    <th></th>
                    <th>Sen</th>
                    <th>Sel</th>
                    <th>Rab</th>
                    <th>Kam</th>
                    <th>Jum</th>
                    <th>Sab</th>
                    <th>Ahd</th>
                </tr>
                <tr>
                    <td>Sholat Subuh</td>
                    <td><div class="dot haid"></div></td>
                    <td><div class="dot past-false"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot today-true"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                </tr>
                <tr>
                    <td>Sholat Dzuhur</td>
                    <td><div class="dot haid"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot today-false"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                </tr>
                <tr>
                    <td>Sholat Ashar</td>
                    <td><div class="dot haid"></div></td>
                    <td><div class="dot past-false"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot today-false"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                </tr>
                <tr>
                    <td>Sholat Maghrib</td>
                    <td><div class="dot haid"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot today-false"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                </tr>
                <tr>
                    <td>Sholat Isya</td>
                    <td><div class="dot haid"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot today-false"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                </tr>
                </table>
            </div>
        </div>

        <div class="div2">
            <h3>Sholat Rawatib</h3>
            <div class="container">
                <table>
                <tr>
                    <th></th>
                    <th>Sen</th>
                    <th>Sel</th>
                    <th>Rab</th>
                    <th>Kam</th>
                    <th>Jum</th>
                    <th>Sab</th>
                    <th>Ahd</th>
                </tr>
                <tr>
                    <td>Sholat Qabliyah Subuh</td>
                    <td><div class="dot haid"></div></td>
                    <td><div class="dot past-false"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot today-true"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                </tr>
                <tr>
                    <td>Sholat Qabliyah Dzuhur</td>
                    <td><div class="dot haid"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot today-false"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                </tr>
                <tr>
                    <td>Sholat Ba’diyah Dzuhur</td>
                    <td><div class="dot haid"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot today-false"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                </tr>
                <tr>
                    <td>Sholat Qabliyah Asar</td>
                    <td><div class="dot haid"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot today-false"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                </tr>
                <tr>
                    <td>Sholat Qabliyah Maghrib</td>
                    <td><div class="dot haid"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot today-false"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                </tr>
                <tr>
                    <td>Sholat  Ba’diyah Maghrib</td>
                    <td><div class="dot haid"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot today-false"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                </tr>
                <tr>
                    <td>Sholat Qabliyah Isya</td>
                    <td><div class="dot haid"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot today-false"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                </tr>
                <tr>
                    <td>Sholat Ba’diyah Isya</td>
                    <td><div class="dot haid"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot today-false"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                </tr>
                </table>
            </div>
        </div>

        <div class="div3">
            <h3>Shalat Sunnah</h3>
            <div class="container">
                <table>
                <tr>
                    <th></th>
                    <th>Sen</th>
                    <th>Sel</th>
                    <th>Rab</th>
                    <th>Kam</th>
                    <th>Jum</th>
                    <th>Sab</th>
                    <th>Ahd</th>
                </tr>
                <tr>
                    <td>Sholat Dhuha</td>
                    <td><div class="dot haid"></div></td>
                    <td><div class="dot past-false"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot today-true"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                </tr>
                <tr>
                    <td>Sholat Tahajud</td>
                    <td><div class="dot haid"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot today-false"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                </tr>
                </table>
            </div>
        </div>

        <div class="div4">
            <h3>Amalan Sunnah</h3>
            <div class="container">
                <table>
                <tr>
                    <th></th>
                    <th>Sen</th>
                    <th>Sel</th>
                    <th>Rab</th>
                    <th>Kam</th>
                    <th>Jum</th>
                    <th>Sab</th>
                    <th>Ahd</th>
                </tr>
                <tr>
                    <td>Puasa Sunnah</td>
                    <td><div class="dot haid"></div></td>
                    <td><div class="dot past-false"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot today-true"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                </tr>
                <tr>
                    <td>Baca Al-Qur'an</td>
                    <td><div class="dot haid"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot today-false"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                </tr>
                <tr>
                    <td>Infaq</td>
                    <td><div class="dot haid"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot today-false"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                </tr>
                <tr>
                    <td>Kajian</td>
                    <td><div class="dot haid"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot today-false"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                </tr>
                </table>
            </div>
        </div>

        <div class="div5">
            <h3>Dzikir</h3>
            <div class="container">
                <table>
                <tr>
                    <th></th>
                    <th>Sen</th>
                    <th>Sel</th>
                    <th>Rab</th>
                    <th>Kam</th>
                    <th>Jum</th>
                    <th>Sab</th>
                    <th>Ahd</th>
                </tr>
                <tr>
                    <td>Dzikir Pagi</td>
                    <td><div class="dot haid"></div></td>
                    <td><div class="dot past-false"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot today-true"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                </tr>
                <tr>
                    <td>Dzikir Petang</td>
                    <td><div class="dot haid"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot today-false"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                </tr>
                <tr>
                    <td>Istighfar</td>
                    <td><div class="dot haid"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot today-false"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                </tr>
                <tr>
                    <td>Sholawat</td>
                    <td><div class="dot haid"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot today-false"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>