    @extends('layouts.app')

    @section('content')
    <div class="container">
        <h1 class="text-center">
            Listing of Products
        </h1>
        <table class="table table-striped border">
            <a href="/product/create" class="btn btn-primary">Enter New</a><br><br>
            <thead>
                <tr>
                    <th>S.No </th>
                    <th>Product&nbsp;Name </th>
                    <th>Product&nbsp;price </th>
                    <th>Discount </th>
                    <th>Final&nbsp;Price </th>
                    <th>Description </th>
                    <th>M.F.D </th>
                    <th>Category </th>
                    <th>Destory </th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $info)
                    <tr>
                    <td>{{$loop->iteration}}</td>
                    <td> <a href="/product/{{$info['id']}}/edit" class="link-offset-2 link-underline link-underline-opacity-0" title="Edit">{{$info['name']}}</a> </td>
                    <td>{{$info['price']}}</td>
                    <td>{{$info['discount']."%"}}</td>
                    <td>{{$info['price'] - ($info['price'] * ($info['discount'] / 100))}}</td>
                    <td>{{$info['description']}}</td>
                    <td>{{$info['mfg']}}</td>
                    <td>
                        @php
                        // $x=array_column($info->allcategory->toArray(),'category_id');
                        // dd(\App\Models\category::find($x[0])->name);
                        @endphp
                        @foreach($info->allcategory as $cid)
                        {{$cid['categoryId']['name'].", "}}
                        @endforeach
                    </td> 
                    <td>
                        <form action="/product/{{$info['id']}}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" onclick="return confirm('Do you really want to perform this task')">Delete</button>
                        </form>
                    </td>
                    </tr>
                
                @endforeach
            </tbody>
        </table>
    </div>

    <style>
        h1 {
            font-size: 70px;
            font-weight: 600;
            font-family: 'Roboto', sans-serif;
            color: rgb(83, 42, 139);
            text-transform: uppercase;
            text-shadow: 1px 1px 0px #957dad,
            1px 2px 0px #957dad,
            1px 3px 0px #957dad,
            1px 4px 0px #957dad,
            1px 5px 0px #957dad,
            1px 6px 0px #957dad,
            1px 10px 5px rgba(16,16,16,0.5),
            1px 15px 10px rgba(16,16,16,0.4),
            1px 20px 30px rgba(16,16,16,0.3),
            1px 25px 50px rgba(16,16,16,0.2);

        }
    </style>
    @endsection