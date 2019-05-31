@extends('layouts.app')

@section('content')
    <div class="container-fluid main-container">
        <div class="row">
            <div class="col-md-2">

                <form id="upload-widget" method="post" action="{{route('upload_pdf')}}" class="dropzone">
                    <div class="fallback">
                        <input name="file" type="file"/>
                    </div>
                </form>


                <div class="pages" style="display: none;">

                </div>
            </div>
            <div class="col-md-10">
                <div class="container printers">
                    <div class="row">
                        <div class="col-md-2 example" style="display:none;">
                            <div class="printer-block">
                                <img src="{{ asset('img/settings.png')}}" class="settings-image"/><br/>
                                <img src="{{ asset('img/printer.png')}}" class="printer-image"/><br/>
                                <span>Printer name</span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="printer-block">
                                <img src="{{ asset('img/settings.png')}}" class="settings-image"/><br/>
                                <img src="{{ asset('img/printer.png')}}" class="printer-image"/><br/>
                                <span>Printer name</span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="printer-block">
                                <img src="{{ asset('img/settings.png')}}" class="settings-image"/><br/>
                                <img src="{{ asset('img/printer.png')}}" class="printer-image"/><br/>
                                <span>Printer name</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container print-container">
                    <div class="row">
                        <div class="col-md-6">
                            <form>
                                <h3>Параметры печати</h3>
                                <div class="form-group">
                                    <label for="col_exmp">Количество экземпляров</label>
                                    <select class="form-control" id="col_exmp">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="pages">Список страниц</label>
                                    <input type="text" class="form-control" id="pages" value="2-7">
                                </div>
                                <div class="form-group">
                                    <label for="color">Цветность</label>
                                    <select class="form-control" id="color">
                                        <option>Monochrome</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success to-order">В очередь</button>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <table class="table order-table">
                                <thead>
                                <th>Имя</th>
                                <th>Кол-во листов</th>
                                <th>Осталось</th>
                                <th></th>
                                </thead>
                                <tbody>
                                <tr class="example" style="display: none">
                                    <td>Задание <span class="td-task-num"></span></td>
                                    <td class="td-pages">5</td>
                                    <td class="td-pages-remain">4</td>
                                    <td class="actions">
                                        <img src="{{ asset('img/pause.png')}}" class="pause">
                                        <img src="{{ asset('img/delete.png')}}" class="delete">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
