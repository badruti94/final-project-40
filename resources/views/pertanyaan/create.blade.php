@extends('layouts.master')

@section('title','Home')

@push('script_head')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endpush

@section('content')
<form action="/pertanyaan" method="POST">
    @csrf
    <div class="form-group">
        <label for="judul">judul</label>
        <input type="text" name="judul" class="form-control" id="judul" placeholder="">
    </div>
    <div class="form-group">
        <label for="tag">tag</label>
        <input type="text" name="tag" class="form-control" id="tag" placeholder="">
    </div>
    <div class="form-group">
        <label for="isi">isi</label>
        <textarea name="isi" class="form-control my-editor" id="isi" rows="3">{!! '' !!}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">simpan</button>

</form>
@endsection

@push('scripts')
<script>
    var editor_config = {
        path_absolute: "/",
        selector: "textarea.my-editor",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        file_browser_callback: function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                file: cmsURL,
                title: 'Filemanager',
                width: x * 0.8,
                height: y * 0.8,
                resizable: "yes",
                close_previous: "no"
            });
        }
    };

    tinymce.init(editor_config);
</script>
@endpush