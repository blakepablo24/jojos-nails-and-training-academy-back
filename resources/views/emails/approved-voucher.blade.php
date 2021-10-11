<html>
<body style="
    background: whitesmoke;
    color: #a3805a;
    width: 100%;
    padding: 20px 5px;
    font-size: 1.5rem;
">


<img src="{{ $message->embed((storage_path('/app/public/images/front-page-images/jojos-nails-logo-drkr1.png'))) }}" width="150px" height="150px">
<br>
<h3>Hi {{$request->name}},</h3>
<h3>
    Thank you for your purchase. Voucher details are below:
</h3>

<div style="
    display: grid;
    place-items: center start;
    padding: 20px 5px;
">
    <p>Please find your voucher for the value of £{{$request->value}} attached to this email</p>
</div>

</body>
</html>