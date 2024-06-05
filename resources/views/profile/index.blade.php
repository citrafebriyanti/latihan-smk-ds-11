@extends('layouts.index')
@section('content')
<div class="container">
    <h2>profile</h2>
    @if ($errors->any())
        foreach ($errors->all() as $error)
        {{ $error}}
        @endforeach
        @endif
    <div class="row">
        

        <div class="col-lg-5">
            <from action="{{ route('aksi_edit_profile') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label form="nama">Nama</label>
                    <input type="tetx" class="form-control" value="{{ auth()->user()->nama}}" name="nama">
                    
                </div>
                <div class="mb-3">
                    <label form="nama">Email</label>
                    <input type="tetx" disabled  class="form-control" value="{{ auth()->user()->nama}}" name="nama">
                </div>
                  <button type="submit" class="btn btn-primary">
                    Edit profile
                </button>
            </from>
        </div>
    </div>
</div>
@endsection