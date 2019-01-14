<?php
function active_class( $link )
{
    if( $link == ltrim( $_SERVER['SCRITP_NAME'],'/' ) ){
        return " active ";
    } 
} 
  
function c( $key )
{
    return isset( $GLOBALS['FFCONFIG'][$key] ) ? $GLOBALS['FFCONFIG'][$key] : false;
}

function e( $message )
{
    throw new Exception( $message );
}
function g( $key )
{
    return isset( $GLOBALS[$key] ) ? $GLOBALS[$key] : false;
}

function v( $key )
{
    return isset( $_REQUEST[$key] ) ? $_REQUEST[$key]  : false;
}

function render( $data , $template = null)
{
    if( $html = get_render_content( $data , $template ) ) echo $html;
}
function get_render_content( $data , $template=null )
{
    if( $template == null )
        $template = VIEW . DS . g('m') . '_' . g('a') . '.tpl.php';

    if( !file_exists($template) ){
        throw new Exception("no template:".$template);
        return false;
    }

    ob_start();
    extract( $data );
    require $template;
    $out = ob_get_contents();
    ob_end_clean();

    return $out;
}

function pdo()
{
    if( !isset( $GLOBALS['FF_PDO']) )
    {
        $GLOBALS['FF_PDO'] = new PDO(c('DSN'), c('MYSQL_USER'), c('MYSQL_PASSWORD'));
        if( $GLOBALS['FF_PDO'] ) $GLOBALS['FF_PDO']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    return $GLOBALS['FF_PDO'];   
}

function get_data( $sql , $data = null )
{
//    try{
    
    $pdo = pdo();
    $sth = $pdo->prepare( $sql );
    $ret = $sth->execute( $data );
    return $sth->fetchAll(PDO::FETCH_ASSOC);//按字段名嵌入
//    }
//    catch(PDOException $e){

//         // $errorInfo = $sth->errorInfo();
//         // if( $errorInfo[1] == 1062 )
//         // {
//         //     e( $notice );
//         // }
//         e( $e->getMessage() );
//         return false;
//    }
}