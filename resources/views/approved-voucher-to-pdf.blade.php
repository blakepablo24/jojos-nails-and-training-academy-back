<html>
<body style="
    font-size: 1.15rem;
    color: #a3805a;
    text-align: center;
    border: solid 1px #a3805a;
    margin: 0;
    padding: 0 2.5%;
    border-radius: 15px;
">
    
    <div style="
        height: 90%; 
        margin-top: 5%; 
        width: 95%; 
        margin-left: 2.5%; 
        border-radius: 15px; 
        font-size: 1.35rem; 
        border: solid #B5CDA3 3px;
        opacity: 0.45;
        background: rgb(181, 205, 163, 0.35);
        background: url({{ public_path('storage/images/front-page-images/jojos-nails-logo-drkr1.png') }});
        background-repeat: no-repeat;
        background-size: 50%;
        background-position: center;
        ">
        <h3 style="opacity: none; height: 10%; border-bottom: #a3805a solid 1px; width: 90%; margin-left: 5%; border-radius: 15px; opacity: 0.95;">JOJO'S NAIL AND BEAUTY TRAINING ACADEMY GIFT VOUCHER</h3>
    <table style="height: 75%; width: 100%; padding-left: 2.5%;">
    <tbody>
        <tr>
            <th colspan='1'><h2>To: </h2></th>
            <th colspan='1'><h2>{{$to}}</h2></th>
            <th colspan='1'><h2>From:</h2></th>
            <th colspan='1'><h2>{{$from}}</h2></th>
        </tr>
        <tr>
            <th colspan='4'><h2>Message: {{$message}}</h2></th>
        </tr>
        <tr>
            <th colspan='2'><h2>Value: £{{$value}}</h2></th>
            <th colspan='2'><h2>Voucher: {{$voucher_code}}</h2></th>
        </tr>
        <tr>
            <th colspan='4'><h3>To redeem: Present either this printed voucher or show on your phone.</h3></th>
        </tr>
        <tr>
            <th colspan='4'><h3>Voucher Expiry Date: {{$expiry_date}}</h3></th>
        </tr>
    </tbody>
</table>
        
    </div>
</body>
</html>