<html>
<body style="
    background: whitesmoke;
    color: #315b96;
    width: 100%;
    padding: 20px 5px;
    font-size: 1.5rem;
">
<h3 style="color: #315b96;">Hi Joanna,</h3>
<h3 style="color: #315b96;">
    Here is your latest
        @if ($request->TC && $request->ST)
            Training Course and Salon Treatment
        @elseif ($request->ST)
            Salon Treatment
        @elseif ($request->TC)
            Training Course
        @endif
    enquiry:
</h3>

<table 
    cellpadding='15' 
    cellspacing='0' 
    border='0'
    style="
        width: 95%;
    "
>
    
    <thead>
        <tr>
            <th colspan='4'>Customer Details</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan='2'>Name:</td>
            <td colspan='2'>{{$request->name}}</td>
        </tr>
        <tr>
            <td colspan='2'>Number:</td>
            <td colspan='2'>{{$request->number}}</td>
        </tr>
        <tr>
            <td colspan='2'>Email:</td>
            <td colspan='2'>{{$request->email}}</td>
        </tr>
        @if ($request->TC)
            <tr style="margin-top: 50px">
                <th colspan='4'>Training Courses in Basket</th>
            </tr>
            <tr>
                <td colspan='2'>Course Date:</td>
                <td colspan='2'>{{$request->trainingCourseStartdate}}</td>
            </tr>   
            <tr>
                <th>Type</th>
                <th>Title</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
            @foreach ($request['itemsInBasket'] as $item)
                @if ($item['type'] === "TC")     
                    <tr>
                        <td style="text-align: center;">{{$item['subCategoryTitle']}}</td>
                        <td style="text-align: center;">{{$item['title']}}</td>
                        <td style="text-align: center;">{{$item['quantity']}}</p>
                        <td style="text-align: center;">£{{$item['price']}}</td>
                    </tr>
                @endif
            @endforeach
        @endif
        @if ($request->ST)
            <tr style="margin-top: 50px;">
                <th colspan='4'>Salon Treatments in Basket</th>
            </tr>
            <tr>
                <td colspan='2'>Treatment Date:</td>
                <td colspan='2'>{{$request->treatmentsStartdate}}</td>
            </tr>
            <tr>
                <td colspan='2'>Treatment Time:</td>
                <td colspan='2'>{{$request->time}}</td>
            </tr>
            <tr>
                <th>Type</th>
                <th>Title</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
            @foreach ($request['itemsInBasket'] as $item)
                @if ($item['type'] === "ST")
                    <tr>
                        <td style="text-align: center;">{{$item['subCategoryTitle']}}</td>
                        <td style="text-align: center;">{{$item['title']}}</td>
                        <td style="text-align: center;">{{$item['quantity']}}</p>
                        <td style="text-align: center;">£{{$item['price']}}</td>
                    </tr>
                @endif
            @endforeach
        @endif
        <tr>
            <th colspan='2'>Total Cost:</th>
            <th colspan='2'>£{{$request->totalCost}}</th>
        </tr>
    </tbody>

</table>

</body>
</html>