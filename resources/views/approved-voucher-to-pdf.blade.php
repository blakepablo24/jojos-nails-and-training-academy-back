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
    <img src="{{ public_path('storage/images/front-page-images/jojos-nails-logo-drkr1.png') }}" width="200px" height="200px">
    <div style="width: 90%; margin-left: 5%; border-radius: 15px; font-size: 1.35rem; border: solid #B5CDA3 3px; background: whitesmoke;">
        <h3 style="border-bottom: #a3805a solid 1px; width: 90%; margin-left: 5%; border-radius: 15px;">JOJO'S NAIL AND BEAUTY TRAINING ACADEMY GIFT VOUCHER</h3>
        <h4>To: {{$to}}</h4>
        <h4>From: {{$from}}</h4>
        <h4>Message: {{$message}}</h4>
        <h4>Value: {{$value}}</h4>
        <h4>Voucher: {{$voucher_code}}</h4>
        <p>To redeem: Present either this printed voucher or show on your phone.</p>
        <p>Voucher Expiry Date: 2 years from purchase date</p>
    </div>
</body>
</html>