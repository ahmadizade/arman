
<script src="/js/tinymce/tinymce.min.js"></script>


<script>
    tinymce.init({
        selector: '.textarea-editor',
        language : 'fa_IR',
        directionality :"rtl",
        min_height: 400,
        element_format : 'html',
        entity_encoding : 'row',
        content_style:
            "@import url('/css/style.css'); body { font-family: iransans; }",
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste help wordcount'
        ],
        toolbar: ' formatselect |' +
            ' forecolor backcolor bold italic underline' +
            ' link Table Text image bullist numlist |' +
            'alignright alignjustify  alignleft aligncenter outdent indent |' +
            ' fullscreen Preview code Print|' +
            ' insertdatetime wordcount searchreplace undo redo',
        paste_data_images: true,
        image_title: true,
        automatic_uploads: true,
        images_upload_url: '{{route('tiny.upload')}}',
        file_picker_types: 'image',
        file_picker_callback: function(cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            input.onchange = function() {
                var file = this.files[0];
                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function () {
                    var id = 'blobid' + (new Date()).getTime();
                    var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);
                    cb(blobInfo.blobUri(), { title: file.name });
                };
            };
            input.click();
        }
    });
</script>

