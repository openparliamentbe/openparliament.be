<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>OpenParliament.be</title>

    <style>
        body {
            margin: 15% 1em;
            background-color: #f5f4f2;
            font-family: Helvetica, sans-serif;
            line-height: 1.2;
            font-weight: normal;
            font-weight: 300;
            text-align: center;
            color: #333;
        }
        @media screen and (min-width: 40em) {
            body {font-size: 2em;}
        }
        @media screen and (min-width: 60em) {
            body {
                max-width: 600px;
                margin-left: auto;
                margin-right: auto;
            }
        }
        html:before {
            content: '';
            display: block;
            box-shadow: rgba(0,0,0,.2) 0 1px 5px;
            height: 8px;
            background: linear-gradient(
                to right,
                #000,
                #000 33%,
                #ffe936 33%,
                #ffe936 66%,
                #ff0f21 66%,
                #ff0f21
            );
        }
        h1 {
            font-weight: normal;
            font-weight: 300;
            margin-bottom: 0;
        }
        p {margin-top: .5em;}
        p:first-letter {text-transform: lowercase;}
    </style>
</head>
<body>
    <h1>OpenParliament.be</h1>
    <p>A small experiment about open data and the Belgian parliaments</p>
</body>
</html>
