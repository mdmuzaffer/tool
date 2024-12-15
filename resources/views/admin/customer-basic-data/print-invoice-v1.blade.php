<html>

<head>
    <title>INVOICE - {{ $invoice->slno_gen }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="robots" content="noindex">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" /> --}}
    {{-- <link rel="stylesheet" href="/css/bs4.min.css" /> --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" /> --}}
    <link rel="stylesheet" href="{{url('libs/bs3/css/bootstrap.css')}}" />

    <style>
        .text-right {
            text-align: right !important;
        }

        .col-xs-12 {
            width: 100%;
        }

        .col-xs-6 {
            width: 50%;
        }

        .col-xs-8 {
            width: 66.66666667%;
        }

        .col-xs-4 {
            width: 33.33333333%;
        }

        .col-xs-1,
        .col-xs-2,
        .col-xs-3,
        .col-xs-4,
        .col-xs-5,
        .col-xs-6,
        .col-xs-7,
        .col-xs-8,
        .col-xs-9,
        .col-xs-10,
        .col-xs-11,
        .col-xs-12 {
            float: left;
        }

        .col-xs-1,
        .col-sm-1,
        .col-md-1,
        .col-lg-1,
        .col-xs-2,
        .col-sm-2,
        .col-md-2,
        .col-lg-2,
        .col-xs-3,
        .col-sm-3,
        .col-md-3,
        .col-lg-3,
        .col-xs-4,
        .col-sm-4,
        .col-md-4,
        .col-lg-4,
        .col-xs-5,
        .col-sm-5,
        .col-md-5,
        .col-lg-5,
        .col-xs-6,
        .col-sm-6,
        .col-md-6,
        .col-lg-6,
        .col-xs-7,
        .col-sm-7,
        .col-md-7,
        .col-lg-7,
        .col-xs-8,
        .col-sm-8,
        .col-md-8,
        .col-lg-8,
        .col-xs-9,
        .col-sm-9,
        .col-md-9,
        .col-lg-9,
        .col-xs-10,
        .col-sm-10,
        .col-md-10,
        .col-lg-10,
        .col-xs-11,
        .col-sm-11,
        .col-md-11,
        .col-lg-11,
        .col-xs-12,
        .col-sm-12,
        .col-md-12,
        .col-lg-12 {
            position: relative;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
        }

        * {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .row {
            margin-right: -15px;
            margin-left: -15px;
        }
    </style>
    <style type="text/css">
        @page {
            /* size: A5; */
            /* width: 8.3in; */
            /* margin: 1.5em; */
        }

        ol {
            margin: 0;
            padding: 0;
        }

        table td,
        table th {
            padding: 0;
        }

        .c14 {
            border-right-style: solid;
            padding-top: 5pt;
            border-top-width: 0pt;
            border-bottom-color: null;
            border-right-width: 0pt;
            padding-left: 34pt;
            border-left-color: null;
            padding-bottom: 0pt;
            line-height: 1.4800000000000002;
            border-right-color: null;
            border-left-width: 0pt;
            border-top-style: solid;
            margin-left: 6pt;
            text-indent: -6pt;
            border-left-style: solid;
            border-bottom-width: 0pt;
            border-top-color: null;
            border-bottom-style: solid;
            orphans: 2;
            widows: 2;
            text-align: justify;
            padding-right: 0pt;
        }

        .c12 {
            border-right-style: solid;
            padding-top: 5pt;
            border-top-width: 0pt;
            border-bottom-color: null;
            border-right-width: 0pt;
            padding-left: 0pt;
            border-left-color: null;
            padding-bottom: 0pt;
            line-height: 1.4700000000000002;
            border-right-color: null;
            border-left-width: 0pt;
            border-top-style: solid;
            margin-left: 6pt;
            border-left-style: solid;
            border-bottom-width: 0pt;
            border-top-color: null;
            border-bottom-style: solid;
            orphans: 2;
            widows: 2;
            text-align: center;
            padding-right: 0pt;
        }

        .c3 {
            border-right-style: solid;
            padding-top: 7pt;
            border-top-width: 0pt;
            border-bottom-color: null;
            border-right-width: 0pt;
            padding-left: 5pt;
            border-left-color: null;
            padding-bottom: 0pt;
            line-height: 1.4700000000000002;
            border-right-color: null;
            border-left-width: 0pt;
            border-top-style: solid;
            border-left-style: solid;
            border-bottom-width: 0pt;
            border-top-color: null;
            border-bottom-style: solid;
            orphans: 2;
            widows: 2;
            text-align: justify;
            padding-right: 0pt;
            height: 11pt;
        }

        .c20 {
            border-right-style: solid;
            padding-top: 0pt;
            border-top-width: 0pt;
            border-bottom-color: null;
            border-right-width: 0pt;
            padding-left: 0pt;
            border-left-color: null;
            padding-bottom: 0pt;
            line-height: 1.4700000000000002;
            border-right-color: null;
            border-left-width: 0pt;
            border-top-style: solid;
            border-left-style: solid;
            border-bottom-width: 0pt;
            border-top-color: null;
            border-bottom-style: solid;
            orphans: 2;
            widows: 2;
            text-align: justify;
            padding-right: 0pt;
            height: 11pt;
        }

        .c10 {
            border-right-style: solid;
            padding-top: 5pt;
            border-top-width: 0pt;
            border-bottom-color: null;
            border-right-width: 0pt;
            padding-left: 0pt;
            border-left-color: null;
            padding-bottom: 0pt;
            line-height: 1;
            border-right-color: null;
            border-left-width: 0pt;
            border-top-style: solid;
            border-left-style: solid;
            border-bottom-width: 0pt;
            border-top-color: null;
            border-bottom-style: solid;
            orphans: 2;
            widows: 2;
            text-align: justify;
            padding-right: 0pt;
            height: 11pt;
        }

        .c23 {
            border-right-style: solid;
            padding-top: 0pt;
            border-top-width: 0pt;
            border-bottom-color: null;
            border-right-width: 0pt;
            padding-left: 5pt;
            border-left-color: null;
            padding-bottom: 0pt;
            line-height: 1.4700000000000002;
            border-right-color: null;
            border-left-width: 0pt;
            border-top-style: solid;
            margin-left: 36pt;
            border-left-style: solid;
            border-bottom-width: 0pt;
            border-top-color: null;
            border-bottom-style: solid;
            orphans: 2;
            widows: 2;
            text-align: justify;
            padding-right: 0pt;
        }

        .c7 {
            border-right-style: solid;
            padding-top: 5pt;
            border-top-width: 0pt;
            border-bottom-color: null;
            border-right-width: 0pt;
            padding-left: 0pt;
            border-left-color: null;
            padding-bottom: 0pt;
            line-height: 1.4700000000000002;
            border-right-color: null;
            border-left-width: 0pt;
            border-top-style: solid;
            margin-left: 6pt;
            border-left-style: solid;
            border-bottom-width: 0pt;
            border-top-color: null;
            border-bottom-style: solid;
            orphans: 2;
            widows: 2;
            text-align: justify;
            padding-right: 0pt;
        }

        .c17 {
            border-right-style: solid;
            padding-top: 0pt;
            border-top-width: 0pt;
            border-bottom-color: null;
            border-right-width: 0pt;
            padding-left: 5pt;
            border-left-color: null;
            padding-bottom: 0pt;
            line-height: 1.4700000000000002;
            border-right-color: null;
            border-left-width: 0pt;
            border-top-style: solid;
            margin-left: 36pt;
            /* text-indent: 36pt; */
            border-left-style: solid;
            border-bottom-width: 0pt;
            border-top-color: null;
            border-bottom-style: solid;
            orphans: 2;
            widows: 2;
            text-align: justify;
            padding-right: 0pt;
        }

        .c37 {
            border-right-style: solid;
            padding-top: 5pt;
            border-top-width: 0pt;
            border-bottom-color: null;
            border-right-width: 0pt;
            padding-left: 5pt;
            border-left-color: null;
            padding-bottom: 5pt;
            line-height: 1;
            border-right-color: null;
            border-left-width: 0pt;
            border-top-style: solid;
            border-left-style: solid;
            border-bottom-width: 0pt;
            border-top-color: null;
            border-bottom-style: solid;
            orphans: 2;
            widows: 2;
            text-align: justify;
            padding-right: 0pt;
        }

        .c32 {
            border-right-style: solid;
            padding-top: 0pt;
            border-top-width: 0pt;
            border-bottom-color: null;
            border-right-width: 0pt;
            padding-left: 8pt;
            border-left-color: null;
            padding-bottom: 0pt;
            line-height: 1.4800000000000002;
            border-right-color: null;
            border-left-width: 0pt;
            border-top-style: solid;
            border-left-style: solid;
            border-bottom-width: 0pt;
            border-top-color: null;
            border-bottom-style: solid;
            orphans: 2;
            widows: 2;
            text-align: justify;
            padding-right: 0pt;
        }

        .c18 {
            border-right-style: solid;
            padding-top: 5pt;
            border-top-width: 0pt;
            border-bottom-color: null;
            border-right-width: 0pt;
            padding-left: 10pt;
            border-left-color: null;
            padding-bottom: 0pt;
            line-height: 1.4700000000000002;
            border-right-color: null;
            border-left-width: 0pt;
            border-top-style: solid;
            border-left-style: solid;
            border-bottom-width: 0pt;
            border-top-color: null;
            border-bottom-style: solid;
            orphans: 2;
            widows: 2;
            text-align: justify;
            padding-right: 0pt;
            margin: 0;
        }

        .c28 {
            border-right-style: solid;
            padding-top: 1pt;
            border-top-width: 0pt;
            border-bottom-color: null;
            border-right-width: 0pt;
            padding-left: 5pt;
            border-left-color: null;
            padding-bottom: 0pt;
            line-height: 1;
            border-right-color: null;
            border-left-width: 0pt;
            border-top-style: solid;
            border-left-style: solid;
            border-bottom-width: 0pt;
            border-top-color: null;
            border-bottom-style: solid;
            orphans: 2;
            widows: 2;
            text-align: justify;
            padding-right: 0pt;
        }

        .c22 {
            border-right-style: solid;
            padding-top: 5pt;
            border-top-width: 0pt;
            border-bottom-color: null;
            border-right-width: 0pt;
            padding-left: 5pt;
            border-left-color: null;
            padding-bottom: 0pt;
            line-height: 1.4700000000000002;
            border-right-color: null;
            border-left-width: 0pt;
            border-top-style: solid;
            border-left-style: solid;
            border-bottom-width: 0pt;
            border-top-color: null;
            border-bottom-style: solid;
            orphans: 2;
            widows: 2;
            text-align: justify;
            padding-right: 0pt;
        }

        .c19 {
            border-right-style: solid;
            padding-top: 7pt;
            border-top-width: 0pt;
            border-bottom-color: null;
            border-right-width: 0pt;
            padding-left: 5pt;
            border-left-color: null;
            padding-bottom: 0pt;
            line-height: 1.4700000000000002;
            border-right-color: null;
            border-left-width: 0pt;
            border-top-style: solid;
            border-left-style: solid;
            border-bottom-width: 0pt;
            border-top-color: null;
            border-bottom-style: solid;
            orphans: 2;
            widows: 2;
            text-align: justify;
            padding-right: 0pt;
        }

        .c34 {
            border-right-style: solid;
            padding-top: 0pt;
            border-top-width: 0pt;
            border-bottom-color: null;
            border-right-width: 0pt;
            padding-left: 5pt;
            border-left-color: null;
            padding-bottom: 0pt;
            line-height: 1;
            border-right-color: null;
            border-left-width: 0pt;
            border-top-style: solid;
            border-left-style: solid;
            border-bottom-width: 0pt;
            border-top-color: null;
            border-bottom-style: solid;
            orphans: 2;
            widows: 2;
            text-align: justify;
            padding-right: 0pt;
        }

        .c42 {
            border-right-style: solid;
            padding-top: 5pt;
            border-top-width: 0pt;
            border-bottom-color: null;
            border-right-width: 0pt;
            padding-left: 54pt;
            border-left-color: null;
            padding-bottom: 0pt;
            line-height: 1;
            border-right-color: null;
            border-left-width: 0pt;
            border-top-style: solid;
            border-left-style: solid;
            border-bottom-width: 0pt;
            border-top-color: null;
            border-bottom-style: solid;
            orphans: 2;
            widows: 2;
            text-align: justify;
            padding-right: 0pt;
        }

        .c11 {
            border-right-style: solid;
            padding-top: 0pt;
            border-top-width: 0pt;
            border-bottom-color: null;
            border-right-width: 0pt;
            padding-left: 5pt;
            border-left-color: null;
            padding-bottom: 0pt;
            line-height: 1.4800000000000002;
            border-right-color: null;
            border-left-width: 0pt;
            border-top-style: solid;
            border-left-style: solid;
            border-bottom-width: 0pt;
            border-top-color: null;
            border-bottom-style: solid;
            orphans: 2;
            widows: 2;
            text-align: justify;
            padding-right: 0pt;
        }

        .c39 {
            border-right-style: solid;
            padding-top: 0pt;
            border-top-width: 0pt;
            border-bottom-color: null;
            border-right-width: 0pt;
            padding-left: 5pt;
            border-left-color: null;
            padding-bottom: 0pt;
            line-height: 1.4700000000000002;
            border-right-color: null;
            border-left-width: 0pt;
            border-top-style: solid;
            border-left-style: solid;
            border-bottom-width: 0pt;
            border-top-color: null;
            border-bottom-style: solid;
            orphans: 2;
            widows: 2;
            text-align: justify;
            padding-right: 0pt;
        }

        .c8 {
            border-right-style: solid;
            border-bottom-color: #545454;
            border-top-width: 1pt;
            border-right-width: 1pt;
            border-left-color: #545454;
            vertical-align: top;
            border-right-color: #545454;
            border-left-width: 1pt;
            border-top-style: solid;
            border-left-style: solid;
            border-bottom-width: 1pt;
            /* width: 50.2pt; */
            width: 11%;
            border-top-color: #545454;
            border-bottom-style: solid;
        }

        .c1 {
            border-right-style: solid;
            border-bottom-color: #545454;
            border-top-width: 1pt;
            border-right-width: 1pt;
            border-left-color: #545454;
            vertical-align: top;
            border-right-color: #545454;
            border-left-width: 0pt;
            border-top-style: solid;
            border-left-style: solid;
            border-bottom-width: 1pt;
            /* width: 338.2pt; */
            border-top-color: #545454;
            border-bottom-style: solid;
            border-bottom: 0pt;
        }

        .c13 {
            border-right-style: solid;
            border-bottom-color: #ffffff;
            border-top-width: 1pt;
            border-right-width: 1pt;
            border-left-color: #545454;
            vertical-align: top;
            border-right-color: #545454;
            border-left-width: 0pt;
            border-top-style: solid;
            border-left-style: solid;
            border-bottom-width: 0pt;
            width: 338.2pt;
            border-top-color: #545454;
            border-bottom-style: solid;
        }

        .c21 {
            border-right-style: solid;
            border-bottom-color: #545454;
            border-top-width: 1pt;
            border-right-width: 1pt;
            border-left-color: #545454;
            vertical-align: top;
            border-right-color: #545454;
            border-left-width: 1pt;
            border-top-style: solid;
            border-left-style: solid;
            border-bottom-width: 1pt;
            /* width: 338.2pt; */
            width: 55%;
            border-top-color: #545454;
            border-bottom-style: solid;
        }

        .c36 {
            border-right-style: solid;
            border-bottom-color: #545454;
            border-top-width: 1pt;
            border-right-width: 0pt;
            border-left-color: #545454;
            vertical-align: top;
            border-right-color: #545454;
            border-left-width: 1pt;
            border-top-style: solid;
            border-left-style: solid;
            border-bottom-width: 1pt;
            /* width: 144pt; */
            border-top-color: #545454;
            border-bottom-style: solid;
        }

        .c16 {
            border-right-style: solid;
            border-bottom-color: #545454;
            border-top-width: 1pt;
            border-right-width: 1pt;
            border-left-color: #545454;
            vertical-align: top;
            border-right-color: #545454;
            border-left-width: 1pt;
            border-top-style: solid;
            border-left-style: solid;
            border-bottom-width: 1pt;
            /* width: 144pt; */
            border-top-color: #545454;
            border-bottom-style: solid;
        }

        .c25 {
            border-right-style: solid;
            border-bottom-color: #545454;
            border-top-width: 1pt;
            border-right-width: 1pt;
            border-left-color: #545454;
            vertical-align: top;
            border-right-color: #545454;
            border-left-width: 1pt;
            border-top-style: solid;
            border-left-style: solid;
            border-bottom-width: 1pt;
            /* width: 98.2pt; */
            width: 17%;
            border-top-color: #545454;
            border-bottom-style: solid;
        }

        .c9 {
            border-right-style: solid;
            border-bottom-color: #545454;
            border-top-width: 1pt;
            border-right-width: 1pt;
            border-left-color: #545454;
            vertical-align: top;
            border-right-color: #545454;
            border-left-width: 1pt;
            border-top-style: solid;
            border-left-style: solid;
            border-bottom-width: 1pt;
            /* width: 93.8pt; */
            width: 17%;
            border-top-color: #545454;
            border-bottom-style: solid;
        }

        .c15 {
            border-right-style: solid;
            border-bottom-color: #545454;
            border-top-width: 1pt;
            border-right-width: 1pt;
            border-left-color: #545454;
            vertical-align: top;
            border-right-color: #545454;
            border-left-width: 0pt;
            border-top-style: solid;
            border-left-style: solid;
            border-bottom-width: 1pt;
            width: 93.8pt;
            border-top-color: #545454;
            border-bottom-style: solid;
        }

        .c40 {
            margin-left: 292pt;
            padding-top: 4pt;
            padding-bottom: 0pt;
            line-height: 1.4700000000000002;
            orphans: 2;
            widows: 2;
            text-align: justify;
            margin-right: 57pt;
        }

        .c2 {
            color: #000000;
            font-weight: 700;
            text-decoration: none;
            vertical-align: baseline;
            font-size: 9pt;
            font-family: "Arial";
            font-style: normal;
        }

        .c0 {
            color: #000000;
            font-weight: 400;
            text-decoration: none;
            vertical-align: baseline;
            font-size: 9pt;
            font-family: "Arial";
            font-style: normal;
        }

        .c30 {
            color: #000000;
            font-weight: 400;
            text-decoration: none;
            vertical-align: baseline;
            font-size: 14.5pt;
            font-family: "Arial";
            font-style: normal;
        }

        .c26 {
            color: #000000;
            text-decoration: none;
            vertical-align: baseline;
            font-size: 19pt;
            font-family: "Arial";
            font-style: normal;
        }

        .c31 {
            padding-top: 0pt;
            padding-bottom: 0pt;
            line-height: 1.15;
            orphans: 2;
            widows: 2;
            text-align: left;
        }

        .c38 {
            border-spacing: 0;
            border-collapse: collapse;
            margin-right: auto;
            width: 100%;
            table-layout: fixed;
        }

        .c29 {
            background-color: #ffffff;
            /* max-width: 580.9pt; */
            padding: 7.2pt 7.2pt 7.2pt 7.2pt;
            /* border: 1pt solid; */
            /* min-width: 8.3in; */
        }

        .c24 {
            height: 11pt;
        }

        .c5 {
            font-size: 9pt;
        }

        .c41 {
            font-size: 18pt;
        }

        .c27 {
            background-color: #f4f4f4;
        }

        .c35 {
            font-weight: 400;
        }

        .c4 {
            height: 23.2pt;
        }

        .c6 {
            font-weight: 700;
        }

        .c33 {
            font-size: 30pt;
        }

        .title {
            padding-top: 0pt;
            color: #000000;
            font-size: 26pt;
            padding-bottom: 3pt;
            font-family: "Arial";
            line-height: 1.15;
            page-break-after: avoid;
            orphans: 2;
            widows: 2;
            text-align: left;
        }

        .subtitle {
            padding-top: 0pt;
            color: #666666;
            font-size: 15pt;
            padding-bottom: 16pt;
            font-family: "Arial";
            line-height: 1.15;
            page-break-after: avoid;
            orphans: 2;
            widows: 2;
            text-align: left;
        }

        li {
            color: #000000;
            font-size: 9pt;
            font-family: "Arial";
        }

        p {
            margin: 0;
            color: #000000;
            font-size: 9pt;
            font-family: "Arial";
        }

        h1 {
            padding-top: 20pt;
            color: #000000;
            font-size: 20pt;
            padding-bottom: 6pt;
            font-family: "Arial";
            line-height: 1.15;
            page-break-after: avoid;
            orphans: 2;
            widows: 2;
            text-align: left;
        }

        h2 {
            padding-top: 18pt;
            color: #000000;
            font-size: 16pt;
            padding-bottom: 6pt;
            font-family: "Arial";
            line-height: 1.15;
            page-break-after: avoid;
            orphans: 2;
            widows: 2;
            text-align: left;
        }

        h3 {
            padding-top: 16pt;
            color: #434343;
            font-size: 14pt;
            padding-bottom: 4pt;
            font-family: "Arial";
            line-height: 1.15;
            page-break-after: avoid;
            orphans: 2;
            widows: 2;
            text-align: left;
        }

        h4 {
            padding-top: 14pt;
            color: #666666;
            font-size: 12pt;
            padding-bottom: 4pt;
            font-family: "Arial";
            line-height: 1.15;
            page-break-after: avoid;
            orphans: 2;
            widows: 2;
            text-align: left;
        }

        h5 {
            padding-top: 12pt;
            color: #666666;
            font-size: 9pt;
            padding-bottom: 4pt;
            font-family: "Arial";
            line-height: 1.15;
            page-break-after: avoid;
            orphans: 2;
            widows: 2;
            text-align: left;
        }

        h6 {
            padding-top: 12pt;
            color: #666666;
            font-size: 9pt;
            padding-bottom: 4pt;
            font-family: "Arial";
            line-height: 1.15;
            page-break-after: avoid;
            font-style: italic;
            orphans: 2;
            widows: 2;
            text-align: left;
        }

        /* .position-relative {
        position: relative;
      }

      .position-absolute {
        position: absolute;
      }

      .right-0 {
        right: 0;
      } */
        .invc-det .colon-td {
            width: 5%;
        }

        .invc-det .titles-td {
            width: 40%;
        }

        .prnt-det .colon-td {
            width: 5%;
        }

        .prnt-det .titles-td {
            width: 50%;
        }

        .w-100 {
            width: 100%;
        }

        .text-right {
            text-align: right !important;
        }

        .double-border{
            border-bottom: 1pt solid; border-top: 1pt solid; padding-bottom: 2pt;
            border-right: 0pt; border-left: 0pt;
        }
    </style>
    <style>
        .job-thead td{
            background-color: #f4f4f4;
        }
        @media  print{
            .job-thead td{
                background-color: #f4f4f4 !important;
            }
        }
    </style>
    @if ($isPrint)
        <script>
            function doPrint() {
                window.onafterprint = function () {
                    @if(!$noautoclose)
                    window.close();
                    @endif
                }
                window.print();
            }
        </script>
    @else
    <script>
        function doPrint() {

        }
    </script>

    @endif
</head>

<body class="c29" onload="doPrint()">
    <div class="row">
        <div class="col-xs-8">
            <p class="c37 position-relative">
                <span class="c41">{{$bz['business-name']}}</span>
            </p>
            <p class="c28 position-relative">
                <span class="c5">{{$bz['business-address']['line1']}}</span>
            </p>
            <p class="c22"><span class="c0">{{$bz['business-address']['city']}},{{$bz['business-address']['state']}},{{$bz['business-address']['pin']}}</span></p>
            <p class="c11"><span class="c0">{{join(", ",$bz['business-phones'])}} </span></p>
            <p class="c11"><span class="c5">{{join(", ",$bz['business-emails'])}} </span></p>
        </div>
        <div class="col-xs-4 float-right-x ">
            <p class="c37 text-right">
                <span class="c6 c33">INVOICE</span>
            </p>
            <p class="c28 text-right">
                <span class="c6 c26">#{{ $invoice->slno_gen }}</span>
            </p>
        </div>
        <div class="col-xs-12">
            <hr class="double-border" />

        </div>
    </div>
    <p class="c20"><span class="c2"></span></p>
    <div class="row">
        <div class="col-xs-6">
            <h2 class="c39" id="h.i5vwi2sa0zvh">
                <span class="c2">Bill To</span>
            </h2>
            <h2 class="c17" id="h.6bykafbdre1n">
                <span class="c0">
                   <span>{{$client->full_name}}</span> <br>
                    {{-- [Client Address line 1] <br>
                    [City], [State] [Postal code] <br>
                    [Contact No],[Mail ID] <br> --}}
                </span>
            </h2>
        </div>
        <div class="col-xs-6">
            <table class="w-100 invc-det">
                <tr>
                    <td class="text-right titles-td c5 c6">Invoice Number</td>
                    <td class="text-center colon-td">:</td>
                    <td class="text-left values-td"><span class="c0">{{ $invoice->slno_gen }}</span></td>
                </tr>
                <tr>
                    <td class="text-right titles-td c5 c6">Date</td>
                    <td class="text-center colon-td">:</td>
                    <td class="text-left values-td"><span class="c0">{{ $invoice->generated_at->format('d-M-Y') }}</span></td>
                </tr>
                <tr>
                    <td class="text-right titles-td c5 c6">Due Date</td>
                    <td class="text-center colon-td">:</td>
                    <td class="text-left values-td"><span class="c0"></span></td>
                </tr>
                <tr>
                    <td class="text-right titles-td c5 c6">File No</td>
                    <td class="text-center colon-td">:</td>
                    <td class="text-left values-td"><span class="c0"></span></td>
                </tr>
                <tr>
                    <td class="text-right titles-td c5 c6">PAN No</td>
                    <td class="text-center colon-td">:</td>
                    <td class="text-left values-td"><span class="c0"></span></td>
                </tr>
                <tr>
                    <td class="text-right titles-td c5 c6">Reference</td>
                    <td class="text-center colon-td">:</td>
                    <td class="text-left values-td"><span class="c0"></span></td>
                </tr>
                <tr>
                    <td class="text-right titles-td c5 c6">Ref. Contact No</td>
                    <td class="text-center colon-td">:</td>
                    <td class="text-left values-td"><span class="c0"></span></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">

            <p class="c20"><span class="c0"></span></p>
            <p class="c20"><span class="c0"></span></p>
            <a id="t.6a5939abb7dd4a8620f1190b016cf9488877fc13"></a><a id="t.0"></a>
            <table class="c38">
                <tbody>
                    <tr class="c4 job-thead">
                        <td class="c21 c27" colspan="1" rowspan="1">
                            <p class="c7"><span class="c2">Description</span></p>
                        </td>
                        <td class="c8 c27" colspan="1" rowspan="1">
                            <p class="c12"><span class="c2">Quantity</span></p>
                        </td>
                        <td class="c9 c27" colspan="1" rowspan="1">
                            <p class="c7"><span class="c2">Fees</span></p>
                        </td>
                        <td class="c25 c27" colspan="1" rowspan="1">
                            <p class="c7"><span class="c2">Amount</span></p>
                        </td>
                    </tr>
                    @foreach ($invoice->Jobs as $item)

                    <tr class="c4">
                        <td class="c21" colspan="1" rowspan="1">
                            <p class="c7"><span class="c0">{{$item->job_title}}</span></p>
                        </td>
                        <td class="c8" colspan="1" rowspan="1">
                            <p class="c12"><span class="c0">1</span></p>
                        </td>
                        <td class="c9" colspan="1" rowspan="1">
                            <p class="c7"><span class="c0">{{$item->price_f}}</span></p>
                        </td>
                        <td class="c25" colspan="1" rowspan="1">
                            <p class="c7"><span class="c0">{{$item->price_f}}</span></p>
                        </td>
                    </tr>
                    @endforeach
                    <!--
                        <tr class="c4">
                            <td class="c21" colspan="1" rowspan="1">
                                <p class="c7"><span class="c0">Service 1</span></p>
                            </td>
                            <td class="c8" colspan="1" rowspan="1">
                                <p class="c12"><span class="c0">1</span></p>
                            </td>
                            <td class="c9" colspan="1" rowspan="1">
                                <p class="c7"><span class="c0">Rs. 1,000</span></p>
                            </td>
                            <td class="c25" colspan="1" rowspan="1">
                                <p class="c7"><span class="c0">Rs. 1,000</span></p>
                            </td>
                        </tr>
                        <tr class="c4">
                            <td class="c21" colspan="1" rowspan="1">
                                <p class="c7"><span class="c0">Service 2</span></p>
                            </td>
                            <td class="c8" colspan="1" rowspan="1">
                                <p class="c12"><span class="c0">1</span></p>
                            </td>
                            <td class="c9" colspan="1" rowspan="1">
                                <p class="c7"><span class="c0">Rs. 10,000</span></p>
                            </td>
                            <td class="c25" colspan="1" rowspan="1">
                                <p class="c7"><span class="c0">Rs. 10,000</span></p>
                            </td>
                        </tr>
                    -->
                </tbody>
                <tbody>
                    <tr class="c4">
                        <td class="c1" colspan="2" rowspan="5">
                            <p class="c7 c24"><span class="c0"></span></p>
                        </td>
                        <td class="c36" colspan="1" rowspan="1">
                            <span class="c18" id="h.jmbptwio72ub">
                                <span class="c5 c6">&nbsp; Subtotal </span>
                            </span>
                        </td>
                        <td class="c25" colspan="1" rowspan="1">
                            <p class="c7"><span class="c0">{{$invoice->job_total_amount_f}}</span></p>
                        </td>
                    </tr>
                    <tr class="c4">
                        <td class="c16" colspan="1" rowspan="1">
                            <span class="c18" id="h.35hyw3af8rns">
                                <span class="c5 c6">&nbsp; Discount </span>
                            </span>
                        </td>
                        <td class="c25" colspan="1" rowspan="1">
                            <p class="c7"><span class="c0">{{$invoice->discount_amount_f}}</span></p>
                        </td>
                    </tr>
                    <tr class="c4">
                        <td class="c16" colspan="1" rowspan="1">
                            <span class="c18" id="h.apvyp55c2n5i">
                                <span class="c2">&nbsp; Total </span>
                            </span>
                        </td>
                        <td class="c25" colspan="1" rowspan="1">
                            <p class="c7"><span class="c0">{{$invoice->invoice_amount_f}}</span></p>
                        </td>
                    </tr>
                    <tr class="c4">
                        <td class="c16" colspan="1" rowspan="1">
                            <h2 class="c18" id="h.7gn2ilnkhfbw">
                                <span class="c2">&nbsp; Paid Amount</span>
                            </h2>
                        </td>
                        <td class="c25" colspan="1" rowspan="1">
                            <p class="c7"><span class="c0">{{$invoice->paid_amount_f}}</span></p>
                        </td>
                    </tr>
                    <tr class="c4">
                        <td class="c16" colspan="1" rowspan="1">
                            <span class="c18" id="h.ms7l5rig918n">
                                <span class="c2">&nbsp; Balance Due</span>
                            </span>
                        </td>
                        <td class="c25" colspan="1" rowspan="1">
                            <p class="c7"><span class="c0">{{$invoice->due_amount_f}}</span></p>
                        </td>
                    </tr>
                </tbody>
                <tbody>
                    <tr>
                        <td colspan="4"><br><br></td>
                    </tr>
                    <tr>
                        <td colspan="4"></td>
                    </tr>
                    <tr>
                        <td colspan="4"></td>
                    </tr>
                    <tr>
                        <td >
                            <p class="c19"><span class="c0">Terms and Conditions :</span></p>
                        </td>
                        <td colspan="3">

                            <table class="prnt-det W-100">
                                <tr>
                                    <td class="text-right titles-td c5 c6">Invoice Generated By</td>
                                    <td class="text-center colon-td">:</td>
                                    <td class="text-left values-td"><span class="c0">{{ $generatedBy->full_name}} ( {{$user->user_type_name}} )</span></td>
                                </tr>
                                <tr>
                                    <td class="text-right titles-td c5 c6">Invoice Printed By</td>
                                    <td class="text-center colon-td">:</td>
                                    <td class="text-left values-td"><span class="c0">{{ $user->full_name}} ( {{$user->user_type_name}} )</span></td>
                                </tr>
                                <!--
                                    <tr>
                                        <td class="text-right titles-td c5 c6">Payment Received By</td>
                                        <td class="text-center colon-td">:</td>
                                        <td class="text-left values-td"><span class="c0">Value</span></td>
                                    </tr>
                                -->
                                <tr>
                                    <td class="text-right titles-td c5 c6">Time</td>
                                    <td class="text-center colon-td">:</td>
                                    <td class="text-left values-td"><span class="c0">{{ now()->format('d-M-Y h:i:s a') }}</span></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p class="c3"><span class="c0"></span></p>
        </div>
    </div>
    <!--
        <table class="w-100">
            <tr>
                <td style="width:40%;">
                    <p class="c19"><span class="c0">Terms and Conditions :</span></p>
                </td>
                <td style="width: 60%;">

                    <table class="prnt-det">
                        <tr>
                            <td class="text-right titles-td c5 c6">Invoice Generated By</td>
                            <td class="text-center colon-td">:</td>
                            <td class="text-left values-td"><span class="c0">Value</span></td>
                        </tr>
                        <tr>
                            <td class="text-right titles-td c5 c6">Payment Received By</td>
                            <td class="text-center colon-td">:</td>
                            <td class="text-left values-td"><span class="c0">Value</span></td>
                        </tr>
                        <tr>
                            <td class="text-right titles-td c5 c6">Time</td>
                            <td class="text-center colon-td">:</td>
                            <td class="text-left values-td"><span class="c0">Value</span></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <div class="row">
            <div class="col-xs-6">
                <p class="c19"><span class="c0">Terms and Conditions :</span></p>
            </div>
            <div class="col-xs-6">
                <table class="prnt-det">
                    <tr>
                        <td class="text-right titles-td c5 c6">Invoice Generated By</td>
                        <td class="text-center colon-td">:</td>
                        <td class="text-left values-td"><span class="c0">Value</span></td>
                    </tr>
                    <tr>
                        <td class="text-right titles-td c5 c6">Payment Received By</td>
                        <td class="text-center colon-td">:</td>
                        <td class="text-left values-td"><span class="c0">Value</span></td>
                    </tr>
                    <tr>
                        <td class="text-right titles-td c5 c6">Time</td>
                        <td class="text-center colon-td">:</td>
                        <td class="text-left values-td"><span class="c0">Value</span></td>
                    </tr>
                </table>
                <p class="c3"><span class="c0"></span></p>
            </div>
        </div>
    -->

</body>

</html>
