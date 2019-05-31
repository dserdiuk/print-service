@foreach ($pages as $page)
    <div class="page" style="background: url('{{ asset('uploads/' . $page)}}')">
        <div class="page-options">
            <a href="{{ url('/') . '/public/uploads/' . $page}}" target="_blank"><img
                        src="{{ asset('img/eye.png')}}"/></a>
            <img src="{{ asset('img/page-settings.png')}}" class="settings-image"/>
            <input type="checkbox">
        </div>
    </div>
@endforeach
