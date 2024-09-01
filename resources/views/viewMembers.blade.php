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
        <h3>Daftar Pengguna (Member)</h3>
        <table class="table table-striped table-hover">
            <thead>
                <tr class="align-middle">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-center" colspan="4">Jumlah Resep</td>
                </tr>
                <tr>
                    <td rowspan="2">No.</td>
                    <td>Nama</td>
                    <td class="text-center">Terakhir Aktif</td>
                    <td class="text-center">Umur akun</td>
                    <td class="text-center">Privat</td>
                    <td class="text-center">Publik (Belum Terpublikasi)</td>
                    <td class="text-center">Publik (Terpublikasi)</td>
                    <td class="text-center">Total</td>
                    {{-- <td class="text-center">
                        <a href="?sort=last_active&direction={{ request('direction', 'asc') === 'asc' ? 'desc' : 'asc' }}">
                            Terakhir Aktif <i class="fa fa-filter"></i>
                            @if (request('sort') === 'last_active')
                                @if (request('direction') === 'asc')
                                    <i class="fa fa-arrow-circle-up"></i>
                                @else
                                    <i class="fa fa-arrow-circle-down"></i>
                                @endif
                            @endif
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="?sort=account_age&direction={{ request('direction') === 'asc' ? 'desc' : 'asc' }}">
                            Umur akun <i class="fa fa-filter"></i>
                            @if (request('sort') === 'account_age')
                                @if (request('direction') === 'asc')
                                    <i class="fa fa-arrow-circle-up"></i>
                                @else
                                    <i class="fa fa-arrow-circle-down"></i>
                                @endif
                            @endif
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="?sort=private&direction={{ request('direction') === 'asc' ? 'desc' : 'asc' }}">
                            Privat <i class="fa fa-filter"></i>
                            @if (request('sort') === 'private')
                                @if (request('direction') === 'asc')
                                    <i class="fa fa-arrow-circle-up"></i>
                                @else
                                    <i class="fa fa-arrow-circle-down"></i>
                                @endif
                            @endif
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="?sort=public_unverified&direction={{ request('direction') === 'asc' ? 'desc' : 'asc' }}">
                            Publik (Belum Terpublikasi) <i class="fa fa-filter"></i>
                            @if (request('sort') === 'public_unverified')
                                @if (request('direction') === 'asc')
                                    <i class="fa fa-arrow-circle-up"></i>
                                @else
                                    <i class="fa fa-arrow-circle-down"></i>
                                @endif
                            @endif
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="?sort=public_verified&direction={{ request('direction') === 'asc' ? 'desc' : 'asc' }}">
                            Publik (Terpublikasi) <i class="fa fa-filter"></i>
                            @if (request('sort') === 'public_verified')
                                @if (request('direction') === 'asc')
                                    <i class="fa fa-arrow-circle-up"></i>
                                @else
                                    <i class="fa fa-arrow-circle-down"></i>
                                @endif
                            @endif
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="?sort=total_recipes&direction={{ request('direction') === 'asc' ? 'desc' : 'asc' }}">
                            Total <i class="fa fa-filter"></i>
                            @if (request('sort') === 'total_recipes')
                                @if (request('direction') === 'asc')
                                    <i class="fa fa-arrow-circle-up"></i>
                                @else
                                    <i class="fa fa-arrow-circle-down"></i>
                                @endif
                            @endif
                        </a>
                    </td>
                </tr>
            </thead> --}}
            <tbody>
                @foreach($userMembers as $user)
                    <tr>
                        <td> {{ ($userMembers->currentPage() - 1) * $userMembers->perPage() + $loop->index + 1 }} </td>
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
                        <td class="text-center"> {{ $user->recipes->where('type', 'private')->count() }} </td>
                        <td class="text-center"> {{ $user->recipes->where('type', 'public')->where('is_verified_by_ahli_gizi', false)->count() }} </td>
                        <td class="text-center"> {{ $user->recipes->where('type', 'public')->where('is_verified_by_ahli_gizi', true)->count() }} </td>
                        <td class="text-center"> {{ $user->recipes->count() }} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <ul class="pagination d-flex justify-content-center">
            <li class="page-item">
                <a class="page-link" href="{{$userMembers->previousPageUrl()}}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            @for ($i = 1; $i <= $userMembers->lastPage() && $i <= 10; $i++)
                <li class="page-item">
                    @if ($i == $userMembers->currentPage())
                        <b><a class="page-link" href="{{$userMembers->url($i)}}">{{$i}}</a></b>
                    @else
                        <a class="page-link" href="{{$userMembers->url($i)}}">{{$i}}</a>
                    @endif
                </li>
            @endfor
            <li class="page-item">
                <a class="page-link" href="{{$userMembers->nextPageUrl()}}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </div>
@endsection
