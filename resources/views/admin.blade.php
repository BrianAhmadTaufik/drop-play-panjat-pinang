<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Admin — Panjat Pinang
    </title>

    <style>

        * {
            box-sizing: border-box;
        }

        :root {
            --red: #e5233f;
            --red-dark: #c71934;
            --cream: #fff8ed;
            --text: #201c19;
            --muted: #91887d;
            --green: #43915b;
            --gold: #e9af2d;
        }

        body {
            margin: 0;
            font-family:
                Arial,
                Helvetica,
                sans-serif;
            color: var(--text);
            background: #f5f4f1;
        }

        .container {
            width: min(
                1200px,
                calc(100% - 24px)
            );

            margin: 22px auto 50px;
        }

        /* =====================================================
           HEADER
        ====================================================== */

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 18px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand img {
            width: 105px;
        }

        .brand h1 {
            margin: 0;
            font-size: 23px;
            font-weight: 1000;
        }

        .status-badge {
            padding: 7px 11px;
            border-radius: 999px;
            color: var(--red);
            background: #ffebee;
            font-size: 9px;
            font-weight: 1000;
            letter-spacing: .7px;
        }

        /* =====================================================
           ALERT
        ====================================================== */

        .alert {
            padding: 12px 14px;
            margin-bottom: 15px;
            border-radius: 11px;
            font-size: 11px;
            font-weight: 700;
        }

        .alert.success {
            color: #176c3a;
            background: #e7f7ec;
        }

        .alert.error {
            color: #be1e35;
            background: #ffeaed;
        }

        /* =====================================================
           STATS
        ====================================================== */

        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
            margin-bottom: 15px;
        }

        .stat {
            padding: 18px;
            border-radius: 17px;
            background: white;
            box-shadow: 0 7px 25px rgba(0,0,0,.05);
        }

        .stat-label {
            color: var(--muted);
            font-size: 9px;
            font-weight: 900;
            letter-spacing: .7px;
        }

        .stat-value {
            margin-top: 7px;
            font-size: 23px;
            font-weight: 1000;
        }

        .stat-value.red {
            color: var(--red);
        }

        .stat-value.green {
            color: var(--green);
        }

        /* =====================================================
           MAIN GRID
        ====================================================== */

        .grid {
            display: grid;
            grid-template-columns: 350px 1fr;
            gap: 15px;
            align-items: start;
        }

        .card {
            padding: 22px;
            border-radius: 19px;
            background: white;
            box-shadow: 0 7px 25px rgba(0,0,0,.05);
        }

        .card-title {
            margin: 0;
            font-size: 17px;
            font-weight: 1000;
        }

        .card-subtitle {
            margin: 5px 0 18px;
            color: var(--muted);
            font-size: 10px;
            line-height: 1.5;
        }

        /* =====================================================
           FORM
        ====================================================== */

        .field {
            margin-bottom: 13px;
        }

        .field label {
            display: block;
            margin-bottom: 6px;
            font-size: 9px;
            font-weight: 1000;
        }

        .field input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd7cf;
            border-radius: 10px;
            outline: none;
            font-size: 12px;
        }

        .field input:focus {
            border-color: var(--red);
            box-shadow: 0 0 0 3px rgba(229,35,63,.08);
        }

        .submit {
            width: 100%;
            padding: 13px;
            border: 0;
            border-radius: 10px;
            color: white;
            background: var(--red);
            font-size: 11px;
            font-weight: 1000;
            cursor: pointer;
        }

        .submit:hover {
            background: var(--red-dark);
        }

        /* =====================================================
           PARTICIPANTS
        ====================================================== */

        .participant-list {
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin-top: 15px;
        }

        .participant {
            display: grid;

            /*
             * RANK
             * AVATAR
             * INFO
             * LEVEL / HADIAH
             */
            grid-template-columns:
                35px
                44px
                minmax(0, 1fr)
                auto;

            align-items: center;
            gap: 10px;

            padding: 11px;

            border: 1px solid #eee9e3;
            border-radius: 13px;

            background: #faf9f7;
        }

        .participant-rank {
            width: 32px;
            height: 32px;

            display: grid;
            place-items: center;

            border-radius: 10px;

            background: #eee9e3;
            color: #766e65;

            font-size: 9px;
            font-weight: 1000;
        }

        /* =====================================================
           AVATAR
        ====================================================== */

        .participant-avatar {
            width: 42px;
            height: 42px;

            display: grid;
            place-items: center;

            overflow: hidden;

            border-radius: 12px;

            background: #eee9e3;

            flex-shrink: 0;
        }

        .participant-avatar img {
            width: 100%;
            height: 100%;

            object-fit: cover;
            display: block;
        }

        .participant-avatar-placeholder {
            width: 100%;
            height: 100%;

            display: grid;
            place-items: center;

            color: #766e65;

            font-size: 15px;
            font-weight: 1000;
        }

        .participant-name {
            font-size: 11px;
            font-weight: 1000;
        }

        .participant-meta {
            margin-top: 3px;
            color: #999086;
            font-size: 8px;
        }

        /* =====================================================
           AVATAR UPLOAD
        ====================================================== */

        .avatar-form {
            margin-top: 7px;
        }

        .avatar-input {
            width: 100%;
            max-width: 260px;

            color: #777;

            font-size: 8px;
        }

        .avatar-input::file-selector-button {
            border: 0;
            border-radius: 6px;

            padding: 5px 7px;
            margin-right: 5px;

            background: #eee9e3;
            color: #5f584f;

            font-size: 8px;
            font-weight: 900;

            cursor: pointer;
        }

        .avatar-input::file-selector-button:hover {
            background: #e3ded7;
        }

        .avatar-submit {
            margin-top: 5px;

            padding: 5px 8px;

            border: 0;
            border-radius: 6px;

            background: var(--red);
            color: white;

            font-size: 7px;
            font-weight: 1000;

            cursor: pointer;
        }

        .avatar-submit:hover {
            background: var(--red-dark);
        }

        .participant-side {
            text-align: right;
        }

        .participant-level {
            display: inline-flex;

            padding: 5px 7px;

            border-radius: 999px;

            color: #876207;
            background: #fff0b3;

            font-size: 7px;
            font-weight: 1000;
        }

        .participant-prize {
            margin-top: 4px;

            color: var(--red);

            font-size: 8px;
            font-weight: 900;
        }

        .participant-spending {
            margin-top: 3px;

            color: #5f584f;

            font-size: 8px;
            font-weight: 800;
        }

        .empty {
            padding: 30px;

            color: var(--muted);
            background: #faf9f7;

            border-radius: 13px;

            text-align: center;

            font-size: 11px;
        }

        /* =====================================================
           TRANSACTION
        ====================================================== */

        .table-wrap {
            margin-top: 15px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            padding: 10px 7px;

            border-bottom: 1px solid #eee;

            color: #999087;

            font-size: 8px;
            font-weight: 1000;

            text-align: left;
        }

        td {
            padding: 11px 7px;

            border-bottom: 1px solid #f0ece7;

            font-size: 10px;
        }

        td.name {
            font-weight: 1000;
        }

        td.amount {
            font-weight: 900;
        }

        td.time {
            color: #948b81;
            white-space: nowrap;
        }

        .delete-button {
            padding: 6px 8px;

            border: 0;
            border-radius: 7px;

            color: var(--red);
            background: #ffeaed;

            font-size: 7px;
            font-weight: 1000;

            cursor: pointer;
        }

        .delete-button:hover {
            background: #ffdce2;
        }

        /* =====================================================
           MOBILE
        ====================================================== */

        @media (max-width: 950px) {

            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .grid {
                grid-template-columns: 1fr;
            }

        }

        @media (max-width: 600px) {

            .container {
                width: calc(100% - 12px);
                margin-top: 12px;
            }

            .header {
                align-items: flex-start;
            }

            .brand img {
                width: 75px;
            }

            .brand h1 {
                font-size: 17px;
                line-height: 1.1;
            }

            .status-badge {
                font-size: 7px;
                padding: 6px 8px;
            }

            .stats {
                grid-template-columns: repeat(2, 1fr);
                gap: 7px;
            }

            .stat {
                padding: 13px;
                border-radius: 14px;
            }

            .stat-label {
                font-size: 7px;
            }

            .stat-value {
                font-size: 18px;
            }

            .card {
                padding: 16px;
                border-radius: 16px;
            }

            .participant {

                grid-template-columns:
                    32px
                    38px
                    minmax(0, 1fr)
                    auto;

                gap: 7px;

                padding: 9px;
            }

            .participant-rank {
                width: 29px;
                height: 29px;
            }

            .participant-avatar {
                width: 36px;
                height: 36px;
                border-radius: 10px;
            }

            .participant-name {
                font-size: 10px;
            }

            .participant-meta {
                font-size: 7px;
            }

            .participant-level {
                font-size: 6px;
            }

            .participant-prize {
                font-size: 7px;
            }

            .participant-spending {
                font-size: 7px;
            }

            .avatar-input {
                max-width: 170px;
                font-size: 7px;
            }

            .avatar-input::file-selector-button {
                font-size: 7px;
                padding: 4px 6px;
            }

            .avatar-submit {
                font-size: 6px;
                padding: 4px 7px;
            }

            /* ===============================
               MOBILE TRANSACTION TABLE
            =============================== */

            table,
            thead,
            tbody,
            tr,
            th,
            td {
                display: block;
            }

            thead {
                display: none;
            }

            tr {
                position: relative;

                padding: 12px;
                margin-bottom: 8px;

                border: 1px solid #ece7e1;
                border-radius: 12px;

                background: #faf9f7;
            }

            td {
                padding: 2px 0;
                border: 0;
            }

            td.name {
                padding-right: 60px;
                font-size: 11px;
            }

            td.amount {
                margin-top: 4px;
            }

            td.time {
                margin-top: 4px;
            }

            td:last-child {
                position: absolute;

                top: 10px;
                right: 10px;
            }

        }

    </style>

