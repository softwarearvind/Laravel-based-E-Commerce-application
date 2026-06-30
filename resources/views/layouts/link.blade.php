<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Store</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f4f6f9;
        }

        .navbar{
            background:#0d6efd;
        }

        .navbar-brand,
        .nav-link{
            color:white !important;
            font-weight:500;
        }

        .hero{
            background:linear-gradient(to right,#0d6efd,#6610f2);
            color:white;
            padding:70px 0;
            text-align:center;
            margin-bottom:40px;
        }

        .card{
            border:none;
            border-radius:15px;
            overflow:hidden;
            transition:.3s;
        }

        .card:hover{
            transform:translateY(-8px);
            box-shadow:0 10px 20px rgba(0,0,0,.2);
        }

        .card img{
            height:230px;
            object-fit:cover;
        }

        .price{
            color:#198754;
            font-size:22px;
            font-weight:bold;
        }

        .old-price{
            color:red;
            text-decoration:line-through;
        }

        .footer{
            background:#212529;
            color:white;
            padding:20px;
            margin-top:60px;
        }

        .badge-stock{
            position:absolute;
            top:10px;
            right:10px;
        }
    </style>

</head>
