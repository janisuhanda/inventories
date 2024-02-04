@extends('main.layout')

@section('content')
<div class="card card-danger">
    <div class="card-header">
      <h3 class="card-title">Tambah product</h3>
    </div>
    <div class="card-body">
        <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="from-group">
                <label>FOTO</label>
                <input name="foto" accept="image/png, image/jpeg" type="file" class="form-control
                @error('foto')
                is-invalid
                @enderror">
                @error('foto')
                   <div class="alert alert-danger mt-2 ">
                        {{$message}}
                   </div>
                @enderror
            </div>
      <div class="form-group">
        <label>Nama Kategori</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-child"></i></span>
          </div>
          {{-- <input name="name" type="text" class="form-control @error('name') --}}
          <select class="form-control select2 @error('category_id') is-invalid @enderror "
          name="category_id" id="category_id" >
          @foreach ($categories as $category)
              @if (old('category_id') == $category->id)
                  <option value="{{ $category->id }}" selected>{{ $category->name }}

                  @else
                  <option value="{{ $category->id }}">{{ $category->name }}
              @endif
              </option>
          @endforeach
      </select>
            @error('category_id')
            <div class="alert alert-danger mt-2 ">
            {{$message}}
                </div>
            @enderror
        </div>
        <!-- /.input group -->
      </div>
      <div class="form-group">
        <label>Nama Product</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-child"></i></span>
          </div>
          <input name="name" type="text" class="form-control @error('name')
          is-invalid
            @enderror" value="{{old('name')}}">
            @error('name')
            <div class="alert alert-danger mt-2 ">
            {{$message}}
                </div>
            @enderror
        </div>
        <!-- /.input group -->
      </div>
      <!-- /.form group -->
      <div class="form-group">
        <label>code</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-child"></i></span>
          </div>
          <input name="code" type="text" class="form-control @error('code')
          is-invalid
            @enderror" value="{{old('code')}}">
            @error('code')
            <div class="alert alert-danger mt-2 ">
            {{$message}}
                </div>
            @enderror
        </div>
        <!-- /.input group -->
      </div>
      <!-- /.form group -->
      <div class="form-group">
        <label>Stock</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-child"></i></span>
          </div>
          <input name="stock" type="number" class="form-control @error('stock')
          is-invalid
            @enderror" value="{{old('stock')}}">
            @error('stock')
            <div class="alert alert-danger mt-2 ">
            {{$message}}
                </div>
            @enderror
        </div>
        <!-- /.input group -->
      </div>
      <!-- /.form group -->
      <div class="form-group">
        <label>Keterangan</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-child"></i></span>
          </div>
          <input name="keterangan" type="text" class="form-control @error('keterangan')
          is-invalid
            @enderror" value="{{old('keterangan')}}">
            @error('keterangan')
            <div class="alert alert-danger mt-2 ">
            {{$message}}
                </div>
            @enderror
        </div>
        <!-- /.input group -->
      </div>
      <!-- /.form group -->
      <button type="submit" class="btn btn-primary mt-3">SUBMIT</button>
    </form>

    </div>
    <!-- /.card-body -->
  </div>

@endsection


@section('bottom_script')
<script>

</script>
@endsection


