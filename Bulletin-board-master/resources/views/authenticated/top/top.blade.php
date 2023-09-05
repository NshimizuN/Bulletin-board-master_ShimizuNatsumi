@extends('layouts.login')
@section('content')
    <form action="{{ route('loginTop') }}" method="POST">
        @csrf
        <span>トップページ</span>
        <button type="submit">トップへ</button>
    </form>
@endsection
