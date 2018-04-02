<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="https://cdn.enterwind.com/webfonts/ew-sans/ew-sans.css">
    <link href="{{asset('landing/print/base.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('landing/print/styles/bauhaus.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('landing/print/styles/bauhaus_print.css')}}" media="print" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono" rel="stylesheet">
    <style>
        body {
            -webkit-print-color-adjust: exact;
        }
        .print-only{
            display: none;
        }

        .kop {
            margin-bottom: 10px;
            padding: 10px 0px 0;
            text-align: center;
        }
        .kop img {
            float: left;
            width: 75px;
        }

        .kop p.atas {
            margin-bottom: -1px;
            margin-top: 2px;
            font-weight: bold;
            font-size: 1em;
        }

        .kop p.tengah {
            margin: 0;
            font-size: 1.4em;
            font-weight: bold;
        }
        .kop p.bawah {
            margin-bottom: 0;
            font-size: .9em;
            line-height: 16px;
        }
        .kop p.bawah span {
            font-size: 1.5em;
        }
        hr {
            margin-bottom: 10px;
            border-top: 3px double #8c8b8b;
        }

        .custom {
            font-family: 'Roboto Mono', monospace;
        }
        .text-center {
            text-align: center;
        }
        .mb0 {
            margin-bottom: 0
        }
        table.no-border td {
            border-top: 0px;
            padding: 2px 10px;
        }
        table.border th {
            background: rgba(202, 202, 202, 0.24)
        }
        table.border td, table.border th {
            border: 1px solid #505050;
            padding: 2px 10px;
        }
        .pl0 {
            padding-left: 0!important;
        }
        @media print {
            body {
                /*filter: Gray();
                filter: url('#grayscale'); 
                -webkit-filter: grayscale(100%); 
                filter: grayscale(100%);*/

                margin-top: -10px;
                margin-left: 0mm; 
                margin-right: 0mm
            }
            .pagestyle {
                -moz-box-shadow: none;
                -webkit-box-shadow: none;
                box-shadow: none;
            }
            .baris-baru {
                page-break-after: always;
            }
            .print-only{
                display: block;
            }
        }
        body {
            font-size: .8em;
        }
    </style>

    <style type="text/css" media="screen">
        #watermark{
            position:absolute;
            z-index:0;
            background:white;
            opacity: .1;
            display:block;
            min-height:50%; 
            min-width:50%;
            color:yellow;
        }
        #gambar
        {
            color:lightgrey;
            font-size:120px;
            transform:rotate(0);
            -webkit-transform:rotate(0);
            margin-top: 50%!important;
            margin-left: 15%!important;
        }
    </style>
    <style type="text/css" media="print">
        #watermark{
            position:absolute;
            z-index:0;
            background:white;
            opacity: .1;
            display:block;
            min-height:50%; 
            min-width:50%;
            color:yellow;
        }
        #gambar
        {
            color:lightgrey;
            font-size:120px;
            transform:rotate(0);
            -webkit-transform:rotate(0);
            margin-top: 50%!important;
            margin-left: 15%!important;
        }
    </style>
