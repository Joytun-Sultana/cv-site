<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Preview</title>
    <style>
        @page {
            margin: 0mm;
        }
        
        body {
            font-family: 'Inria Serif', serif ;
            line-height: 1.6;
        }

        .cv-container {
            background-color: #ffffff
        }

        .cv-header {
            text-align: center;
            vertical-align: middle;
            background-color: rgb(245, 90, 240); 
            color: rgb(74, 2, 71);
            height: 200px;
            margin: 0;
            padding: 0;
            line-height: 2.8;
            
        }
        
        .cv-header h1, .cv-header h2, .cv-header p {
            margin: 0;
            padding: 0;
        }


        .inline-list li {
            display: inline;
            margin-right: 30px;
        }

        .cv-name {
            font-size: 3em;
            font-weight: bold;
        }

        .cv-body {
            padding-top: 25px;
            display: flex;
            justify-content: space-between;
            background-color: #fda1f1;
        }
        .cv-left{
            background: linear-gradient(to right, #b1b2b3,  #ededef );
            /* height: 914px; */
            padding-left: 60px;
        }
        .cv-right{
            padding-right: 30px;
        }

        .cv-section b{
            color: rgb(74, 2, 71);

        }
        .cv-section h2 {
            font-size: 1.8em;
            color: rgb(74, 2, 71);
            border-bottom: 2px solid rgb(74, 2, 71);
            padding-bottom: 5px;
            margin-bottom: 10px; 
            width: 250px;
        }

        .cv-section p, .cv-section ul {
            margin: 0 0 0px;
            padding: 0;
        }

        .cv-section ul {
            padding-left: 20px;
        }
        .page-break {
            page-break-before: always;
        }

    </style>

    {{-- <link rel="stylesheet" href="{{ asset('css/cv-style.css') }}"> --}}
</head>
<body>
    @include('pdf-body')
</body>
</html>
