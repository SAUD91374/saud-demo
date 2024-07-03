<div class="container">
    @if($info['photos'])
    <div>
      
        @foreach($info->photos as $img)
        <div title="Click X for delete this image" id="photo_{{$img['id']}}" class="product-image">
                <img src="/photos/{{$img ['file_path']}}" alt="Main Product Image" class="slide active">
      </div>
      @endforeach
    </div>
    @endif
    @foreach($info as $data)
    @dd($data);
</div>
