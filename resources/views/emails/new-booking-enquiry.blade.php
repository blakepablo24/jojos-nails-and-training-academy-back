<p>{{$request->name}}</p>
<p>{{$request->email}}</p>
<p>{{$request->number}}</p>
<p>{{$request->time}}</p>
<p>{{$request->trainingCourseStartdate}}</p>
<p>{{$request->treatmentsStartdate}}</p>
@foreach($request['itemsInBasket'] as $item)
    <p>Type: {{$item['subCategoryTitle']}}</p>
    <p>Title: {{$item['title']}}</p>
    <p>Quantity: {{$item['quantity']}}</p>
    <p>Price: £{{$item['price']}}</p>
@endforeach