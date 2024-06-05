@extends('layouts.app')

@section('content')
<div class="container border border-dark"style=" box-shadow: 1px 2px 10px">
    <h1 class="text-center">
        Listing Of Category
    </h1>
    <table class="table table-striped"><br>
        <a href="/category/create" class="btn btn-primary">New Category</a><br><br>
        <thead>
            <tr>
                <th>S.No</th>
                <th>Category Name</th>
                <th>Description</th>
                <th>Destory</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $info)
                <tr>
                <td>{{$loop->iteration}}</td>
                <td> <a href="/category/{{$info['id']}}/edit" class="link-offset-2 link-underline link-underline-opacity-0" title="Edit">{{$info['name']}}</a> </td>

                <td>{{$info['description']}}</td>
                <td>
                    <form action="/category/{{$info['id']}}" method="post">
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
        color: aquamarine;
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