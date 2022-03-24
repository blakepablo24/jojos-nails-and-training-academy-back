<html>
<body style="
    font-size: 1.15rem;
    color: #a3805a;
    text-align: center;
    border: solid 1px #a3805a;
    margin: 0;
    padding: 0;
    border-radius: 15px;
">
    <img src="{{ public_path('storage/images/front-page-images/jojos-nails-logo-drkr1.png') }}" width="100px" height="100px">
    <div style="width: 90%; margin-left: 5%; border-radius: 15px; font-size: 1.35rem; border: solid #B5CDA3 3px; background: whitesmoke;">
        <h3 style="border-bottom: #a3805a solid 1px; width: 90%; margin-left: 5%; border-radius: 15px;">JOJO'S NAIL AND BEAUTY TRAINING ACADEMY GIFT VOUCHER</h3>
    <table 
    cellpadding='1' 
    cellspacing='0' 
    border='0'
    style="
        width: 95%;
    "
    >

    <tbody>
        <tr style="width: 90%; margin-left: 5%;">
            <td colspan='1'><h2>To: </h2></td>
            <td colspan='1'><h2>{{$to}}</h2></td>
            <td colspan='1'><h2>From:</h2></td>
            <td colspan='1'><h2>{{$from}}</h2></td>
        </tr>
        <tr style="margin-top: 5px">
            <th colspan='4'><h2>Message: {{$message}}</h2></th>
        </tr>
        <tr style="width: 90%; margin-left: 5%;">
            <td colspan='2'><h2>Value: £{{$value}}</h2></td>
            <td colspan='2'><h2>Voucher: {{$voucher_code}}</h2></td>
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