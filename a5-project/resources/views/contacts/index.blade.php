@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">Contacten</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Naam</td>
                        <td>Email</td>
                        <td>Woonplaats</td>
                        <td>Nationaliteit</td>
                        <td>Baan</td>
                        <td>Bedrijf</td>
                        <td colspan=2>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <td>{{$contact->id}}</td>
                            <td>{{$contact->first_name}} {{$contact->last_name}}</td>
                            <td>{{$contact->email}}</td>
                            <td>{{$contact->city}}</td>
                            <td>{{$contact->country}}</td>
                            <td>{{$contact->job_title}}</td>
                            <td>{{$contact->company->name}}</td>
                            <td>
                                <a href="{{ route('contacts.edit', $contact->id)}}" class="btn btn-primary">Aanpassen</a>
                            </td>
                            <td>
                                <form action="{{ route('contacts.destroy', $contact->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Verwijderen</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        <div>
    </div>
@endsection