</head>


<body>

<div class="container">

    <!-- =====================================================
         HEADER
    ====================================================== -->

    <header class="header">

        <div class="brand">

            <img
                src="{{ asset('images/drop-play.png') }}"
                alt="Drop Play"
            >

            <h1>
                Panjat Pinang Admin
            </h1>

        </div>

        <div class="status-badge">
            ADMIN PANEL
        </div>

    </header>


    <!-- =====================================================
         ALERT
    ====================================================== -->

    @if(session('success'))

        <div class="alert success">
            {{ session('success') }}
        </div>

    @endif


    @if($errors->any())

        <div class="alert error">
            {{ $errors->first() }}
        </div>

    @endif


    @if($event)

        <!-- =================================================
             STATS
        ================================================== -->

        <div class="stats">

            <div class="stat">

                <div class="stat-label">
                    PESERTA
                </div>

                <div class="stat-value">
                    {{ $participants->count() }}
                </div>

            </div>


            <div class="stat">

                <div class="stat-label">
                    HADIAH TERISI
                </div>

                <div class="stat-value red">

                    {{
                        $allocated
                            ->whereNotNull('participant_id')
                            ->count()
                    }}

                    / 17

                </div>

            </div>


            <div class="stat">

                <div class="stat-label">
                    TOP LEVEL
                </div>

                <div class="stat-value">

                    {{
                        $participants
                            ->max('highest_level')
                        ?? 0
                    }}

                </div>

            </div>


            <div class="stat">

                <div class="stat-label">
                    STATUS EVENT
                </div>

                <div
                    class="
                        stat-value
                        {{
                            $event->is_finished
                                ? ''
                                : 'green'
                        }}
                    "
                >

                    {{
                        $event->is_finished
                            ? 'SELESAI'
                            : 'LIVE'
                    }}

                </div>

            </div>

        </div>


        <!-- =================================================
             GRID
        ================================================== -->

        <div class="grid">


            <!-- =============================================
                 LEFT
            ============================================== -->

            <div>


                <!-- =========================================
                     TAMBAH TOP UP
                ========================================== -->

                <div class="card">

                    <h2 class="card-title">
                        Tambah Top Up
                    </h2>

                    <p class="card-subtitle">

                        Masukkan transaksi peserta.
                        Sistem otomatis menghitung
                        spending, level, dan hadiah
                        sementara.

                    </p>


                    <form
                        method="POST"
                        action="{{ route('admin.topup') }}"
                    >

                        @csrf


                        <div class="field">

                            <label>
                                NAMA PESERTA
                            </label>

                            <input
                                type="text"
                                name="name"
                                placeholder="Contoh: Rizky"
                                required
                            >

                        </div>


                        <div class="field">

                            <label>
                                NOMINAL TOP UP
                            </label>

                            <input
                                type="number"
                                name="amount"
                                min="1"
                                placeholder="Contoh: 500000"
                                required
                            >

                        </div>


                        <button
                            type="submit"
                            class="submit"
                        >
                            + TAMBAH TOP UP
                        </button>

                    </form>

                </div>


                <!-- =========================================
                     PARTICIPANTS
                ========================================== -->

                <div
                    class="card"
                    style="margin-top:15px;"
                >

                    <h2 class="card-title">
                        Peserta
                    </h2>

                    <p class="card-subtitle">

                        Diurutkan berdasarkan spending terbesar.
                        Avatar hanya dapat diubah oleh admin.

                    </p>


                    <div class="participant-list">


                        @forelse(
                            $participants
                            as $index => $participant
                        )


                            <div class="participant">


                                <!-- =========================
                                     RANK
                                ========================== -->

                                <div class="participant-rank">

                                    #{{ $index + 1 }}

                                </div>


                                <!-- =========================
                                     AVATAR
                                ========================== -->

                                <div class="participant-avatar">

                                    @if($participant->avatar)

                                        <img
                                            src="{{ asset('storage/' . $participant->avatar) }}"
                                            alt="{{ $participant->name }}"
                                        >

                                    @else

                                        <div class="participant-avatar-placeholder">

                                            {{
                                                strtoupper(
                                                    substr(
                                                        $participant->name,
                                                        0,
                                                        1
                                                    )
                                                )
                                            }}

                                        </div>

                                    @endif

                                </div>


                                <!-- =========================
                                     INFO
                                ========================== -->

                                <div>

                                    <div class="participant-name">

                                        {{
                                            $participant->name
                                        }}

                                    </div>


                                    <div class="participant-meta">

                                        Rp{{
                                            number_format(
                                                $participant->total_spending,
                                                0,
                                                ',',
                                                '.'
                                            )
                                        }}

                                        •

                                        {{
                                            $participant->transaction_count
                                        }}

                                        transaksi

                                    </div>


                                    <!-- =====================
                                         ADMIN AVATAR UPLOAD
                                    ====================== -->

                                    <form
                                        class="avatar-form"
                                        method="POST"
                                        action="{{
                                            route(
                                                'admin.participant.avatar',
                                                $participant
                                            )
                                        }}"
                                        enctype="multipart/form-data"
                                    >

                                        @csrf


                                        <input
                                            class="avatar-input"
                                            type="file"
                                            name="avatar"
                                            accept="image/jpeg,image/png,image/webp"
                                            required
                                        >


                                        <br>


                                        <button
                                            type="submit"
                                            class="avatar-submit"
                                        >

                                            {{
                                                $participant->avatar
                                                    ? 'GANTI FOTO'
                                                    : 'UPLOAD FOTO'
                                            }}

                                        </button>

                                    </form>

                                </div>


                                <!-- =========================
                                     LEVEL + HADIAH
                                ========================== -->

                                <div class="participant-side">

                                    <div class="participant-level">

                                        LEVEL
                                        {{
                                            $participant->highest_level
                                        }}

                                    </div>


                                    @if(
                                        $participant->current_reward
                                    )

                                        <div class="participant-prize">

                                            {{
                                                $participant->current_reward
                                            }}

                                        </div>

                                    @else

                                        <div class="participant-prize">

                                            Belum dapat hadiah

                                        </div>

                                    @endif


                                    <div class="participant-spending">

                                        Rp{{
                                            number_format(
                                                $participant->total_spending,
                                                0,
                                                ',',
                                                '.'
                                            )
                                        }}

                                    </div>

                                </div>


                            </div>


                        @empty


                            <div class="empty">

                                Belum ada peserta.

                            </div>


                        @endforelse


                    </div>


                </div>


            </div>


            <!-- =============================================
                 RIGHT
            ============================================== -->

            <div class="card">

                <h2 class="card-title">
                    Transaksi Terbaru
                </h2>

                <p class="card-subtitle">

                    Menghapus transaksi akan otomatis
                    menghitung ulang level dan posisi
                    hadiah.

                </p>


                <div class="table-wrap">


                    @if(
                        $recentTransactions->count()
                    )


                        <table>

                            <thead>

                                <tr>

                                    <th>
                                        PESERTA
                                    </th>

                                    <th>
                                        NOMINAL
                                    </th>

                                    <th>
                                        WAKTU
                                    </th>

                                    <th>
                                        AKSI
                                    </th>

                                </tr>

                            </thead>


                            <tbody>


                                @foreach(
                                    $recentTransactions
                                    as $transaction
                                )


                                    <tr>


                                        <td class="name">

                                            {{
                                                $transaction
                                                    ->participant
                                                    ->name
                                            }}

                                        </td>


                                        <td class="amount">

                                            Rp{{
                                                number_format(
                                                    $transaction->amount,
                                                    0,
                                                    ',',
                                                    '.'
                                                )
                                            }}

                                        </td>


                                        <td class="time">

                                            {{
                                                $transaction
                                                    ->created_at
                                                    ->format(
                                                        'd/m/Y H:i:s'
                                                    )
                                            }}

                                        </td>


                                        <td>

                                            <form
                                                method="POST"
                                                action="{{
                                                    route(
                                                        'admin.transaction.destroy',
                                                        $transaction
                                                    )
                                                }}"
                                                onsubmit="
                                                    return confirm(
                                                        'Hapus transaksi ini? Posisi hadiah akan dihitung ulang.'
                                                    );
                                                "
                                            >

                                                @csrf

                                                @method('DELETE')


                                                <button
                                                    type="submit"
                                                    class="delete-button"
                                                >

                                                    HAPUS

                                                </button>

                                            </form>

                                        </td>


                                    </tr>


                                @endforeach


                            </tbody>

                        </table>


                    @else


                        <div class="empty">

                            Belum ada transaksi.

                        </div>


                    @endif


                </div>

            </div>


        </div>


    @else


        <div class="card">

            <div class="empty">

                Tidak ada event aktif.

            </div>

        </div>

    @endif


</div>

</body>

</html>