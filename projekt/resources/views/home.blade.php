@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Currency</th>
                  <th scope="col">Code</th>
                  <th scope="col">Mid</th>
                  <th scope="col">Updated at</th>
                </tr>
              </thead>
              <tbody>
                @foreach($exchanges as $exchange)
                <tr>
                  <th scope="row">{{ $exchange->id }}</th>
                  <td>{{ $exchange->currency }}</td>
                  <td>{{ $exchange->code }}</td>
                  <td>{{ $exchange->mid }}</td>
                  <td>{{ $exchange->updated_at }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
        {{ $exchanges->links() }}
    </div>
</div>
@endsection
