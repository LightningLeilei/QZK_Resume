function send_form( form_id )
{
    // alert( form_id );
    $.post( $("#"+form_id).attr("action") , $("#"+form_id).serialize() , function( data ){
        // alert(data);
        if( $("#"+form_id+"_notice") )
            $("#"+form_id+"_notice").html( data );

    } );
}

function confirm_delete( id ){
    if( confirm("确定要删除这份简历吗？" )){
        //
        $.post('resume_remove.php?id='+id , null , function( data ){
            if( data == 'done'){
                $("#rlist-"+id).remove();
            }
        });
    }
}