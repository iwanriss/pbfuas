<!DOCTYPE html>
@extends('layout.master')
@section('content')


<div class="col-lg-4 col-sm-12">
    
</div>
<div id="mission-section" class="ptb ptb-xs-180">
    <div class="container">
        <div class="row">
            <div class="col-md-45 col-lg-12 border text-center">
                <div class="contact-info-left">
                    <h2>Upload Bukti Pembayaran</h2>
                    <div class="col-md-45 col-lg-12 border text-center">
                        <div class="about-block clearfix">
                            <div class="box-title ">
                                <h4 class="pb-50"> Silahkan Transfer ke nomor rekening ini</h4>
                                @if ($errors->any())
                                <div class="alert alert-warning">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @elseif(session('berhasil'))
                                <div class="alert alert-success">
                                    <ul>
                                        <li>{{ session('berhasil') }}</li>
                                    </ul>
                                </div>
                                @endif
                                <form action = "{{url('tambah-data-bukti')}}/" method = "POST" enctype="multipart/form-data">
                                    @csrf
                                    <table>
                                        <colgroup>
                                            <col span="6" style="background-color:rgb(206, 227, 247)">
                                            <div class="tablebank">
                                            </colgroup>
                                            
                                            <tr>
                                                <th style="margin-left: 2.5em;padding: 0 7em 2em 0;border-width: 2px; border-color: black; border-style:solid;">    Bank:         </th>
                                                
                                                <th style="margin-left: 2.5em;padding: 0 7em 2em 0;border-width: 2px; border-color: black; border-style:solid;">BCA</th>
                                                <th style="margin-left: 2.5em;padding: 0 7em 2em 0;border-width: 2px; border-color: black; border-style:solid;">BNI</th>
                                                <th style="margin-left: 2.5em;padding: 0 7em 2em 0;border-width: 2px; border-color: black; border-style:solid;">BRI</th>
                                                <th style="margin-left: 2.5em;padding: 0 7em 2em 0;border-width: 2px; border-color: black; border-style:solid;">MANDIRI</th>
                                                
                                            </tr>
                                            <tr>
                                                <td style="margin-left: 2.5em;padding: 0 7em 2em 0;border-width: 2px; border-color: black; border-style:solid;">No. Rekening</td>
                                                
                                                
                                                <td style="margin-left: 2.5em;padding: 0 7em 2em 0;border-width: 2px; border-color: black; border-style:solid;">19283638</td>
                                                <td style="margin-left: 2.5em;padding: 0 7em 2em 0;border-width: 2px; border-color: black; border-style:solid;">34768962</td>
                                                <td style="margin-left: 2.5em;padding: 0 7em 2em 0;border-width: 2px; border-color: black; border-style:solid;">29273768</td>
                                                <td style="margin-left: 2.5em;padding: 0 7em 2em 0;border-width: 2px; border-color: black; border-style:solid;">173839201</td>
                                            </tr>
                                            
                                            <tr>
                                                <td style="margin-left: 2.5em;padding: 0 7em 2em 0;border-width: 2px; border-color: black; border-style:solid;">Nama Rekening</td>
                                                <td style="margin-left: 2.5em;padding: 0 7em 2em 0;border-width: 2px; border-color: black; border-style:solid;">Iwan Riswanto</td>
                                                <td style="margin-left: 2.5em;padding: 0 7em 2em 0;border-width: 2px; border-color: black; border-style:solid;">Iwan Riswanto</td>
                                                <td style="margin-left: 2.5em;padding: 0 7em 2em 0;border-width: 2px; border-color: black; border-style:solid;">Iwan Riswanto</td>
                                                <td style="margin-left: 2.5em;padding: 0 7em 2em 0;border-width: 2px; border-color: black; border-style:solid;">Iwan Riswanto</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <label class="custom-file-label" for="inputGroupFile04">Pilih Foto</label>
                                            <input type="file" name="avatar_bukti" class="custom-file-input" id="avatar_bukti">
                                        </div>
                                    </div>
                                    
                                </div>
                                <button type="submit" class="btn btn-primary" a href="{{url('/index')}}">Selesaikan</button>
                            </form>
                            
                        </div>
                        
                    </div>
                    
                    @endsection