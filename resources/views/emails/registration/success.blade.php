@extends('emails.layouts.app')

@section('title', 'Selamat Datang di Racik')

@push('stylesheet')
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            color: #495057;
        }

        .container {
            width: 100%;
            max-width: 640px;
            margin: 30px auto;
            background: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            border: 1px solid #e9ecef;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e9ecef;
        }

        .logo {
            max-width: 180px;
            height: auto;
            margin-bottom: 20px;
        }

        h2 {
            color: #212529;
            text-align: center;
            margin: 0 0 20px;
            font-size: 24px;
            font-weight: 600;
        }

        .content {
            padding: 0 10px;
        }

        p {
            color: #495057;
            line-height: 1.6;
            margin-bottom: 16px;
            font-size: 15px;
        }

        .highlight {
            font-weight: 600;
            color: #212529;
        }

        .quote {
            font-style: italic;
            color: #6c757d;
            text-align: center;
            margin: 25px 0;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 6px;
            border-left: 4px solid #753a1b;
        }

        .button-container {
            text-align: center;
            margin: 30px 0;
        }

        .button {
            display: inline-block;
            padding: 12px 28px;
            background: #753a1b;
            color: #ffffff;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 15px;
            transition: background-color 0.2s ease;
        }

        .button:hover {
            background: #431e0f;
        }

        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #e9ecef;
            text-align: center;
            font-size: 13px;
            color: #868e96;
            line-height: 1.5;
        }
    </style>
@endpush

@section('content')
    <h2>Selamat Datang di Racik</h2>

    <p>Yth. <span class="highlight">{{ $user->name }}</span>,</p>

    <p>Selamat! Pendaftaran Anda untuk menggunakan layanan Racik telah berhasil. Kami sangat antusias menyambut
        Anda dalam program ini.</p>

    <p>Untuk melanjutkan proses, mohon masuk ke akun Anda dan mengisi data diri dan riwayat kesehatan Anda dengan
        lengkap.</p>

    <div class="quote">
        "Stay Healthy, Stay Happy!"
    </div>
@endsection

@section('button', 'http://127.0.0.1:8000/patient/login')