</head>
<body>
    <div id="invoice" class="pagestyle">
        <div id="watermark">
            <p id="gambar"><img src="{{ asset('landing/images/logo_home.png') }}"></p>
        </div>
        <div class="kop">
            <img src="{{ asset('logo-smr.png') }}">
            <img src="{{ asset('logo-kominfo.png') }}" style="float:right;">
            <p class="atas">PEMERINTAH KOTA SAMARINDA</p>
            <p class="tengah">DINAS KOMUNIKASI DAN INFORMATIKA</p>
            <p class="bawah">
                Jalan Kesuma Bangsa No.84 Kode Pos 75123 <br/>
                <b>S A M A R I N D A</b>
            </p>
        </div>
        <hr/>

        <div id="invoice-other" style="width: 500px;margin-top: 5px;text-align: left;background: #dddddd4a;    padding-bottom: 25px;padding-top: 5px;">
            <div id="company-reg-number">
                <h3 class="text-center" style="margin-top: 20px; margin-bottom: 0px">
                    SELAMAT {{ strtoupper($team->nama) }}
                    <br/>
                    <small>KALIAN KAMI NYATAMAN</small>
                </h3>
                <h1 class="text-center" style="color:green">LOLOS</h1>
            </div>
        </div>

        <div style="padding: 10px 10px 10px 25px">
            {!! $qrcode !!}
        </div>

        <table class="table border">
            <tr>
                <th width="30%">EMAIL</th>
                <td>{{ $team->email }}</td>
            </tr>
            <tr>
                <th>ASAL</th>
                <td>{{ $team->asal }}</td>
            </tr>
            <tr>
                <th>ALAMAT (BASECAMP)</th>
                <td>{{ $team->alamat }}</td>
            </tr>
            <tr>
                <th>JUMLAH ANGGOTA</th>
                <td>{{ $team->peserta->count() }} Orang</td>
            </tr>
        </table>

        <table class="table border" style="margin-top: 20px">
            <tr>
                <th width="1">NO</th>
                <th>NAMA</th>
                <th>TELP</th>
                <th>EMAIL</th>
                <th>STATUS</th>
            </tr>
            @foreach($team->peserta as $i => $temp)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $temp->nama }}</td>
                <td>{{ $temp->telp }}</td>
                <td>{{ $temp->email }}</td>
                <td>{{ pilihStatusJob($temp->status) }}</td>
            </tr>
            @endforeach
        </table>

        <style type="text/css">
            li {
                list-style-type: circle!important;
                margin-left: 15px!important;
            }
        </style>

        <div style="margin-top: 20px;font-size: 85%">
            
            <p><b>SYARAT &amp; KETENTUAN BERLAKU</b></p>
            <p>Kepesertaan SAMARINDA HACKATHON dibuka untuk :</p>
            <ul>
                <li>
                    WNI, perorangan atau kelompok, yang berdomisili di Kaltim akan dibuktikan pada saat registrasi setidaknya dengan Kartu Pelajar, kartu mahasiswa, atau KTP;
                </li>
                <li>
                    Sudah berusia 18 tahun (punya KTP) paling tidak pada tanggal;
                </li>
                <li>
                    Tim disarankan untuk berkelompok 2-3 orang
                </li>
                <li>
                    Membawa kartu BPJS jika memiliki.
                </li>
                <li>
                    Pendaftaran Samarinda HACKATHON terbuka untuk semua karya inovasi peserta dengan menggunakan lisensi publik/ Umum (GPL[1])
                </li>
                <li>
                    Karya yang didaftarkan merupakan karya asli peserta dan belum pernah menang dalam lomba lain.
                </li>
                <li>
                    <p>Ide atau karya terbagai dalam 3 kategori;</p>
                    <br/>
                    <b>E-RETRIBUSI</b><br/>
                    <b>Deskripsi:</b> Smart payment untuk sewa tenant, pengelolaan retribusi, dll secara terintegrasi.
                    <br/>
                    <br/>
                    <b>E-PARKING</b><br/>
                    <b>Deskripsi:</b> Smart parking menggunakan tap card, auto debit parking dll.
                    <br/>
                    <br/>
                    <b>E-WASTE</b><br/>
                    <b>Deskripsi:</b> Smart wasting management, IoT sampah, daur ulang, dll.
                    <br/><br/>
                </li>
                <li>
                    Karya wajib menggunakan API Samarinda.<br/>
                    <p>API Samarinda dapat diakses di : <b>api.samarindakota.go.id</b> dengan melakukan registrasi terlebih dahulu.</p>
                </li>
            </ul>

            <br/>

            <p>
                <b>GNU General Public License</b> (disingkat GNU GPL, atau cukup GPL; dalam bahasa Indonesia diterjemahkan menjadi lisensi publik umum) merupakan suatu lisensi perangkat lunak bebas yang aslinya ditulis oleh Richard Stallman untuk proyek GNU. Lisensi GPL memberikan penerima salinan perangkat lunak hak dari perangkat lunak bebas dan menggunakan copyleft untuk memastikan kebebasan yang sama diterapkan pada versi berikutnya dari karya tersebut. REF: <br/>
                <b>https://www.gnu.org/licenses/licenses.en.html</b> dan <b>https://opensource.org/licenses</b>. 
            </p>

        </div>

    </div>
</body>
</html>