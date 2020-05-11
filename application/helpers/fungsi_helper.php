<?php

function check_already_login()
{
    $ci =& get_instance();
    $user_session   =   $ci->session->userdata('userid');
    if($user_session)
    {
        redirect('dashboard');
    }
}
function check_already_login_user()
{
    $ci =& get_instance();
    $user_session   =   $ci->session->userdata('customerid');
    if($user_session)
    {
        redirect('Home');
    }
}

function cek_login_cart()
{
    $ci =& get_instance();
    $sesio = $ci->session->userdata('customerid');
    if(!$sesio)
    {
      
            echo "<script>
                        alert('Anda harus login dulu');
                        window.location='".site_url('Home')."';
                    </script>";
        
    }
}

function check_not_login()
{
    $ci =& get_instance();
    $user_session   =   $ci->session->userdata('userid');
    if(!$user_session)
    {
        redirect('auth/login');
    }
}

function check_admin()
{
    $ci =& get_instance();
    $ci->load->library('fungsi');
    if($ci->fungsi->user_login()->level != 1 )
    {
        redirect('dashboard');
    }
}

function indo_currency($nominal)
{
    $result = "Rp ".
    number_format($nominal,2,',',',');
    return $result;
}
// fungsi helper unutk tanggal format indonesia
function indo_date($date)
{
    // urutan array
    $d = substr($date,8,2);
    $m = substr($date,5,2);
    $y = substr($date,0,4);
    return $d.'/'.$m.'/'.$y;
}
