export function upload_doc() {
    var max = 4;

    $('.input-file input[type=file]').change(function (event) {

        var Parent = $(this).parents('.wrapp_loading__js');
        var FileLoad = $(this).parents('.parent_loading__js').find('.text_load_file').find('.limit__js')

        if (window.FormData === undefined) {
            alert('В вашем браузере FormData не поддерживается')
        } else {
            var formData = new FormData();
            $.each($(this)[0].files, function (key, input) {
                formData.append('file[]', input);
            });

            formData.append('field', $(this).data('field')); // добавляем в массив $request->field (Для БД)


            const files = event.target.files; // всего файлов
            let Parent = $(this).parents('.parent_loading__js'); //
            let Result = (max - Number(Parent.find('.input-file-load-remove__js').length)) // подсчет сколько уже загружено
            //console.log(Result)

            if (files.length > Result) { // проверим не превышен ли лимит загрузки
                alert('Максимальное количество загружаемых файлов:4  ' + Number(Parent.find('.input-file-load-remove__js').length + ' -  уже загружено')) // сообщение
                return false;
            }


            $.ajax({
                type: "POST",
                url: '/cabinet/upload-docs',
                async: true,
                headers: {
                    "X-CSRF-Token": $('meta[name="csrf-token"]').attr('content')
                },
                contentType: false,
                data: formData,
                cache: false,
                processData: false,
                success: function (response) {
                    if (response.error) {


                    } else {
                        setTimeout(function () {
                        }, 1000);

                        Parent.find('.input-file-list').html('');
                        let Result = max - Number(response.new_files.length);


                        for (var key in response.new_files) {
                            //console.log('<div class="input-file-list-item">' + response.new_files[key]['html'] + '</div>' );
                            Parent.find('.input-file-list').append('<div class="input-file-list-item">' + response.new_files[key]['html'] + '</div>');
                        }
                        for (let i = 0; i < Result; i++) {
                            Parent.find('.input-file-list').append('<div class="input-file-list-item"><span class="input-file-list-name"><img class="_ext" src="http://mediator.test/storage/images/icons/none.svg" title="null"></span></div>')
                        }
                        FileLoad.text(Result)

                    }
                }
            });
        }
    });
}


export function removeFilesLoadItem() {

    var dt = new DataTransfer();
    var max = 4;

    $('body').on('click', '.input-file-load-remove__js', function (target) {


        let result = confirm("Данный файл будет удален");
        if (result === true) {
            console.log("User clicked OK");
        } else {
            console.log("User clicked Cancel");
            return false;
        }


        let Parent = $(this).parents('.input-file-list');
        let FileLoad = $(this).parents('.parent_loading__js').find('.text_load_file').find('.limit__js')
        let Field = $(this).parents('.parent_loading__js').find('.input-file input[type=file]').data('field');
        let DeleteFile = $(this).parents('.input-file-list-item').find('.__dowloads').data('file');


        $(this).parents('.input-file-list-item').html('<span class="input-file-list-name"><img class="_ext" src="/storage/images/icons/none.svg" title="null"></span>')

        let Result = (max - Number(Parent.find('.input-file-load-remove__js').length))
        FileLoad.text(Result)


        ////////////////////////////////////////////////

        if (window.FormData === undefined) {
            alert('В вашем браузере FormData не поддерживается')
        } else {
            var formData = new FormData();
        }
        Parent.find('.__dowloads').each(function (index) {

            console.log($(this).data('file'))
            formData.append('file[]', $(this).data('file'));

        });


        formData.append('field', Field);
        formData.append('delete', DeleteFile);


        $.ajax({
            type: "POST",
            url: '/cabinet/delete-docs',
            async: true,
            headers: {
                "X-CSRF-Token": $('meta[name="csrf-token"]').attr('content')
            },
            contentType: false,
            data: formData,
            cache: false,
            processData: false,
            success: function (response) {
                if (response.error) { } else { }

            }
        });


    });

}

export function titleFiles() {


    $('.wrapp_loading__js').each(function (index) {

        let title = $(this).find('.blue_label__js').text();
        //  console.log(title);
        //  $(this).find('.__dowloads').attr('download', title)

    });


}

