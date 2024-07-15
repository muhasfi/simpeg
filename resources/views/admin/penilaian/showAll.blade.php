@extends('layout.base')


@section('title', 'Peringkat Pegawai')


@section('content_header')
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-rocket position-left"></i> <span class="text-semibold">Dashboard HRD</span>
                    - Peringkat Pegawai</h4>
            </div>

        </div>
    </div>
@endsection

@section('content')
    <div class="panel panel-flat">
        <div class="panel-body">

            <table class="table table-bordered table-striped table-hover table-xs">
                <thead class="bg-primary">
                    <tr>
                        <th>Peringkat</th>
                        <th>Pegawai</th>
                        <th>Nilai</th>
                        <th>Total</th>
                        <th hidden>Jabatan</th>
                        <th hidden>Divisi</th>
                        <th class="text-center" hidden>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($penilaian->count())
                        @foreach ($penilaian as $key => $p)
                            <tr>
                                <td class="text-center">{{ $penilaian->firstItem() + $key }}</td>
                                <td><b>{{ $p->pegawai->id }}</b></span>
                                    <br>
                                    {{ $p->pegawai->nama }}
                                    <br>
                                    <span class="label bg-warning">
                                        @if ($p->pegawai->id_divisi == null)
                                            <b>Belum Ada Divisi</b>
                                        @else
                                            {{ $p->pegawai->divisi->nm_divisi }}
                                        @endif
                                    </span>
                                    <span class="label bg-teal">

                                        @if ($p->pegawai->id_jabatan == null)
                                            <b>Belum Ada Jabatan</b>
                                        @else
                                            {{ $p->pegawai->jabatan->nm_jabatan }}
                                        @endif

                                    </span>
                                </td>
                                <td>
                                    <ul>
                                        <li>{{ 'Tanggung Jawab: ' . $p->responsible }}</li>
                                        <li>{{ 'Inisiatif: ' . $p->initiate }}</li>
                                        <li>{{ 'Teamwork: ' . $p->teamwork }}</li>
                                        <li>{{ 'Kedisiplinan: ' . $p->discipline }}</li>
                                        <li>{{ 'Performa Kerja: ' . $p->work_performance }}</li>
                                        <li>{{ 'Ketepatan Waktu: ' . $p->ketepatan_waktu }}</li>
                                        <li>{{ 'Koordinasi: ' . $p->koordinasi }}</li>
                                        <li>{{ 'Motivasi Kerja: ' . $p->motivasi_kerja }}</li>
                                    </ul>
                                </td>
                                <td>{{($p->responsible + $p->initiate + $p->teamwork + $p->discipline + $p->work_performance + $p->ketepatan_waktu) / 6 }}</td>
                                <td hidden></td>
                                <td hidden><span class="label label-success">Active</span></td>
                                <td hidden> <?php $encyrpt = Crypt::encryptString($p->id); ?>
                                    <a href="{{ route('penilaian.show', $encyrpt) }}" class="btn btn bg-info-300"><i
                                            class=" icon-eye"></i> Lihat
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                    @endif

                </tbody>
            </table>
            <div class="text-right">
                <div class="mt-4">
                    {{ $penilaian->links() }}
                </div>
                <div class="mt-4">
                    {{ 'Total Data: ' . $penilaian->total() }}
                </div>
            </div>
        </div>
    </div>
    <!-- /basic datatable -->

@endsection
