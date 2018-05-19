@extends('layouts.app') @section('content')
<!--Contenido-->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"></h3>
                        <a href="{{ url('/admin/trays_out') }}" class="btn btn-success"> Volver </a>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>

                            <button class="btn btn-box-tool" data-widget="remove">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-lg-offset-1 col-lg-10">
                                <div class="col-lg-10">

                                    <h2>Devolución de Bandejas</h2>
                                </div>

                                <br>

                                <form class="form-horizontal" method="post" action="{{ url('/admin/trays/trays_in') }}">

                                    {{ csrf_field() }}



                                    <div class="form-group">
                                        <div class="col-lg-6">
                                            @if(Session::has('message'))
                                            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <div class="col-lg-4">
                                            <label for="id" class="control-label">Folio (N° Guia de despacho)*</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                                </span>
                                                <input maxlength="5" type="text" name="folio" id="id" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <label for="fono" class="control-label">Cantidad Bandejas devueltas</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                                </span>
                                                <input type="text" class="form-control" id="cantidad">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <label for="fono" class="control-label">Tipo de bandeja</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                                </span>
                                                <select data-live-search="true" class="form-control selectpicker" name="article_id" id="article_id">
                                                    <option value="">Seleccione bandeja:</option>
                                                    @foreach ($articles as $article)
                                                    <option value="{{ $article->id }}"> {{ $article->nombre_articulo }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                         <div class="col-lg-4">
                                            <label for="berrie" class="control-label">Huerto</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                                </span>
                                                <select data-live-search="true" class="form-control selectpicker" name="berrie_id" id="berrie">
                                                    <option value="">Seleccione Huerto:</option>
                                                    @foreach ($berries as $berrie)
                                                    <option value="{{ $berrie->id }}" @if(old('berrie_id') == $berrie->id) {{ 'selected' }} @endif> {{ $berrie->nombre_berrie }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <div class="col-lg-4">
                                            <label for="fono" class="control-label">Responsable</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                            <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                            </span>
                                            <select data-live-search="true" class="form-control selectpicker" name="worker_id" id="worker">
                                                    <option value="">Seleccione Responsable:</option>
                                                    @foreach ($workers as $worker)
                                                    <option value="{{ $worker->id }}" @if(old('worker_id') == $worker->id) {{ 'selected' }} @endif> {{ $worker->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="berrie" class="control-label">Fecha devolución</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                            </span>
                                                <input type="date" name="fecha" class="form-control" </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                        <div class="col-lg-4">
                                            <label for="fono" class="control-label">Descripcion</label>
                                            <div class="input-group">
                                                <textarea name="descripcion" class="form-control" required>{{ old('descripcion') }}</textarea>
                                               
                                            </div>
                                        </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="col-lg-6">
                                                <label for="fono" class="control-label">Cantidad de bandejas solicitadas</label>
                                                <input type="text" name="new_cant" class="form-control" id="new_cant" value="{{ $article->cant }}">
                                            </div>
                                        </div>

                                            <br>
                                            <div class="form-group">
                                                <div class="col-lg-offset-8 col-lg-4">
                                                    <button type="submit" class="buttonna">Generar devolución  <i class="fa fa-floppy-o"></i></button>                                    
                                                   
                                                </div>
                                         


                                </form>

                                </div>
                                </div>

                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!--Fin-Contenido-->
    @endsection