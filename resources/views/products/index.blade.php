@extends('main.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

            <a href="{{route('products.create')}}" class="btn btn-primary mb-3">Tambah Product</a>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">DAFTAR PRODUK</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>CODE</th>
                      <th>NAMA KATEGORI</th>
                      <th>NAMA PRODUK</th>
                      <th>FOTO</th>
                      <th>KETERANGAN</th>
                      <th>AKSI</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if (count($products) > 0)
                    @foreach ($products as $product)
                    <tr>
                        <td>{{$product->code}}</td>
                        <td>{{$product->category->name}}</td>
                        <td>{{$product->name}}</td>
                        <td><img src="{{asset('storage/products/'.$product->foto)}}"></td>
                        <td>{{$product->keterangan}}</td>
                        <td>
                            {{-- <a href="{{route('categories.show',$product->id)}}" class="btn btn-dark">Show</a> --}}
                            <a href="{{route('products.edit',$product->id)}}" class="btn btn-primary">Edit</a>
                            {{-- <a href="" class="btn btn-primary">delete</a> --}}
                            <form action="{{route('products.destroy',$product->id)}}" method="post" >
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td>BELUM ADA DATA</td>
                    </tr>
                @endif

                    </tbody>

                  </table>
                </div>
                <!-- /.card-body -->
              </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
@endsection


@section('bottom_script')
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    });
  </script>
@endsection


