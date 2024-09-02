@extends('templates/template')

@section('title', 'Rempah Rempah | Daftar Pengguna')

@section('content')
    <style>
        .content {
            padding: 30px 50px !important;
        }
        table, thead {
            vertical-align: middle !important;
        }
        thead {
            background-color: lightgray;
        }
        thead a {
            color: black;
        }
    </style>
    <div class="section">
        <h3>Daftar Pengguna (Ahli Gizi)</h3>
        <table class="table table-striped table-hover">
            <thead>
                <tr class="align-middle">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-center" colspan="4">Jumlah Penambahan Nilai Gizi Pada Resep</td>
                </tr>
                <tr>
                    <td rowspan="2">No.</td>
                    <td>Nama</td>
                    <td class="text-center">Terakhir Aktif</td>
                    <td class="text-center">Umur akun</td>
                    <td class="text-center">Perlu Ditambahkan</td>
                    <td class="text-center">Telah Ditambahkan</td>
                    <td class="text-center">Total</td>
                </tr>
            </thead>
            <tbody>
                @foreach($userAhliGizis as $user)
                    <tr>
                        <td> {{ ($userAhliGizis->currentPage() - 1) * $userAhliGizis->perPage() + $loop->index + 1 }} </td>
                        <td> <a href="/publicProfile/{{$user->id}}">{{ $user->name }}</a>
                            <br> {{$user->email}}
                        </td>
                        <td class="text-center">
                            @if ($user->lastLog !== null)
                                @if ($user->lastLog->diffInYears($currentTime) > 0)
                                    {{ $user->lastLog->diffInYears($currentTime) }} tahun
                                @endif
                                @if ($user->lastLog->diffInMonths($currentTime) % 12 > 0)
                                    {{ $user->lastLog->diffInMonths($currentTime) % 12 }} bulan
                                @endif
                                @if ($user->lastLog->diffInDays($currentTime) % 30 > 0)
                                    {{ $user->lastLog->diffInDays($currentTime) % 30 }} hari
                                @endif
                                @if ($user->lastLog->diffInHours($currentTime) % 24 > 0)
                                    {{ $user->lastLog->diffInHours($currentTime) % 24 }} jam
                                @endif
                                {{ $user->lastLog->diffInMinutes($currentTime) % 60 }} menit
                            @else
                                <p class="text-center">-</p>
                            @endif
                        </td>
                        <td class="text-center">
                            @if ($user->created_at->diffInYears($currentTime) > 0)
                                {{ $user->created_at->diffInYears($currentTime) }} tahun
                            @endif
                            @if ($user->created_at->diffInMonths($currentTime) % 12 > 0)
                                {{ $user->created_at->diffInMonths($currentTime) % 12 }} bulan
                            @endif
                            @if ($user->created_at->diffInDays($currentTime) % 30 > 0)
                                {{ $user->created_at->diffInDays($currentTime) % 30 }} hari
                            @endif
                            @if ($user->created_at->diffInHours($currentTime) % 24 > 0)
                                {{ $user->created_at->diffInHours($currentTime) % 24 }} jam
                            @endif
                            {{ $user->created_at->diffInMinutes($currentTime) % 60 }} menit
                        </td>
                        <td class="text-center">{{$user->totalNutritionToBeAdded($user->id)}}</td>
                        <td class="text-center">{{$user->totalNutritionAdded($user->id)}}</td>
                        <td class="text-center">{{$user->totalNutritionToBeAdded($user->id) + $user->totalNutritionAdded($user->id)}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <ul class="pagination d-flex justify-content-center">
            <li class="page-item">
                <a class="page-link" href="{{$userAhliGizis->previousPageUrl()}}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            @for ($i = 1; $i <= $userAhliGizis->lastPage() && $i <= 10; $i++)
                <li class="page-item">
                    @if ($i == $userAhliGizis->currentPage())
                        <b><a class="page-link" href="{{$userAhliGizis->url($i)}}">{{$i}}</a></b>
                    @else
                        <a class="page-link" href="{{$userAhliGizis->url($i)}}">{{$i}}</a>
                    @endif
                </li>
            @endfor
            <li class="page-item">
                <a class="page-link" href="{{$userAhliGizis->nextPageUrl()}}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </div>
@endsection
