<?php
function active_class($link)
{
    // if( $link == ltrim( $_SERVER['SCRITP_NAME'],'/' ) ){
    if (g('m') == $m && g('a') == $a) {
        return " active ";
    }
}
  
function c($key)
{
    return isset($GLOBALS['FFCONFIG'][$key]) ? $GLOBALS['FFCONFIG'][$key] : false;
}

function e($message)
{
    throw new Exception($message);
}
function g($key)
{
    return isset($GLOBALS[$key]) ? $GLOBALS[$key] : false;
}

function get_data($sql, $data = null, $error_number = null, $notice = null)
{
    return _db_run($sql, $data, $error_number, $notice);
}
function get_layout_content($data, $layout = null, $block = null)
{
    if ($layout == null) {
        $layout = 'web';
    }

    $layout_path = VIEW . DS . 'layout' . DS . $layout . '.layout.php';

    if ($block == null) {
        $block = g('m') . '_' . g('a') . '.tpl.php';
    }

    if (file_exists( $layout_path )) {
        $data['__load'] = $block;
        $data['__layout'] = $layout;
        return get_render_content( $data, $layout_path );
    }
}

function get_render_content($data, $template=null)
{
    if ($template == null) {
        $template = VIEW . DS . g('m') . '_' . g('a') . '.tpl.php';
    }

    if (!file_exists($template)) {
        throw new Exception("no template:".$template);
        return false;
    }

    ob_start();
    extract($data);
    require $template;
    $out = ob_get_contents();
    ob_end_clean();

    return $out;
}

function is_login()
{
    if (!headers_sent()) {
        @session_start();
    }

    return intval($_SESSION['uid']) > 0 ;
}
function pdo()
{
    if (!isset($GLOBALS['FF_PDO'])) {
        $GLOBALS['FF_PDO'] = new PDO(c('DSN'), c('MYSQL_USER'), c('MYSQL_PASSWORD'));
        if ($GLOBALS['FF_PDO']) {
            $GLOBALS['FF_PDO']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }
    return $GLOBALS['FF_PDO'];
}

/**
 * 支持多个参数???
 */
function render($data, $template = null)
{
    $numargs = func_num_args();

    if ($numargs < 1) {
        return false;
    } elseif ($numargs == 1) {
        $html = get_render_content(func_num_args(0));
    } elseif ($numargs == 2) {
        $html = get_render_content(func_num_args(0), func_num_args(1));
    } elseif ($numargs == 3) {
        $html = get_render_content(func_num_args(0), func_num_args(1), func_num_args(2));
    }
    
    if ($html) {
        echo $html;
    }
}

function render_layout($data, $layout = 'web')
{
    if ($html = get_layout_content($data, $layout)) {
        echo $html ;
    }
}

function run_sql($sql, $data = null, $error_number = null, $notice = null)
{
    return _db_run($sql, $data, $error_number, $notice, false);
}

function v($key)
{
    return isset($_REQUEST[$key]) ? $_REQUEST[$key]  : false;
}

function _db_run($sql, $data = null, $error_number = null, $notice = null, $return = true)
{
    try {
        $pdo = pdo();
        $sth = $pdo->prepare($sql);
        $ret = $sth->execute($data);
        if ($return) {
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        }//按字段名嵌入
        else {
            return true;
        }
    } catch (PDOException $e) {
        if ($error_unmber) {
            $errorInfo = $sth->errorInfo();
            if ($errorInfo[1] == 1062) {
                e($notice);
            }
        }
        return false;
    }
}
