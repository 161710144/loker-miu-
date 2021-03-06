@extends('layouts.admin')
@section('content')

	<div class="row">
<div class="container">
  <div class="col-md-16">
    <div class="panel panel-success">
      
      @role('pelamar')
      <!-- <div class="panel-heading"><a href="{{ route('pelamar.create') }}" class="au-btn au-btn-icon au-btn--green au-btn--small"> <i class="zmdi zmdi-plus"></i> Add</a>
      </div> -->
      <div class="row">
        <div class="col-md-12">
          <!-- DATA TABLE-->
          <div class="table-responsive m-b-40">
            <table class="table table-data2">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Telepon</th>
                  <th>Pesan</th>
                  <th>Lowongan</th>
                  <th>FileCV</th>
                  <th>Status</th>
                  <th colspan="3">Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php $nomor = 1; ?>
                @php $no = 1; @endphp
                @foreach($pel as $data)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $data->telepon }}</td>
                  <td>{!! str_limit($data->pesan, 20) !!}</td> 
                  <td>{{ $data->Lowongan->nama_low }}</td>
                  <td><form method="get" action="{{ asset('assets/cv/'.$data->file_cv) }}" target="_blank"><button type="submit"><i class="fa fa-chain"></i>{{ $data->file_cv }}</button></form>
                  </td>

                  @if($data->status == 0)
                  <td><button class="btn btn-danger btn-disable">Belum Diterima</button></td>
                  @endif
                  @if($data->status == 1)
                  <td><button class="btn btn-success btn-disable">Sudah Diterima</button></td>
                  @endif

                  @role('perusahaan')

                  @if($data->status == 0)
                  <td>
                  <a class="btn btn-primary" href="{{ url('konfirmasipelamar',$data->id) }}"><i class="fas fa-check"></i>Terima</a>
                  </td>
                  @endif
                  <td>
              <form method="post" action="{{ route('pelamar.destroy',$data->id) }}">
                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="DELETE">

                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"><i class="fas fa-eraser"></i>Hapus</button>
              </form>
            </td>
              @endrole
                  <!-- <td>
                    <a class="btn btn-warning" href="{{ route('pelamar.edit',$data->id) }}"><i class="fas fa-edit"></i>Ubah</a>
                  </td> -->
                  <td>
                    <a class="btn btn-primary" href="{{ route('pelamar.show',$data->id) }}"><i class="fas fa-eye"></i>Lihat</a>
                  </td>
                  <td>
                    <form method="post" action="{{ route('pelamar.destroy',$data->id) }}">
                      <input name="_token" type="hidden" value="{{ csrf_token() }}">
                      <input type="hidden" name="_method" value="DELETE">
                      <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"><i class="fas fa-eraser"></i>Hapus</button>
                    </form>
                  </td>
                </tr>
                @endforeach	
              </tbody>
            </table>
          </div>
        </div>
      </div>
      @endrole

      @role('perusahaan')
      <div class="row">
        <div class="col-md-12">
          <!-- DATA TABLE-->
          <div class="table-responsive m-b-40">
            <table class="table table-striped2">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Telepon</th>
                  <th>Pesan</th>
                  
                  <th>Username</th>
                  <th>Lowongan</th>
                  <th>FileCV</th>
                  <th>Status</th>
                  <th colspan="3">Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php $nomor = 1; ?>
                @php $no = 1; @endphp
                @foreach($pel_per as $data)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $data->telepon }}</td>
                  <td>{!! str_limit($data->pesan, 25) !!}</td>
                  <td>
                    <p>{{ $data->email }}</p>
                  </td>
                  <td>
                    <p>{{ $data->nama_low }}</p>
                  </td>
                  <td>
                   <form method="get" action="{{ asset('assets/cv/'.$data->file_cv) }}" target="_blank"> <button type="submit"><i class="fa fa-chain"></i>{{ $data->file_cv }}</button></form>
                  </td>
                  @if($data->status == 0)
                  <td><button class="btn btn-danger btn-disable">Belum Diterima</button></td>
                  @endif
                  @if($data->status == 1)
                  <td><button class="btn btn-success btn-disable">Sudah Diterima</button></td>
                  @endif

                  @role('perusahaan')

                      @if($data->status == 0)
                      <td>
                      <a class="btn btn-primary" href="{{ url('konfirmasipelamar',$data->id) }}"><i class="fas fa-check"></i>Terima</a>
                    </td>
                    @endif
                    <td>
                        <a class="btn btn-primary" href="{{ route('pelamar.show',$data->id) }}"><i class="fas fa-eye"></i>Lihat</a>
                      </td>
            <td>
              <form method="post" action="{{ route('pelamar.destroy',$data->id) }}">
                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="DELETE">

                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"><i class="fas fa-eraser"></i>Hapus</button>
              </form>
            </td>
              @endrole
                 
                </tr>
                @endforeach	
              </tbody>
            </table>
          </div>
        </div>
      </div>
      @endrole

      @role('admin')
      <div class="row">
        <div class="col-md-12">
          <!-- DATA TABLE-->
          <div class="table-responsive m-b-40">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th class="active">No</th>
                  <th class="active">Telepon</th>
                  <th class="active">Pesan</th>
                  <th class="active">Username</th>
                  <th class="active">Lowongan</th>
                  <th class="active">FileCV</th>
                  <th class="active">Status</th>
                  <th colspan="3" class="active">Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php $nomor = 1; ?>
                @php $no = 1; @endphp
                @foreach($pel_admin as $data)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $data->telepon }}</td>
                  <td>{!! str_limit($data->pesan, 25) !!}</td>
                  <td>
                    <p>{{ $data->User->email }}</p>
                  </td>
                  <td>
                    <p>{{ $data->Lowongan->nama_low }}</p>
                  </td>
                  <td>
                    <form method="get" action="{{ asset('assets/cv/'.$data->file_cv) }}" target="_blank"> <button type="submit"><i class="fa fa-chain"></i>{{ $data->file_cv }}</button></form>
                  </td>
                   @if($data->status == 0)
                  <td><button class="btn btn-danger btn-disable">Belum Diterima</button></td>
                  @endif
                  @if($data->status == 1)
                  <td><button class="btn btn-success btn-disable">Sudah Diterima</button></td>
                  @endif

                  @role('perusahaan')

                      @if($data->status == 0)
                      <td>
                      <a class="btn btn-primary" href="{{ url('konfirmasipelamar',$data->id) }}"><i class="fas fa-check"></i>Konfirmasi</a>
                    </td>
                    @endif
                    <td>
                        <a class="btn btn-primary" href="{{ route('pelamar.show',$data->id) }}"><i class="fas fa-eye"></i>Lihat</a>
                      </td>
            <td>
              <form method="post" action="{{ route('pelamar.destroy',$data->id) }}">
                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="DELETE">

                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"><i class="fas fa-eraser"></i>Hapus</button>
              </form>
            </td>
              @endrole
                  <td>
                    <a class="btn btn-primary" href="{{ route('pelamar.show',$data->id) }}"><i class="fas fa-eye"></i>Lihat</a>
                  </td>
                </tr>
                @endforeach	
              </tbody>
            </table>
          </div>
        </div>
      </div>
      @endrole

    </div>
  </div>
</div>
@endsection