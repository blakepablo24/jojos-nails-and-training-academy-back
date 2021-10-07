<html>
<body style="
    background: whitesmoke;
    color: #315b96;
    width: 100%;
    padding: 20px 5px;
    font-size: 1.5rem;
">
<h3 style="color: #315b96;">Hi {{$request->name}},</h3>
<h3 style="color: #315b96;">
    Thank you for purchasing a voucher from JOJO's.
</h3>

<p>Please find attached your voucher</p>

<p>{{$request->from}}</p>
<p>{{$request->to}}</p>
<p>{{$request->message}}</p>
<p>{{$request->value}}</p>

</body>
</html>