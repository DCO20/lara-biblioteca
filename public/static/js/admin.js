var base = location.protocol+'//'+location.host;
var route = document.getElementsByName('routeName')[0].getAttribute('content');

document.addEventListener('DOMContentLoaded', function(){

    route_active = document.getElementsByClassName('lk-'+route)[0].classList.add('active');
});

$(document).ready(function(){
    editor_init('editor');
})

function editor_init(field)
{
    CKEDITOR.replace(field,{
        toolbar: [
            { name: 'clipboard', items:['Cut', 'Copy', 'Paste', 'PasteText','-', 'Undo', 'Redo'] },
            { name: 'basicstypes', items:['Bold', 'Italic', 'BulletedList', 'Strike', 'Image', 'Link', 'Unlink', 'Blockquote'] },
            { name: 'document', items:['CodeSnippet', 'EmojiPanel', 'Preview', 'Source'] }       
        ]
    });
}
