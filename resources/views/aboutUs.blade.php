@extends('templates/template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/aboutUs.css') }}">
@endsection

@section('title', 'Rempah Rempah | Tentang kami')

@section('content')
    <div class="section">
        <img id="logo" src="{{ asset('assets/logo_rempah.png') }}" alt="Rempah Rempah">
    </div>
    <div class="section">
        <div class="title">Tentang kami</div>
        <div class="description">
            <p>
                Keanekaragaman budaya makanan lokal di Indonesia merupakan fondasi yang tak terpisahkan dari kehidupan masyarakat. Dalam rangka meningkatkan kesadaran masyarakat akan pentingnya melestarikan warisan kuliner lokal dan mempromosikan budaya makanan Indonesia, Rempah Rempah hadir secara khusus untuk mempromosikan resep-resep makanan lokal. Selain berfokus pada meningkatkan efisiensi dan efektivitas dalam memasak, Rempah Rempah juga menawarkan kumpulan resep yang telah diverifikasi oleh para ahli gizi. Dengan pendekatan ini, keberagaman rasa dan tradisi kuliner tidak hanya akan terjaga, tetapi juga dapat memberdayakan komunitas lokal, termasuk para pelaku usaha kuliner, untuk terus menghidupkan dan mempertahankan keunikan kuliner Indonesia.
            </p>
            <p>
                Rempah Rempah juga menyediakan fitur interaktif yang memungkinkan para pengguna berbagi pengalaman memasak, tips, dan trik kuliner secara langsung. Dengan demikian, melalui platform ini, Rempah Rempah berharap dapat membangun hubungan yang erat antara pengguna, para ahli gizi, dan pelaku usaha kuliner, sehingga bersama-sama kita dapat merayakan dan melestarikan kekayaan kuliner Indonesia untuk generasi mendatang. "Dari Dapur ke Dunia, Resep Sederhana, Kelezatan Luar Biasa"
            </p>
        </div>
    </div>
    <div class="section">
        <div class="title">Tim kami</div>
        <div class="description">
            <p>
                Rempah Rempah dikembangkan oleh tiga mahasiswa jurusan Computer Science di tahun akhir perkuliahan sebagai tugas skripsi.
            </p>
        </div>
    </div>
@endsection
