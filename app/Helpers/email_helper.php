<?php





function btnemail($type, $url, $btntext)
{


    $typestyle = 'color: #fff;
    background-color: #6c757d;
    border-color: #6c757d;';


    if ($type == 'warning') {
        $typestyle = 'color: #212529;
        background-color: #ffc107;
        border-color: #ffc107;';
    }

    if ($type == 'success') {
        $typestyle = 'color: #fff;
        background-color: #28a745;
        border-color: #28a745;';
    }

    if ($type == 'danger') {
        $typestyle = 'color: #fff;
        background-color: #dc3545;
        border-color: #dc3545;';
    }
    if ($type == 'info') {
        $typestyle = 'color: #fff;
        background-color: #17a2b8;
        border-color: #17a2b8;';
    }

    if ($type == 'dark') {
        $typestyle = 'color: #fff;
        background-color: #343a40;;
        border-color: #343a40;';
    }
    if ($type == 'darkw') {
        $typestyle = 'color: #ffc107;
        background-color: #343a40;;
        border-color: #343a40;';
    }


    $style = "display: inline-block;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    border: none;
    text-decoration: none !important;

    font-weight: bold;
    padding: .375rem .75rem;
    line-height: 1.5;
    border-radius: .25rem;
   ;" . $typestyle;

    $btn = '<a target="_blank" href="' . $url . '" style="' . $style . '">' . $btntext . '</a>';
    return $btn;
}


function alertemail($type, $content)
{
    $typestyle = 'color: #0c5460;
    background-color: #d1ecf1;
    border-color: #bee5eb;
   ';

    if ($type == 'secondary') {

        $typestyle = 'color: #383d41;
        background-color: #e2e3e5;
        border-color: #d6d8db;';
    }
    if ($type == 'success') {

        $typestyle = 'color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;';
    }
    if ($type == 'danger') {

        $typestyle = 'color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;';
    }

    if ($type == 'warning') {

        $typestyle = 'color: #856404;
        background-color: #fff3cd;
        border-color: #ffeeba;';
    }

    $style = 'position: relative; border-radius: 6px;
    padding: .75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    ' . $typestyle;


    return '<div style= "' . $style . '">' . $content . '</div>';
}
