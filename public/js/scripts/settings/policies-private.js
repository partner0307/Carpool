$(function () {

    var Font = Quill.import('formats/font');
    Font.whitelist = ['sofia', 'slabo', 'roboto', 'inconsolata', 'ubuntu'];
    Quill.register(Font, true);

    // Full Editor

    var fullEditor = new Quill('#full-container .editor', {
        bounds: '#full-container .editor',
        modules: {
        formula: true,
        syntax: true,
        toolbar: [
            [
            {
                font: []
            },
            {
                size: []
            }
            ],
            ['bold', 'italic', 'underline', 'strike'],
            [
            {
                color: []
            },
            {
                background: []
            }
            ],
            [
            {
                script: 'super'
            },
            {
                script: 'sub'
            }
            ],
            [
            {
                header: '1'
            },
            {
                header: '2'
            },
            'blockquote',
            'code-block'
            ],
            [
            {
                list: 'ordered'
            },
            {
                list: 'bullet'
            },
            {
                indent: '-1'
            },
            {
                indent: '+1'
            }
            ],
            [
            'direction',
            {
                align: []
            }
            ],
            ['link', 'image', 'video', 'formula'],
            ['clean']
        ]
        },
        theme: 'snow'
    });

    const form = $('#editPolicy');

    form.validate({rules:{'title': {required: true}}, ignore: '.editor *'});

    form.on('submit', e => {
        e.preventDefault();
        const model = {title: $('#title').val(), editor: fullEditor.getText()};
        $.post('/settings/policy-tc/policiesSave', model).then(data => {
            if(data > 0) {
                toastr['success']('Policies Private has been saved successfully.', 'Success!', {
                    closeButton: true, tapToDismiss: false
                });
                $('#title').val('');
                fullEditor.setText('');
            } else {
                toastr['error']('Failed to save.', 'Failed!', {
                    closeButton: true, tapToDismiss: false
                });
            }
        })
    })
})
