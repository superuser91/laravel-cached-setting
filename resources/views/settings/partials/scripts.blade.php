@push('scripts')
<script>
    function selectFileWithCKFinder(elementId) {
        CKFinder.modal({
            chooseFiles: true
            , width: 800
            , height: 600
            , onInit: function(finder) {
                finder.on('files:choose', function(evt) {
                    var file = evt.data.files.first();
                    var output = document.getElementById('ckfinder-' + elementId);
                    var preview = document.getElementById('preview-' + elementId);
                    if (output) {
                        output.value = file.getUrl();
                    }
                    if (preview) {
                        preview.src = file.getUrl();
                    }
                });

                finder.on('file:choose:resizedImage', function(evt) {
                    var output = document.getElementById(elementId);
                    output.value = evt.data.resizedUrl;
                });
            }
        });
    }

    function updateOptionData(node) {
        let selectedDataType = $("option:selected", node);
        $('#options_textarea').val(JSON.stringify(selectedDataType.data('option')))
    }

    function addItemToList(settingKey) {
        $(`#list-${settingKey}`).append(`
        <div class="input-group input-group-sm mb-1 setting-list-item">
            <input type="text" class="form-control" name="${settingKey}[]">
            <span class="input-group-append">
                <button type="button" class="btn btn-danger remove-setting-item-btn">X</button>
            </span>
        </div>
        `);
    }

    $(document).on('click', '.remove-setting-item-btn', function(e) {
        $(this).closest('.setting-list-item').remove();
    });

</script>

<script>
    $(document).on('click', '.btn-delete-setting', function(e) {
        e.preventDefault();
        let action = $(this).data('action');
        Swal.fire({
            title: 'Cảnh báo'
            , text: "Xoá cấu hình đang được sử dụng có thể gây lỗi hệ thống!"
            , input: 'text'
            , inputAttributes: {
                autocapitalize: 'off'
                , placeholder: 'Nhập khoá cấu hình để xác nhận xoá'
            }
            , showCancelButton: true
            , confirmButtonText: 'Xoá'
            , showLoaderOnConfirm: true
            , preConfirm: (key) => {
                $(`input[name='confirm_key']`).val(key);
            }
            , allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.isConfirmed) {
                $('#form-delete').attr('action', action);
                $('#form-delete').submit();
            }
        })
    });

</script>


@endpush
