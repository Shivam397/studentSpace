<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .card-section{
            width:100%;
            height:300px;
            background-color:#B6C5E7;
        }

        .both-cards{
            padding-top:40px;
            display: flex;
            justify-content: space-between;
            max-width: 1200px;
            margin: auto;
        }

        .both-cards .address, .campus-tour iframe, .map{
            border-radius:8px ;
            width: 300px;
            height: 200px;
        }

        .both-cards .address, .map{
            background-color:#19386B;
            border-top: 4px solid #19386B;
        }

        .address h2,h3,h6{
            text-align: center;
            color: white;
        }

        .address h3{
          padding-bottom:20px;
        }

        .map h2,h3,h5{
            text-align: center;
            color: white;
        }

        .map h3{
          padding-bottom:20px;
        }

        .map h5 a{
            color:white;
            text-decoration: none;
            text-transform: capitalize;
        }

        @media (min-width:900px) and (max-width:1200px){
            .both-cards{
                max-width:850px;
                margin:auto;
                padding-top:40px;
                display: flex;
                justify-content: space-between;
            }

            .both-cards .address, .campus-tour iframe, .map{
                border-radius:8px ;
                width: 250px;
                height: 200px;
            }
        }

        @media (min-width:600px) and (max-width:900px){
            .both-cards{
                max-width:580px;
                margin:auto;
                padding-top:40px;
                display: flex;
                justify-content: space-between;
            }

            .both-cards .address, .campus-tour iframe, .map{
                border-radius:5px ;
                width: 150px;
                height: 200px;
            }

            .address h2,h3{
                font-size: 20px;
            }

            .address h6{
                font-weight:300px;
                font-size:15px;
            }
        }

        @media (min-width:0) and (max-width:600px){
            .card-section{
                width:100%;
                height:700px;
                background-color: #d9dddc;
            }

            .both-cards{
                max-width:580px;
                margin: 20px auto;
                padding-top:40px;
                display: block;
            }

            .both-cards .address, .campus-tour, .map{
                border-radius:8px ;
                width: 300px;
                height: 200px;
                margin: 10px auto;
            }

        }


    </style>
</head>
<body>
    <section class="card-section">
        <div class="both-cards">
            <div class="address">
                <h2><i class="fas fa-map-marker-alt"></i></h2>
                <h3>Address</h3>
                <h6>Banasthali Vidyapith
                    P.O. Banasthali Vidyapith-304022 (Rajasthan)
                </h6>
            </div>

            <div class="campus-tour">
                <iframe width="300" height="200"
                    src="https://www.youtube.com/embed/E-BIaJc7pq0">
                </iframe>
            </div>
    
            <div class="map">
                <h2><i class="fas fa-map-marked-alt"></i></h2>
                <h3>Map</h3>
                <h5><a href="https://www.google.com/maps/place/Banasthali+University/@26.4026987,75.8728704,17z/data=!3m1!4b1!4m5!3m4!1s0x3bbfc0c282ffffff:0x4776f298b0f0587e!8m2!3d26.4026939!4d75.8750644" target="_blank">View Map</a></h3>
            </div>
        </div>
    </section>
</body>
</html>