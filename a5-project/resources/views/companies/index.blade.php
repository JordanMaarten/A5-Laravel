@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">Bedrijven</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Naam</td>
                        <td colspan=2>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($companies as $company)
                        <tr>
                            <td>{{$company->id}}</td>
                            <td>{{$company->name}}</td>
                            <td>
                                <a href="{{ route('companies.edit', $company->id)}}" class="btn btn-primary">Aanpassen</a>
                            </td>
                            <td>
                                <form action="{{ route('companies.destroy', $company->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Verwijderen</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>
                            <a href="{{ route('companies.create')}}" class="btn btn-primary">Nieuwe toevoegen</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        <div>
    </div>
@endsection