<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (isset($header))
{
    echo $header;
}

if (isset($main_header))
{
    echo $main_header;
}

if (isset($main_content))
{
    echo $main_content;
}

if (isset($footer))
{
    echo $footer;
}
